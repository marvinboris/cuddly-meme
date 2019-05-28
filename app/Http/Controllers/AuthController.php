<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Reminder;
use Sentinel;
use URL;
use Validator;
use App\Transaction;
use App\Question;
use App\ActivityArea;
use App\Country;
use View;
use stdClass;
use App\Mail\ForgotPassword;

class AuthController extends Controller
{
    /**
     * Admin dashboard.
     *
     * @return View
     */
    public function dashboard()
    {
        $user = Sentinel::getUser();
        $questions = Question::all();
        $activities = ActivityArea::all();
        $countries = Country::all();
        // Show the page
        return view('dashboard', compact('user','questions','activities','countries'));
    }


    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     * @return
     */
    public function getActivate($userId,$activationCode = null)
    {
        // Is user logged in?
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }

        $user = Sentinel::findById($userId);
        $activation = Activation::create($user);

        if (Activation::complete($user, $activation->code)) {
            // Activation was successful
            //Delete stored user in session to avoid showing registration success message again
            $request->session()->forget('user');

            // Redirect to the login page
            return Redirect::route('login')->with('success', "Account activated !");
        } else {
            // Activation not found or not completed.
            return Redirect::route('login')->with('error', "Activation not completed !");
        }

    }


    /**
     * Account sign in.
     *
     * @return View
     */
    public function login()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }

        // Show the page
        return view('login');
    }

    /**
     * Account sign in form processing.
     * @param Request $request
     * @return Redirect
     */
    public function postSignin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            // Try to log the user in
            if (Sentinel::authenticate($request->only(['email', 'password']), $request->get('remember-me', $request->has('remember-me')))) {
                // Redirect to the dashboard page
                $user = Sentinel::getUser();
                return Redirect::route("dashboard")->with('success', "Welcome $user->first_name");
            }

        } catch (NotActivatedException $e) {
            return back()->withError('Account not activated !');
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
           return back()->withError("Too many tries, Account suspended, retry in $delay secondes !");
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withError("Incorrect email or password !");
    }


    /**
     * Forgot password form processing page.
     * @param Request $request
     *
     * @return Redirect
     */
    public function postForgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $data = new stdClass();

        try {
            // Get the user password recovery code
            $user = Sentinel::findByCredentials(['email' => $request->get('email')]);

            if (!$user) {
                return back()->with('error', 'User not founf !');
            }
            $activation = Activation::completed($user);
            if(!$activation){
                return back()->with('error', 'Account not activated !');
            }
            $reminder = Reminder::exists($user) ?: Reminder::create($user);
            // Data to be used on the email view

            $data->user_name = $user->first_name .' ' .$user->last_name;
            $data->forgotPasswordUrl = URL::route('forgot-password-confirm', [$user->id, $reminder->code]);

            // Send the activation code through email

            Mail::to($user->email)
                ->send(new ForgotPassword($data));

        } catch (UserNotFoundException $e) {
            // Even though the email was not found, we will pretend
            // we have sent the password reset code through email,
            // this is a security measure against hackers.
        }

        //  Redirect to the forgot password
        return back()->with('success', 'Check your mail to continue');
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param number $userId
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($userId,$passwordResetCode = null)
    {
        // Find the user using the password reset code
        if(!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', 'User not found !');
        }
        if($reminder = Reminder::exists($user)) {
            if($passwordResetCode == $reminder->code) {
                return view('admin.auth.forgot-password-confirm');
            } else{
                return 'code does not match';
            }
        } else {
            return 'does not exists';
        }

        // Show the page
        // return View('admin.auth.forgot-password-confirm');
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param Request $request
     * @param number $userId
     * @param  string   $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(Request $request, $userId, $passwordResetCode = null)
    {
        $request->validate([
            'password' => 'required|between:3,32',
            'password_confirm' => 'required|same:password'
        ]);

        // Find the user using the password reset code
        $user = Sentinel::findById($userId);
        if (!$reminder = Reminder::complete($user, $passwordResetCode, $request->get('password'))) {
            // Ooops.. something went wrong
            return Redirect::route('signin')->with('error',"OOPS Something went wrong !");
        }

        // Password successfully reseted
        return Redirect::route('signin')->with('success', "Password successfully reset !");
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        $logged = Sentinel::check();
        // Log the user out
        Sentinel::logout();

        // Redirect to the users page
        return redirect()->route('login')->with($logged ? 'info':'do not show anything', 'Success logout !');
    }


}
