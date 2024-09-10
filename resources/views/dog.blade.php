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
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4">Registrar Perrito</h3>
                        <form method="POST" action="{{ route('dogs.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Nombre:</label>
                                <input id="name" type="text" name="name" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="breed" class="block text-gray-700 text-sm font-medium mb-1">Raza:</label>
                                <select id="breed" name="breed" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @foreach( $razas as $raza)
                                        <option value="{{$raza->id}}">{{$raza->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="sexo" class="block text-gray-700 text-sm font-medium mb-1">Sexo:</label>
                                <select id="sexo" name="sexo" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="hembra">Hembra</option>
                                    <option value="macho">Macho</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="age" class="block text-gray-700 text-sm font-medium mb-1">Edad:</label>
                                <input id="age" type="number" name="age" required min="0" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="color" class="block text-gray-700 text-sm font-medium mb-1">Color:</label>
                                <input id="color" type="text" name="color" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="weight" class="block text-gray-700 text-sm font-medium mb-1">Peso (kg):</label>
                                <input id="weight" type="number" name="weight" required step="0.01" min="0" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-medium mb-1">Descripción:</label>
                                <textarea id="description" name="description" rows="4" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="photo" class="block text-gray-700 text-sm font-medium mb-1">Foto:</label>
                                <input id="photo" type="file" name="photo" accept="image/*" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Registrar Perrito</button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-4">Perritos Registrados</h3>
                        @if ($dogs->isEmpty())
                            <p class="text-gray-700">No has registrado ningún perrito aún.</p>
                        @else
                            <ul>
                                @foreach ($dogs as $dog)
                                    <li class="mb-4 p-4 bg-gray-100 rounded-md shadow-sm">
                                        <div class="flex items-center">
                                            @if ($dog->photo)
                                                <img src="{{ asset('storage/' . $dog->photo) }}" alt="{{ $dog->name }}" class="w-20 h-20 object-cover rounded-full mr-4">
                                            @else
                                                <div class="w-20 h-20 bg-gray-300 rounded-full mr-4"></div>
                                            @endif
                                            <div>
                                                <h4 class="text-lg font-semibold">{{ $dog->name }}</h4>
                                                <p><strong>Raza:</strong> {{ $dog->breed }}</p>
                                                <p><strong>Edad:</strong> {{ $dog->age }} años</p>
                                                <p><strong>Color:</strong> {{ $dog->color }}</p>
                                                <p><strong>Peso:</strong> {{ $dog->weight }} kg</p>
                                                <p><strong>Descripción:</strong> {{ $dog->description }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
