<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMU7km+31x7whFLu5aREzVqv1v+Q/h2p/p1heSL" crossorigin="anonymous">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">
    <div class="bg-white py-8 px-6 sm:px-10 rounded-lg shadow-lg w-full sm:max-w-sm md:max-w-md lg:max-w-lg">
        <h2 class="text-2xl sm:text-lg font-bold text-gray-800 mb-6 text-center">Login Akun</h2>

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input type="email" id="email" name="email" placeholder="Masukkan email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input type="password" id="password" name="password" placeholder="Masukkan password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            @if (session('gagal'))
            <p class="text-red-600 text-sm text-center">{{ session('gagal') }}</p>
            @endif

            <button type="submit"
                class="w-full bg-green-700 text-white font-bold py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:bg-green-600 transition">
                Masuk
            </button>
        </form>

        {{-- <p class="text-gray-600 text-sm mt-4 text-center">
            Belum punya akun? <a href="{{ route('registrasi.tampil') }}" class="text-blue-500 hover:underline">Daftar di sini</a>
        </p> --}}
    </div>
</body>

</html>
