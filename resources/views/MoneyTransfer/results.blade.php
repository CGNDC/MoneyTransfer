<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <!-- Link to Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Create Money Transfer Form -->
    <div class="container mx-auto max-w-md bg-white p-8 rounded shadow-md mt-8">
        <h1 class="text-2xl text-center text-blue-500 mb-4">Money Transfer</h1>
        <div class="form-group">
            <h2 class="text-xl text-center mb-4">Send Money</h2>
            <form method="post" action="{{ route('MoneyTransfer.process') }}" class="space-y-4">
                @csrf
                @method('POST')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
                <div class="flex flex-col">
                    <label for="sender_name" class="mb-1">Sender's Name:</label>
                    <input type="text" id="sender_name" name="sender_name" placeholder="Enter sender's name" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="sender_contact" class="mb-1">Sender's Contact:</label>
                    <input type="text" id="sender_contact" name="sender_contact" placeholder="Enter sender's contact" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="recipient_name" class="mb-1">Recipient's Name:</label>
                    <input type="text" id="recipient_name" name="recipient_name" placeholder="Enter recipient's name" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="recipient_contact" class="mb-1">Recipient's Contact:</label>
                    <input type="text" id="recipient_contact" name="recipient_contact" placeholder="Enter recipient's contact" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="amount_local_currency" class="mb-1">Amount:</label>
                    <input type="number" id="amount_local_currency" name="amount_local_currency" placeholder="Enter amount" required class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Send</button>
                <a href="{{ route('dashboard') }}" class="text-center mt-4 block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-700 transition duration-300">Cancel</a>
            </form>
        </div>
    </div>
    <!-- End of Create Money Transfer Form -->

    <!-- Transactions -->
    <div class="container mx-auto max-w-md bg-white p-8 rounded shadow-md mt-8">
        <h2 class="text-2xl text-center text-blue-500 mb-4">Transactions</h2>
        <div class="grid gap-4">
            @if(isset($transactions) && count($transactions) > 0)
                @foreach ($transactions as $data)
                    <div class="p-4 border border-gray-300 rounded">
                        <div class="mb-2">
                            <strong>Reference Number:</strong> {{ $data->reference_number }}
                        </div>
                        <div class="mb-2">
                            <strong>Sender's Name:</strong> {{ $data->sender_name }}
                        </div>
                        <div class="mb-2">
                            <strong>Recipient's Name:</strong> {{ $data->recipient_name }}
                        </div>
                        <div class="mb-2">
                            <strong>Amount:</strong> {{ $data->amount_local_currency }}
                        </div>
                        <div class="mb-2">
                            <strong>Status:</strong> {{ $data->transaction_status }}
                        </div>
                        <!-- More transaction details here -->
                        @if($data->transaction_status == 'Pending')
                            <div class="flex justify-center space-x-4">
                                <form method="GET" action="{{ route('MoneyTransfer.edit', $data->id) }}">
                                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Edit</button>
                                </form>
                                <form method="POST" action="{{ route('MoneyTransfer.receive', $data->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700 transition duration-300">Receive</button>
                                </form>
                                <form method="POST" action="{{ route('MoneyTransfer.cancel', $data->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-700 transition duration-300">Cancel</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <p class="text-center">No transactions found.</p>
            @endif
        </div>
    </div>
    <!-- End of Transactions -->
</body>
</html>
