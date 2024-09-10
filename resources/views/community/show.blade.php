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
            <a href="/community/{{$community->id}}" class="text-[#2563eb]">Comunidad</a>
            <a href="/community/{{$community->id}}/blog">Noticias</a>
        </navbar>

        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-16">
            <h2 class="text-2xl font-bold mb-4">Crear una publicación</h2>

            <form action="{{ route('community.createPostAsDog', $community->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" id="title" name="title" placeholder="Título" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Contenido</label>
                    <textarea id="content" name="content" placeholder="Contenido" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                </div>
                <input type="hidden" name="dog_id" value="{{$selectedDog->id}}">

                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Publicar</button>
            </form>
        </div>

        <div class="mt-8 max-w-2xl mx-auto">
            <h3 class="text-xl font-semibold mb-4">Publicaciones en esta comunidad</h3>

            @foreach($community->posts as $post)
                <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('storage/'.$post->dog->photo) }}" alt="{{ $post->dog->name }}" class="w-12 h-12 object-cover rounded-full mr-4">
                        <div>
                            <h4 class="text-lg font-semibold">{{ $post->dog->name }}</h4>
                            
                            {{-- Fecha personalizada --}}
                            <p class="text-sm text-gray-600">
                                @if($post->created_at->isToday())
                                    {{ $post->created_at->diffForHumans() }} 
                                @elseif($post->created_at->isSameWeek(Carbon\Carbon::now()))
                                    {{ $post->created_at->diffForHumans() }} 
                                @else
                                    {{ $post->created_at->format('d/m/Y') }} 
                                @endif
                            </p>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold mb-2">{{ $post->title }}</h4>
                    <p class="text-gray-700">{{ $post->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>