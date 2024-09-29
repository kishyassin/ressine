<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('nom')" required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('mot de passe')" />
    <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirm Mot de passe')" />
    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

        <!-- Telephone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="adresseClient" :value="__('Address')" />
            <x-text-input id="adresseClient" class="block mt-1 w-full" type="text" name="adresseClient" :value="old('adresseClient')" autocomplete="address" />
            <x-input-error :messages="$errors->get('adresseClient')" class="mt-2" />
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="imageClient" :value="__('Image')" />
            <input id="imageClient" class="block mt-1 w-full" type="file" name="imageClient" accept="image/*">
            <x-input-error :messages="$errors->get('imageClient')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Connecter?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('s\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
