<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="container mx-auto max-w-md bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl text-center text-blue-500 mb-4">Branch Registration</h1>
        <form method="post" action="{{ route('BranchManagement') }}" class="space-y-4">
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
                <label for="branch_name" class="block mb-1">Branch Name</label>
                <input
                    type="text"
                    id="branch_name"
                    name="branch_name"
                    placeholder="Branch Name"
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
                    class="block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                >
            </div>
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Register Branch</button>
        </form>
        <div class="text-center mt-4">
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">Back to Dashboard</a>
        </div>
        <div class="mt-8">
            <h2 class="text-xl text-center mb-2">All Branches</h2>
            <ul class="list-disc list-inside">
                @foreach($branches as $branch)
                    <li>
                        {{ $branch->branch_code }} - {{ $branch->branch_name }} - {{ $branch->country_iso_code }}
                        <div class="flex justify-end">
                            <a href="{{ route('BranchManagement.edit', $branch->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300 mr-2">Edit</a>
                            <form action="{{ route('BranchManagement.destroy', $branch->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
