<?php

namespace App\Http\Controllers;

use URL;
use App\City;
use App\File;
use App\User;
use Sentinel;
use App\Country;
use App\Setting;
use Carbon\Carbon;
use App\Transaction;
use App\ActivityArea;
use App\Mail\Contact;
use App\Mail\Restore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class FrontEndController extends Controller {
    public function ajaxGetCitiesByCountry(Request $req) {
        $req->validate(['id' => 'required|numeric|exists:countries,id']);
        $resp = City::where('country_id',$req->id)->select('id','name')->get();
        return response()->json($resp);
    }

    public function ajaxSearchCities(Request $req) {
        $req->validate(['q' => 'required']);
        $data1 = City::distinct()->where('name','like',"$req->q%")->limit(8)->pluck('name')->toArray();
        $data2 = Country::distinct()->where('name','like',"$req->q%")->limit(7)->pluck('name')->toArray();
        $data = array_merge($data1, $data2);
        return response()->json($data);
    }

    public function home() {
        $activityAreas = ActivityArea::all();
        $activityAreas = array_sort($activityAreas, function ($item, $i) {
            return -1 * $item->users->count();
        });
        $setting = Setting::first();
        return view('welcome', compact('activityAreas','setting'));
    }

    public function register() {
        $activities = ActivityArea::all();
        $countries = Country::all();
        return view('register', compact('activities','countries'));
    }

    public function postRegister(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'present',
            'email' => 'required|email|unique:users,email',
            'birthdate' => 'required|date|before:today',
            'sex' => 'required|in:M,F',
            'activity_area_id' => 'required|exists:activity_areas,id',
            'specialization' => 'required',
            'phone' => 'required',
            'city_id' => 'required|exists:cities,id',
            'cv_file' => 'required|file|mimes:pdf',
            'password' => 'required|between:4,32',
            'password_confirm' => 'required|same:password'
        ]);

        $user_data = $request->except('_token', 'country_id', 'cv_file', 'password_confirm');

        //upload cv
        if ($file = $request->file('cv_file')) {
            $extension = $file->extension() ?: 'pdf';
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'cv_' . str_random(20) . '.' . $extension;
            while (file_exists($destinationPath . $safeName)) {
                $safeName = 'cv_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['cv_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);
        } else {
            return back()->withInput()->withError('CV file is required');
        }

        //generate user link by sluging his name
        $link = self::slugify($request->first_name . ' ' . $request->last_name);
        while (User::where('link', $link)->first()) {
            $link = self::slugify($request->first_name . ' ' . $request->last_name . '-' . str_random(4));
        }

        $user_data['link'] = $link;

        $activate = false;
        $data = new \stdClass();

        try {
            // Register the user
            $user = Sentinel::register($user_data, false);

            //add user to 'User' group
            $role = Sentinel::findRoleBySlug('user');
            if ($role) {
                $role->users()->attach($user);
            }

            $request->session()->put('user', $user);

            // Data to be used on the email view
            $data->user_name = $user->first_name . ' ' . $user->last_name;
            $data->activationUrl = URL::route('activate', [$user->id, Activation::create($user)->code]);

            // Send the activation code through email
            Mail::to($user->email)
                ->send(new Restore($data));
        } catch (UserExistsException $e) {
            return back()->withError('This user already exist !');
        }

        return redirect()->route('registration-sucess');
    }

    public function registrationSucess(Request $request) {
        $user = $request->session()->pull('user', null);
        if ($user) {
            return view('registration-success', compact('user'));
        }
        return redirect()->route('login');
    }

    public function searchWorker(Request $req) {
        $location = $req['l'] ?: '';
        $activity_id = $req['a'] ?: -1;

        $activityAreas = ActivityArea::all();
        $query = User::select('users.*');

        //if($activity_id) {
            $query = $query->where('users.activity_area_id',$activity_id);
        //}

        //if($location) {
            $query = $query->join('cities','cities.id','=','users.city_id')
                        ->join('countries','countries.id','=','cities.country_id')
                        ->where(function ($query) use ($location) {
                            $query->Where('cities.name','like',"%$location%")
                            ->orWhere('countries.name','like',"%$location%");
                        });
        //}

        $userRole = Sentinel::findRoleBySlug('user');

        $query->join('role_users','role_users.user_id', '=', 'users.id')->where('role_users.role_id', $userRole->id);

        //$users = $query->simplePaginate(1);
        $users = $query->orderBy('views','desc')->paginate(10);
        $total = json_decode($users->toJson());
        $total = $total->total;

        return view('search-workers', compact('activityAreas','location','activity_id','users','total'));
    }

    public function userLink($link) {
        $user = User::whereLink($link)->first();
        if (!$user) {
            abort(404);
        }

        $lastTransaction = Transaction::where('user_id', $user->id)->latest()->first();

        if ($lastTransaction) {
            $nbMonth = Setting::limit(1)->value('account_time') ?: 12;
            $lastTime = $lastTransaction->created_at;
            $since = Carbon::now()->subMonths($nbMonth);
            if ($lastTime->gte($since)) {
                if(!Sentinel::check() || $user->id != Sentinel::getUser()->id)
                    User::whereLink($link)->increment('views');
                return view('user-details', compact('user'));
            }
        }

        abort(404);
    }

    private static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function browseActivityAreas() {
        $activityAreas = ActivityArea::all();
        //sort by users number
        $activityAreas = array_sort($activityAreas, function ($item, $i) {
            return -1 * $item->users->count();
        });

        return view('activity_areas', compact('activityAreas'));
    }

    public function contact() {
        return view('contact');
    }

    public function postContact(Request $request) {
        $request->validate([
            'contact-name' => 'required',
            'contact-email' => 'required|email',
            'contact-subject' => 'required',
            'contact-msg' => 'required'
        ]);

        $data = new \stdClass();

        // Data to be used on the email view
        $data->contact_name = $request->get('contact-name');
        $data->contact_email = $request->get('contact-email');
        $data->contact_subject = $request->get('contact-subject');
        $data->contact_msg = $request->get('contact-msg');

        // Send the mail
        Mail::to(
           'support@workoo.net'
            )->send(new Contact($data));

        return back()->with('success', 'Your message has been sent !');
    }

    public function iframe(Request $req) {
        $req->validate(['url' => 'required|url']);
        //return file_get_contents($req->url);
        return redirect()->to($req->url);
    }

    public function payment(Request $request) {
        $user = Sentinel::getUser();
        $lastTransaction = Transaction::where('user_id', $user->id)->latest()->first();

        if ($lastTransaction) {
            $nbMonth = Setting::limit(1)->value('account_time') ?: 12;
            $lastTime = $lastTransaction->created_at;
            $since = Carbon::now()->subMonths($nbMonth);
            if ($lastTime->gte($since)) {
                return redirect()->route('dashboard');
            }
        }

        $cinetpay = new CinetpayController();

        $cinetpay = $cinetpay->deposit( $request ); 
        $monetbil = new MonetbilController();
        $monetbil = $monetbil->generateWidgetData( $request ); 

       return view('payment',compact('user','cinetpay','monetbil'));
    }

    /**
     * 
     */

     public function howItWorks(Request $request){
         
        $setting = Setting::first();

        return view('how-it-works',compact('setting') );
     }
}
