
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marketplaces') }}
        </h2>
    </x-slot>


    <x-slot name="slot">

        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <a class="bg-gray-500 hover:bg-green-500 transition text-white font-bold py-2 px-4 rounded fixed top-auto right-10" href="{{ route('admin.marketplace.create') }}">Create Marketplace</a>
            @foreach ($marketplaces as $marketplace)
                <div class="flex justify-between items-center border-b border-black py-4">
                    <p class="py-2 px-10 leading-6 font-bold text-2xl">{{$marketplace->id_marketplace}}</p>
                    <div class="info">
                        <p class="py-2 leading-6"><b class="pr-2">Country:</b> {{$marketplace->country}}</p>
                        <p class="py-2 leading-6"><b class="pr-2">Country code:</b> {{$marketplace->country_code}}</p>
                        <p class="py-2 leading-6"><b class="pr-2">Currency:</b> {{$marketplace->currency}}</p>
                    </div>
                    <div class="btn flex gap-3">
                        <a class="bg-orange-400 hover:bg-orange-600 transition text-white font-bold py-2 px-4 rounded" href="{{ route('admin.marketplace.update', $marketplace->id_marketplace) }}">Update</a>
                        <form action="{{ route('admin.marketplace.delete', $marketplace->id_marketplace) }}">
                            <button type="submit" class="rounded-md bg-red-400 hover:bg-red-600 transition text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                        {{-- <a class="bg-red-400 hover:bg-red-600 transition text-white font-bold py-2 px-4 rounded" href="{{ route('admin.marketplace.', $marketplace->id_marketplace) }}">Update</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
