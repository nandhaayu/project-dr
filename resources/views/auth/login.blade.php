<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    
    <!-- Inter Font CSS -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    
    <!-- Tailwind CSS (pastikan Vite dikonfigurasi dengan benar) -->
    @vite('resources/css/app.css')
    
    <!-- Alpine.js untuk interaktivitas (optional) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMU7km+31x7whFLu5aREzVqv1v+Q/h2p/p1heSL" crossorigin="anonymous">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white py-8 px-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login Akun</h2>
        
        <div class="px-4">
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-4">
                    @if (session('gagal'))
                        <p class="text-red-600 text-sm">{{ session('gagal') }}</p>
                    @endif
                </div>

                <button type="submit" class="w-full bg-green-700 text-white font-bold py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:bg-green-600">
                    Masuk
                </button>
            </form>
        </div>

        <p class="text-gray-600 text-sm mt-4 text-center">
            Belum punya akun? <a href="{{ route('registrasi.tampil') }}" class="text-blue-500 hover:underline">Daftar di sini</a>
        </p>
    </div>
</body>
</html>
