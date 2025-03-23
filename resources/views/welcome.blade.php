<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - Laravel</title>

        <!-- Fonts & Styles -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="flex items-center justify-center min-h-screen bg-white">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-2xl font-bold mb-6">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4 text-left">
                    <label class="block text-gray-700" for="email">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="mb-4 text-left">
                    <label class="block text-gray-700" for="password">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="text-right mb-4">
                    <a href="#" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white py-2 rounded-lg hover:opacity-90">Login</button>
            </form>
            <div class="flex justify-center gap-4 mt-4">
                <a href="#" class="flex items-center gap-2 px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                    Login with Google
                </a>
            <div class="mt-4 text-gray-700">
                Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
            </div>
            <a href="{{ route('pendaftaran.create') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Register Student
            </a>
        </div>
    </body>
</html>
