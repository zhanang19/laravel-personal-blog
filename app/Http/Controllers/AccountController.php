<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function profile()
    {
        $user = \Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'avatar' => ['file', 'image', 'mimes:png', 'size:1024'],
        ]);
        $user = \Auth::user();
        
        if ($request->has('avatar')) {
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
        }
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

    public function changePassword()
    {
        $user = \Auth::user();
        return view('change-password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $user = \Auth::user();
        $request->validate([
            'old_password' => ['required', 'string', function ($attribute, $value, $fail) use ($user) {
                if (! Hash::check($value, $user->password)) {
                    $fail('Password doesn\'t match to our record');
                }
            }],
            'new_password' => ['required', 'string', 'min:6', 'confirmed']
        ]);
        if ($request->old_password === $request->new_password) {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'new_password' => 'New password can\'t be same with old password'
                ]);
        }
        $user->password = Hash::make($request->new_password);
        if ($user->save()) {
            session()->flash('status', 'Password successfully changed.');
            session()->flash('status-type', 'success');
        } else {
            session()->flash('status', 'Something was wrong, please try again later.');
            session()->flash('status-type', 'danger');
        }
        return redirect()->route('change-password');
    }
}
