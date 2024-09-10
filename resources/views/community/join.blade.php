<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Comunidad - ') }} <?php echo ucfirst(strtolower($community->name)) ?>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form class="bg-white shadow-lg rounded-lg p-6" action="{{route('community.joinAsDog')}}" method="POST">

                @csrf
                <div class="mb-14">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        ¿Te gustaría unirte a esta comunidad?
                    </h2>
                    <p class="text-gray-600 mb-6">
                        Únete para participar en discusiones, compartir publicaciones y estar al tanto de las últimas novedades de la comunidad.
                    </p>

                    <div>

                        <p class="text-gray-600 mb-6">
                            Quiero ingresar con:
                        </p>

                        <div class="space-y-4">

                            @foreach( $userDogs as $dog )
                                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:border-gray-400 transition">
                                    <input type="radio" name="dog_id" value="{{$dog->id}}" class="hidden peer">
                                    <div class="flex items-center w-full">
                                        <img src="{{ asset('storage/'.$dog->photo) }}" alt="{{$dog->name}}" class="w-16 h-16 object-cover rounded-full mr-4">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800"><?php echo strtoupper($dog->name); ?></h3>
                                            <p class="text-gray-600">{{$dog->age}} Años</p>
                                        </div>
                                    </div>
                                    <svg class="w-6 h-6 ml-auto text-blue-500 peer-checked:block hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </label>
                            @endforeach

                        </div>
                    </div>

                    <input type="hidden" name="community_id" value="{{$community->id}}">
                    
                </div>

                <div class="flex space-x-4 justify-end">
                    <a href="{{ route('community') }}" class="inline-block px-6 py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 transition duration-300 pointer">
                        Volver
                    </a>
                    <input type="submit" value="Ingresar al grupo" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300 cursor-pointer" />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
