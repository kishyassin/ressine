<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')"/>

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                          autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded dark:bg-orange-900 border-orange-300 dark:border-orange-700 text-orange-600 shadow-sm focus:ring-orange-500 dark:focus:ring-orange-600 dark:focus:ring-offset-orange-800"
                       name="remember">
                <span class="ms-2 text-sm text-orange-600 dark:text-orange-400">{{ __('Se souvenir de moi') }}</span>
            </label> @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800"
                   href="{{ route('password.request') }}">
                    {{ __('mot de passe oublié ? ') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-center mt-4">


        </div>
        <div class="flex items-center justify-center mt-4">
            <x-primary-button class=" w-full flex items-center justify-center">
                {{ __('se connecter') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800"
               href="register">
                Créer un nouveau compte?
            </a>
        </div>
    </form>
</x-guest-layout>
