<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h2>Unirse a la comunidad</h2>
        <form action="{{ route('community.joinAsDog', $community->id) }}" method="POST">
            @csrf
            <select name="dog_id">
                @foreach($userDogs as $dog)
                    <option value="{{ $dog->id }}">{{ $dog->name }}</option>
                @endforeach
            </select>
            <button type="submit">Unirse como este perro</button>
        </form>

        <h2>Crear una publicación</h2>
        <form action="{{ route('community.createPostAsDog', $community->id) }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Título">
            <textarea name="content" placeholder="Contenido"></textarea>
            <select name="dog_id">
                @foreach($userDogs as $dog)
                    <option value="{{ $dog->id }}">{{ $dog->name }}</option>
                @endforeach
            </select>
            <button type="submit">Publicar como este perro</button>
        </form>
    </div>
</x-app-layout>
