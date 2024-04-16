<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 px-4 py-8 bg-white rounded-lg shadow-md max-w-md">
        <div class="text-2xl font-semibold mb-6">Dashboard</div>
        <div id="datetime" class="text-lg font-medium mb-8"></div>

        @php
            $user = Auth::user();
            $userType = $user->userType;
        @endphp

        <div id="buttons" class="flex flex-col items-center">
            @if ($userType->user_type == 'teller')
                <a href="{{ route('MoneyTransfer.results') }}" class="mb-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Money Transfer</button>
                </a>
                <a href="{{ route('MoneyTransfer.results') }}" class="mb-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Update Profile</button>
                </a>
            @elseif ($userType->user_type == 'admin')
                <a href="{{ route('UserManagement') }}" class="mb-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">User Management</button>
                </a>
                <a href="{{ route('BranchManagement') }}" class="mb-4">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Branch Management</button>
                </a>
            @endif
            <a href="{{ route('logout.get') }}">
                <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Logout</button>
            </a>
        </div>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
            const dateString = now.toLocaleDateString('en-US', dateOptions);
            const timeString = now.toLocaleTimeString('en-US', timeOptions);
            document.getElementById('datetime').innerText = dateString + ' ' + timeString;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
</body>
</html>
