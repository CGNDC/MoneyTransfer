<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Branch</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="container mx-auto max-w-md bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl text-center text-blue-500 mb-4">Edit Branch</h1>
        <form method="post" action="{{ route('BranchManagement.update', $branch->id) }}" class="space-y-4"> 
            @csrf
            @method('PUT')
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
                <label for="branch_name" class="block mb-1">Branch Name</label>
                <input
                    type="text"
                    id="branch_name"
                    name="branch_name"
                    placeholder="Branch Name"
                    value="{{ $branch->branch_name }}"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <div>
                <label for="country_iso_code" class="block mb-1">Country ISO Code</label>
                <input
                    type="text"
                    id="country_iso_code"
                    name="country_iso_code"
                    placeholder="Country ISO Code"
                    value="{{ $branch->country_iso_code }}"
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Update Branch</button>
        </form>
        <div class="text-center mt-4">
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
