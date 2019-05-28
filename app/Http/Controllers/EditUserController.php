<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Attestation;
use App\File;
use App\Response;
use Sentinel;
use Hash;

class EditUserController extends Controller
{

    public function ajaxCheckEmail(Request $req) {
        $req->validate(['email' => 'required']);

        $exist = User::whereEmail($req->email)->first();

        return response()->json(['status' => $exist != null]);
    }


    public function personal(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'present',
            'email' => 'required|email',
            'birthdate' => 'required|date|before:today',
            'sex' => 'required|in:M,F',
            'activity_area_id' => 'required|exists:activity_areas,id',
            'phone' => 'required',
            'city_id' => 'required|exists:cities,id',
        ]);

        $user = Sentinel::getUser();

        if ($user->email != $request->email) {
            $emailAlreadyTaken = User::whereEmail($request->email)->first();
            if ($emailAlreadyTaken) {
                return back()->withError("The mail address you enter ($request->email) has already been taken !");
            }
        }

        User::whereId($user->id)->update($request->except('_token', '_method', 'country_id'));

        return back()->with('success', "Updated successfully !");

    }


    public function specialization(Request $req) {
        $req->validate(['specialization' => 'required']);
        $user = Sentinel::getUser();

        User::whereId($user->id)->update($req->only('specialization'));

        return back()->with('success', "Updated successfully !");
    }


    public function updateVideo(Request $req) {
        $req->validate(['video_file' => 'required|mimes:mp4,mov,ogg,qt']);
        $user = Sentinel::getUser();
        $user_data = [];
        $file_to_delete = [];
        $file_to_delete_ids = [];

        //upload video
        if ($file = $req->file('video_file')) {
            $extension = $file->extension();
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'video_' . str_random(20) . '.' . $extension;
            while (file_exists($destinationPath . $safeName)) {
                $safeName = 'video_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['video_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);

            if ($user->video) {
                array_push($file_to_delete, $destinationPath . $user->video->filename);
                array_push($file_to_delete_ids, $user->video->id);
            }
        }

        User::whereId($user->id)->update($user_data);

        //delete user files
        File::whereIn('id', $file_to_delete_ids)->delete();
        foreach ($file_to_delete as $item) {
            if (file_exists($item)) {
                unlink($item);
            }
        }

        return back()->with('success', "Updated successfully !");
    }

    public function delVideo() {
        $user = Sentinel::getUser();
        if ($user->video) {
            $item = public_path() . '/files/' . $user->video->filename;
            if (file_exists($item)) {
                unlink($item);
            }
            File::whereIn('id', $user->video->id)->delete();
        }
        User::whereId($user->id)->update(['video_file_id' => NULL]);
        return back()->with('success', "Deleted successfully !");
    }


    public function updateCV(Request $req) {
        $req->validate(['cv_file' => 'required|file|mimes:pdf']);
        $user = Sentinel::getUser();
        $user_data = [];
        $file_to_delete = [];
        $file_to_delete_ids = [];

        //upload video
        if ($file = $req->file('cv_file')) {
            $extension = $file->extension();
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'cv_' . str_random(20) . '.' . $extension;
            while (file_exists($destinationPath . $safeName)) {
                $safeName = 'cv_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['cv_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);

            if ($user->cv) {
                array_push($file_to_delete, $destinationPath . $user->cv->filename);
                array_push($file_to_delete_ids, $user->cv->id);
            }
        }

        User::whereId($user->id)->update($user_data);

        //delete user files
        File::whereIn('id', $file_to_delete_ids)->delete();
        foreach ($file_to_delete as $item) {
            if (file_exists($item)) {
                unlink($item);
            }
        }

        return back()->with('success', "Updated successfully !");
    }

    public function addAttestation(Request $req) {
        $req->validate([
            'name' => 'required',
            'description' => 'present',
            'attestation_file' => 'required|file'
        ]);

        $user = Sentinel::getUser();
        $data = $req->only('name', 'description');
        $data['user_id'] = $user->id;

        //upload video
        if ($file = $req->file('attestation_file')) {
            $extension = $file->extension();
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'attestation_' . str_random(20) . '.' . $extension;
            while (file_exists($destinationPath . $safeName)) {
                $safeName = 'attestation_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $data['file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);
        }

        Attestation::insert($data);

        return back()->with('success', "Added successfully !");
    }


    public function delAttestation(Attestation $attestation) {
        $attestation->delete();
        return back()->with('success', "Deleted successfully !");
    }


    public function socialNetworks(Request $req) {
        $req->validate([
            'social_link1' => 'present',
            'social_link2' => 'present',
            'social_link3' => 'present'
        ]);

        $user = Sentinel::getUser();
        User::whereId($user->id)->update($req->only('social_link1', 'social_link2', 'social_link3'));

        return back()->with('success', "Updated successfully !");
    }

    public function question(Request $req, Question $question) {
        $req->validate(['response' => 'present']);
        $user = Sentinel::getUser();
        if($req->response) {
            Response::insert([
                'content' => $req->response,
                'question_id' => $question->id,
                'user_id' => $user->id
            ]);
            return back()->with('success', "Answer saved successfully !");

        }else{
            Response::where([
                'question_id' => $question->id,
                'user_id' => $user->id
            ])->delete();
            return back()->with('success', "Answer successfully reset !");
        }
    }


    public function changePassword(Request $req) {
        $req->validate([
            'current' => 'required',
            'password' => 'required|min:4',
            'confirm' => 'required|same:password'
        ]);

        $user = Sentinel::getUser();

        if (Hash::check($req->current, $user->password)) {
            $user->update(['password' => bcrypt($req->new_password)]);
            return back()->withSuccess('Your password has een changed successfully !');
        } else {
            return back()->withError('Current password is incorrect !');
        }

    }
}
