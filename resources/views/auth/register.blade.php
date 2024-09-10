<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Registro de Usuario</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 text-sm font-medium mb-1">Nombre:</label>
                <input id="first_name" type="text" name="first_name" required autofocus class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 text-sm font-medium mb-1">Apellido:</label>
                <input id="last_name" type="text" name="last_name" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email:</label>
                <input id="email" type="email" name="email" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-1">Password:</label>
                <input id="password" type="password" name="password" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="dni" class="block text-gray-700 text-sm font-medium mb-1">DNI:</label>
                <input id="dni" type="text" name="dni" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-medium mb-1">Dirección:</label>
                <input id="address" type="text" name="address" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-medium mb-1">Celular:</label>
                <input id="phone" type="text" name="phone" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="department" class="block text-gray-700 text-sm font-medium mb-1">Departamento:</label>
                <select id="department" name="department" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" disabled>
                    <option value="Lima">Lima</option>
                </select>
            </div>
            

            <div class="mb-4">
                <label for="district" class="block text-gray-700 text-sm font-medium mb-1">Distrito:</label>
                <select id="district" name="district" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Lima">Lima</option>
                    
                </select>
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Registrarse</button>
            </div>
        </form>
    </div>
</body>
</html>