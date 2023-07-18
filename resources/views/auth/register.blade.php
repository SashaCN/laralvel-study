@extends('index')

@section('content')
    <form method="POST" action="{{ route('register') }}" class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 w-8/12 flex flex-col justify-center items-center">
    @csrf
    <div class="space-y-4 w-full flex flex-col items-center">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Створити продавця</h2>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Ім'я</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        {{-- <p>{{$errors->get('name')}}</p> --}}
                </div>
            </div>
        </div>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <label for="surname" class="block text-sm font-medium leading-6 text-gray-900">Прізвище</label>
                <div class="mt-2">
                    <input id="surname" name="surname" type="text"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                        {{-- <p>{{$errors->get('surname')}}</p> --}}
                    </div>
            </div>
        </div>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Електрона пошта</label>
                <div class="mt-2">
                    <input id="email" name="email" type="text"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        {{-- <p>{{$errors->get('email')}}</p> --}}
                    </div>
            </div>
        </div>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <label for="tet" class="block text-sm font-medium leading-6 text-gray-900">Телефон</label>
                <div class="mt-2">
                    <input id="tet" name="phone" type="tel"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        {{-- <p>{{$errors->get('phone')}}</p> --}}
                    </div>
            </div>
        </div>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <div class="mt-2">
                    {{-- @dd($marketplaces) --}}
                    <select name="id_marketplace" id="id_marketplace" class="w-full">
                        @foreach ($marketplaces as $marketplace)
                            <option value="{{ $marketplace->id_marketplace }}">{{ $marketplace->country_code }} - {{ $marketplace->country }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('marketplace')" class="mt-2" />

                    {{-- <p>{{$errors->get('marketplace')}}</p> --}}
                </div>
            </div>
        </div>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Пароль</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        {{-- <p>{{$errors->get('password')}}</p> --}}
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            </div>
        </div>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Підтвердити пароль</label>
                <div class="mt-2">
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        {{-- <p>{{$errors->get('password')}}</p> --}}
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
            </div>
        </div>
    </div>
    <div class="mt-6 flex items-center justify gap-x-6">
        {{-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button> --}}
        <button type="submit" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 py-2 px-12">Save</button>
      </div>
    </form>

@endsection

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
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
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
