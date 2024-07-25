<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- photo -->
        {{--        <img src="{{asset('/storage/avatar/images.jpeg')}}">--}}
        <div>
            <x-input-label for="avatar" :value="__('Avatar')"/>
            <div class="avatar-upload">
                <div>
                    <input type="file" id="image-upload" name="avatar" accept=".png, .jpg, .jpeg"
                           onchange="previewImag(this)"
                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           :value="old('avatar')"
                    />
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview"
                         style="background-image:  url({{asset('/storage/const-images/test-avatar.jpeg')}})"></div>
                </div>
            </div>
            <x-input-error :messages="$errors->get('avatar')" class="mt-2"/>
        </div>

        <!-- First Name -->
        <div class="mt-4">
            <x-input-label for="first_name" :value="__('First Name')"/>
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                          required autofocus autocomplete="first_name"/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')"/>
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                          required autofocus autocomplete="last_name"/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          required autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')"/>
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required
                          autofocus autocomplete="phone"/>
            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <!-- Gender -->

        <div class="mt-4">
            <x-input-label :value="__('Gender')"/>
            <div class="mt-4 flex gap-2 items-center">
                <label class="block font-medium text-sm text-gray-700">
                    <input type="radio" value=1 name="is_male" checked
                           class="appearance-none w-4 h-4 border-2 border-pink-600 rounded-full">
                    <span class="ml-1">Male</span>
                </label>
                <label class="block font-medium text-sm text-gray-700 px-4">
                    <input type="radio" value=0 name="is_male"
                           class="appearance-none w-4 h-4 border-2 border-pink-600 rounded-full">
                    <span class="ml-1">Female</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@push('jquery')
    <script src="{!!url('/js/jquery.min.js')!!}"></script>
@endpush
@push('js')
    <script>
        function previewImag(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(700);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
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
