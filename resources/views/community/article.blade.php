<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Comunidad - 
            </h2>
            <form action="{{ route('community.leave') }}" method="POST">
                @csrf
                <button type="submit" class="py-2 px-4 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700">
                    Salir
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-64 object-cover" src="{{ asset('storage/'.$articulo->image) }}" alt="{{ $articulo->title }}">
                <div class="p-6">
                    <h3 class="text-3xl font-semibold mb-4">{{ $articulo->title }}</h3>
                    <p class="text-gray-700 mb-6">{{ $articulo->content }}</p>
                    <a href="{{ '/community/'.$community_id.'/blog' }}" class="text-blue-600 font-semibold hover:text-blue-800">Volver a los artículos</a>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>