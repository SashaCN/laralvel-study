@extends('index')

@section('content')
<form action="{{ route('seller.autorize') }}" method="POST"
    class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 w-8/12 flex flex-col justify-center items-center">
    @csrf
    <div class="space-y-4 w-full flex flex-col items-center">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Авторизація продавця</h2>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Електрона пошта</label>
                <div class="mt-2">
                    <input id="email" name="email" type="text"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div class="w-2/4">
            <div class="sm:col-span-4">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Пароль</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6 flex items-center justify gap-x-6">
        {{-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button> --}}
        <button type="submit"
            class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 py-2 px-12">Save</button>
    </div>
</form>
@endsection
