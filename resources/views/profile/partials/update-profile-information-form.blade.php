<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{--Avatar--}}
        <div>
            <x-input-label for="avatar" :value="__('Avatar')"/>
            <div class="avatar-upload" class="flex">
                <div>
                    <input type="file" id="image-upload" name="avatar" accept=".png, .jpg, .jpeg"
                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           :value="old('avatar')"/>
                </div>
                @if(Auth::user()->media()->first())
                    <div class="avatar-preview">
                        <div id="imagePreview"
                             style="background-image: url({{ asset('/storage/'.Auth::user()->media()->first()->path) }});"
                        >
                        </div>
                    </div>

                @endif

            </div>

            <x-input-error :messages="$errors->get('avatar')" class="mt-2"/>
        </div>

        {{--        First Name--}}
        <div>
            <x-input-label for="first_name" :value="__('First Name')"/>
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
                          :value="old('firs_name', $user->first_name)"
                          required autofocus autocomplete="first_name"/>
            <x-input-error class="mt-2" :messages="$errors->get('first_name')"/>
        </div>

        {{--        Last Name--}}
        <div>
            <x-input-label for="last_name" :value="__('Last Name')"/>
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full"
                          :value="old('last_name', $user->last_name)"
                          required autofocus autocomplete="last_name"/>
            <x-input-error class="mt-2" :messages="$errors->get('last_name')"/>
        </div>

        {{--        Email--}}
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          :value="old('email', $user->email)" readonly autocomplete="username"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')"/>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{--        Phone--}}
        <div>
            <x-input-label for="phone" :value="__('Phone')"/>
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                          :value="old('phone', $user->phone)"
                          required autofocus autocomplete="phone"/>
            <x-input-error class="mt-2" :messages="$errors->get('phone')"/>
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label :value="__('Gender')"/>
            <div class="mt-4 flex gap-2 items-center">
                <label class="block font-medium text-sm text-gray-700">
                    <input type="radio" value=1 name="is_male"
                           @if(auth()->user()->is_male) checked @endif
                           class="appearance-none w-4 h-4 border-2 border-pink-600 rounded-full">
                    <span class="ml-1">Male</span>
                </label>
                <label class="block font-medium text-sm text-gray-700 px-4">
                    <input type="radio" value=0 name="is_male"
                           @if(!auth()->user()->is_male) checked @endif
                           class="appearance-none w-4 h-4 border-2 border-pink-600 rounded-full">
                    <span class="ml-1">Female</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }

    .avatar-upload .avatar-preview {
        width: 67%;
        height: 147px;
        position: relative;
        border-radius: 3%;
        border: 2px solid #aba8a8;
        margin-top: 3px;
    }

    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
