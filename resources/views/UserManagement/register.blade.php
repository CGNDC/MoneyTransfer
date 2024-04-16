<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="container mx-auto max-w-md bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl text-center text-blue-500 mb-4">Teller Registration</h1>
        <form method="post" action="{{ route('UserManagement') }}" class="space-y-4">
            @csrf
            @method('POST')
            @if ($errors->any())
                <div class="alert alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="first_name" class="block mb-1">First Name</label>
                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    placeholder="First Name"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label for="middle_name" class="block mb-1">Middle Name</label>
                <input
                    type="text"
                    id="middle_name"
                    name="middle_name"
                    placeholder="Middle Name"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label for="last_name" class="block mb-1">Last Name</label>
                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    placeholder="Last Name"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label for="birthdate" class="block mb-1">Birthdate</label>
                <input
                    type="date"
                    id="birthdate"
                    name="birthdate"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label for="full_address" class="block mb-1">Full Address</label>
                <input
                    type="text"
                    id="full_address"
                    name="full_address"
                    placeholder="Full Address"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label for="email" class="block mb-1">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label for="password" class="block mb-1">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label for="password_confirmation" class="block mb-1">Confirm Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Register</button>
        </form>
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">Back</a>
        </div>
    </div>
</body>
</html>
