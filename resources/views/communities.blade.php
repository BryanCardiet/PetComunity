<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Comunidades</h3>
                    @foreach ($communities as $community)
                        <div class="mb-6 p-4 bg-gray-100 rounded-md shadow-sm">
                            <h4 class="text-lg font-semibold">{{ $community->name }}</h4>
                            <ul class="mt-2">
                                @forelse ($community->dogs as $dog)
                                    <li class="mb-2">
                                        <strong>{{ $dog->name }}</strong> ({{ $dog->age }} años)
                                    </li>
                                @empty
                                    <li>No hay perritos en esta comunidad.</li>
                                @endforelse
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
