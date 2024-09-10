<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Comunidad - {{ $selectedDog->name }}
            </h2>
            <form action="{{ route('community.leave') }}" method="POST">
                @csrf
                <button type="submit" class="py-2 px-4 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700">
                    Salir
                </button>
            </form>
        </div>
    </x-slot>

    <div class="">
        
        <navbar class="w-full bg-[#fff] py-3 px-6 flex border-t border-[#eee] items-center flex-row h-full gap-5"> 
            <a href="/community/{{$community_id}}">Comunidad</a>
            <a href="/community/{{$community_id}}/blog" class="text-[#2563eb]">Noticias</a>
        </navbar>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($articulos as $articulo)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/'.$articulo->image) }}" alt="{{ $articulo->title }}">
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold mb-2">{{ $articulo->title }}</h3>
                            <p class="text-gray-700 mb-4">{{ Str::limit($articulo->content, 150) }}</p>
                            <a href="{{ '/community/'.$community_id.'/article/'.$articulo->id }}" class="text-blue-600 font-semibold hover:text-blue-800">Leer más</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center col-span-3">No hay artículos disponibles para esta comunidad.</p>
                @endforelse
            </div>
        </div>
    </div>

    
</x-app-layout>