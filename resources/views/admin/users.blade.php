@extends('index')

@section('content')

<div class="py-12">
    <div class="mx-auto max-w-7xl w-full p-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight text-center uppercase">
                {{ __('Користувачі') }}
            </h1>
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ol class="users">
                        @foreach ($users as $user)
                            <li class='border-b-2 py-3'>
                                <p><b>№: </b><i>{{$user->id}}</i></p>
                                <p><b>Ім'я: </b><i>{{$user->name}}</i></p>
                                <p><b>Пошта: </b><i>{{$user->email}}</i></p>
                                <p><b>Роль: </b><i>
                                    @if ($user->id_role === 0)
                                        Адмін
                                    @elseif ($user->id_role === 1)
                                        Продавець
                                    @else
                                        Відвідувач
                                    @endif
                                    </i></p>
                            </li>
                        @endforeach
                    </ol>
                    {{-- @dump($users) --}}
                </div>
            </div>
        </div>
    </div>
@endsection
