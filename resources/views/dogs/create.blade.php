<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Perrito</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Registrar Perrito</h2>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded-md">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('dogs.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Nombre:</label>
                <input id="name" type="text" name="name" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="breed" class="block text-gray-700 text-sm font-medium mb-1">Raza:</label>
                <input id="breed" type="text" name="breed" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
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
</body>
</html>