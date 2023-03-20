<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use App\View\Components\auth as ComponentsAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.profile', [
            'title' => 'My Profile',
            'user' => User::where('id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Update the user's profile information.
     *
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $users = User::where('id', auth()->user()->id)->first();
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        $rules = [
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->tanggal_lahir,
            'email' => $request->email,
            'phone_number' => $request->nomor_telepon,
            'address' => $request->alamat
        ];

        if ($request->file('image')) {
            if ($users->profile_picture) {
                Storage::delete($users->profile_picture);
            }
            $rules['profile_picture'] = $request->file('image')->store('profile-picture');
        }

        User::where('id', auth()->user()->id)->update($rules);

        return redirect('/dashboardUser/profile')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('profile-deleted');
    }

    public function deleteProfilePicture()
    {
        $user = User::where('id', auth()->user()->id)->first();

        Storage::delete($user->profile_picture);
        $user->profile_picture = null;
        $user->update();

        return redirect('/dashboardUser/profile');
    }
}
