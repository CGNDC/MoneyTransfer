<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="container mx-auto bg-white p-8 rounded-md shadow-md w-80">
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
        <form method="post" action="{{ route('login') }}">
            @csrf
            @method('POST')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-4">
                <label for="email" class="block mb-2">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    aria-describedby="email"
                    placeholder="Enter Email"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                >
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    aria-describedby="password"
                    placeholder="Enter Password"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                >
            </div>
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300 w-full">Login</button>
        </form>
        <div class="text-center mt-4">
            <a href="{{ route('admin') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">Admin Registration</a>
        </div>
    </div>
</body>
</html>
