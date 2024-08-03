<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helper\FileHelper;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'phone' => ['required', 'string'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'is_male' => ['required', 'boolean'],
                'avatar' => ['nullable','file', 'mimes:png,jpg,jpeg']
            ]);
            $data = $request->only(['first_name', 'last_name', 'email', 'phone', 'password', 'is_male']);
            $user = User::create($data);
            if ($request->has('avatar')) {
                FileHelper::addFile($user, $request->file('avatar'));
//                $user->profile()->create([
//                    'type' => 'photo',
//                    'size' => $request->file('avatar')->getSize(),
//                    'path' => Storage::disk('public')->put('/avatar', $request->file('avatar'))
//                ]);
            }
            event(new Registered($user));

            Auth::login($user);
            if($user->is_admin){
                return view('admin-pages.admin-dashboard');
            }else{
                return redirect(route('dashboard', absolute: false));
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
