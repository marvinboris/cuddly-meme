<?php

namespace App\Http\Controllers\Admin;

use URL;
use Mail;
use View;
use App\User;
use Reminder;
use Sentinel;
use stdClass;
use App\Setting;
use Carbon\Carbon;
use App\Transaction;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class AuthController extends Controller {
    /**
     * Admin dashboard.
     *
     * @return View
     */
    public function dashboard() {
        $account_time = Setting::limit(1)->value('account_time') ?: 12;
        $new_users = User::whereDate('created_at', Carbon::today())->count();
        $registered = User::withTrashed()->count();
        $blocked = User::onlyTrashed()->count();
        $dt = Carbon::now()->subMonths($account_time);
        $has_paid = Transaction::whereDate('transactions.created_at','>=', $dt)->count();
        $latest = User::latest()->limit(5)->get();
        foreach ($latest as $user) {
            $user->status = 'Pending';
            $lastTransaction = Transaction::where('user_id', $user->id)->where('status', 'completed')->latest()->first();
            if ($lastTransaction) {
                $lastTime = $lastTransaction->created_at;
                $since = Carbon::now()->subMonths($account_time);
                if ($lastTime->gte($since)) {
                    $user->status = 'Completed';
                }
            }
        }

        //New user data for chart
        $query = User::select('created_at');
        $charts = [
            $query->whereDate('created_at', Carbon::now()->subDays(6))->count(),
            $query->whereDate('created_at', Carbon::now()->subDays(5))->count(),
            $query->whereDate('created_at', Carbon::now()->subDays(4))->count(),
            $query->whereDate('created_at', Carbon::now()->subDays(3))->count(),
            $query->whereDate('created_at', Carbon::now()->subDays(2))->count(),
            $query->whereDate('created_at', Carbon::now()->subDays(1))->count(),
            $new_users
        ];

        return view('admin.dashboard', compact('new_users','registered','has_paid','blocked','latest','charts'));
    }

    /**
     * Account sign in.
     *
     * @return View
     */
    public function getSignin() {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('admin.dashboard');
        }

        // Show the page
        return view('admin.login');
    }

    /**
     * Account sign in form processing.
     * @param Request $request
     * @return Redirect
     */
    public function postSignin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            // Try to log the user in
            if (Sentinel::authenticate($request->only(['email', 'password']), $request->get('remember-me', false))) {
                // Redirect to the dashboard page
                $user = Sentinel::getUser();
                return Redirect::route('admin.dashboard')->with('success', "Welcome $user->first_name");
            }
        } catch (NotActivatedException $e) {
            return back()->withError('Compte non activé !');
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return back()->withError("Too many tries, account suspended, retry in $delay secondes !");
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withError('Incorrect email or password !');
    }

    /**
     * Forgot password form processing page.
     * @param Request $request
     *
     * @return Redirect
     */
    public function postForgotPassword(Request $request) {
        $request->validate(['email' => 'required|email']);

        $data = new stdClass();

        try {
            // Get the user password recovery code
            $user = Sentinel::findByCredentials(['email' => $request->get('email')]);

            if (!$user) {
                return back()->with('error', 'User not found !');
            }
            $activation = Activation::completed($user);
            if (!$activation) {
                return back()->with('error', 'Account not activated !');
            }
            $reminder = Reminder::exists($user) ?: Reminder::create($user);
            // Data to be used on the email view

            $data->user_name = $user->first_name . ' ' . $user->last_name;
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
    public function getForgotPasswordConfirm($userId,$passwordResetCode = null) {
        // Find the user using the password reset code
        if (!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', 'User not found !');
        }
        if ($reminder = Reminder::exists($user)) {
            if ($passwordResetCode == $reminder->code) {
                return view('admin.auth.forgot-password-confirm');
            } else {
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
    public function postForgotPasswordConfirm(Request $request, $userId, $passwordResetCode = null) {
        $request->validate([
            'password' => 'required|between:3,32',
            'password_confirm' => 'required|same:password'
        ]);

        // Find the user using the password reset code
        $user = Sentinel::findById($userId);
        if (!$reminder = Reminder::complete($user, $passwordResetCode, $request->get('password'))) {
            // Ooops.. something went wrong
            return Redirect::route('signin')->with('error','OOPS something went wrong !');
        }

        // Password successfully reseted
        return Redirect::route('signin')->with('success', 'Your password has been successfully reset !');
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout() {
        // Log the user out
        Sentinel::logout();

        // Redirect to the users page
        return redirect('admin/signin')->with('info', 'Logout successfully !');
    }
}
