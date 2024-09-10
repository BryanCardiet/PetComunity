<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comunidad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Comunidades</h3>
                    @foreach ($communities as $community)
                        <div class="mb-6 p-4 bg-gray-100 rounded-md shadow-sm flex flex-row justify-between">
                        
                            <div>
                                <span>Comunidad disponible</span>
                                <h5 class="text-lg font-semibold">{{ $community->name }}</h4>
                                <ul class="mt-2">
                                    <small>Hay 20 participantes</small>                                    
                                </ul>
                            </div>
                            
                            <div class="flex flex-row items-center justify-center text-center">
                                <a class="flex items-center" style="height:fit-content;" href="/community/join/{{$community->id}}" class="btn btn-primary">Ingresar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
