<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ol class="users">
                        @foreach ($users as $user)
                            <li>
                                <hr>
                                <p><b>№: </b><i>{{$user->id}}</i></p>
                                <p><b>name: </b><i>{{$user->name}}</i></p>
                                <p><b>email: </b><i>{{$user->email}}</i></p>
                                <hr>
                            </li>
                        @endforeach
                    </ol>
                    {{-- @dump($users) --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
