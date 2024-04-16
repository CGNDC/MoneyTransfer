<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <!-- Link to Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-md bg-white p-8 rounded shadow-md mt-8">
        <h1 class="text-2xl text-center text-blue-500 mb-4">Edit Transaction</h1>
        <form method="post" action="{{ route('MoneyTransfer.update', $transaction->id) }}" class="space-y-4">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <div class="flex flex-col">
                <label for="sender_name" class="mb-1">Sender's Name:</label>
                <input type="text" id="sender_name" name="sender_name" value="{{ $transaction->sender_name }}" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex flex-col">
                <label for="sender_contact" class="mb-1">Sender's Contact:</label>
                <input type="text" id="sender_contact" name="sender_contact" value="{{ $transaction->sender_contact }}" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex flex-col">
                <label for="recipient_name" class="mb-1">Recipient's Name:</label>
                <input type="text" id="recipient_name" name="recipient_name" value="{{ $transaction->recipient_name }}" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex flex-col">
                <label for="recipient_contact" class="mb-1">Recipient's Contact:</label>
                <input type="text" id="recipient_contact" name="recipient_contact" value="{{ $transaction->recipient_contact }}" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex flex-col">
                <label for="amount_local_currency" class="mb-1">Amount:</label>
                <input type="number" id="amount_local_currency" name="amount_local_currency" value="{{ $transaction->amount }}" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Save Changes</button>
            <a href="{{ route('MoneyTransfer.results') }}" class="text-center mt-4 block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-700 transition duration-300">Cancel</a>
        </form>
    </div>
</body>
</html>
