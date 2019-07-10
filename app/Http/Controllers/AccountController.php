<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = \Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'numeric', 'max:255'],
            'address' => ['required', 'string'],
            'avatar' => ['file', 'image', 'mimes:png', 'size:1024'],
        ]);

        $avatar = $request->avatar;
        $newAvatarFile = time() . md5($avatar->getClientOriginalName()) . '.' . $avatar->extension();
        $avatar->storeAs('public/images', $newAvatarFile);
        $oldAvatarFile = $user->avatar;
        if ($oldAvatarFile !== 'user.png') {
            try {
                unlink(storage_path('app/public/images/' . $oldAvatarFile));
            } catch (\Exception $e) {
                report($e);
            }
        }
        $user->avatar = $newAvatarFile;
        $user->name = $request->input('name');
        $user->address = $request->input('address');

        if ($user->save()) {
            session()->flash('status', 'Profile succesfully updated.');
            session()->flash('status-type', 'success');
        } else {
            session()->flash('status', 'Something was wrong, please try again later.');
            session()->flash('status-type', 'danger');
        }
        return redirect()->route('profile');
    }
}
