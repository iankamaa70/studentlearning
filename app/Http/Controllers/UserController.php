<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        if(Auth::user()->isTeacher==1){
            return redirect('/modules');
        }
        $users = User::whereNull('isApproved')->get();
        $approved=User::where('isApproved',1)->get();

        $nonteachers=User::whereNull('isTeacher')->where('isApproved',1)->get();
        $teachers=User::where('isTeacher',1)->where('isApproved',1)->get();

        return view('users', compact('users','approved','nonteachers','teachers'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['isApproved' => 1]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }

    public function block($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['isApproved' => null]);

        return redirect()->route('admin.users.index')->withMessage('User blocked successfully');
    }

    public function delete($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()->route('admin.users.index')->withMessage('User deleted successfully');
    }

    public function teacherapprove($user_id){

        $user = User::findOrFail($user_id);
        $user->update(['isTeacher' => 1,'isAdmin'=>1]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }


    public function teacherblock($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['isTeacher' => null,'isAdmin' => null]);

        return redirect()->route('admin.users.index')->withMessage('User blocked successfully');
    }

}
