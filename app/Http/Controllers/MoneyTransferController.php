<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_transaction;

class MoneyTransferController extends Controller
{
    public function showForm()
    {
        return view('money_transfer_form');
    }

    public function process(Request $request)
    {
        // Validate the form input
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_contact' => 'required|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'recipient_contact' => 'required|string|max:255',
            'amount_local_currency' => 'required|numeric',
        ]);

        // Generate a unique reference number
        $reference_number = uniqid();

        // Create a new transaction record
        tbl_transaction::create([
            'reference_number' => $reference_number,
            'sender_name' => $request->input('sender_name'),
            'sender_contact' => $request->input('sender_contact'),
            'recipient_name' => $request->input('recipient_name'),
            'recipient_contact' => $request->input('recipient_contact'),
            'amount_local_currency' => $request->input('amount_local_currency'),
            'transaction_status' => 'Pending', // Set initial status as Pending
        ]);

        return redirect()->route('MoneyTransfer.results')->with('success', 'Money transfer processed successfully.');
    }

    public function results()
    {
        $transactions = tbl_transaction::all();
        return view('MoneyTransfer.results', compact('transactions'));
    }

    public function edit($id)
    {
        $transaction = tbl_transaction::findOrFail($id);
        return view('MoneyTransfer.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = tbl_transaction::findOrFail($id);
        $transaction->update($request->all());
        return redirect()->route('MoneyTransfer.results')->with('success', 'Transaction updated successfully.');
    }

    public function receive($id)
    {
        $transaction = tbl_transaction::findOrFail($id);
        $transaction->update(['transaction_status' => 'Received']);
        return redirect()->back()->with('success', 'Transaction received successfully.');
    }

    public function cancel($id)
    {
        $transaction = tbl_transaction::findOrFail($id);
        $transaction->update(['transaction_status' => 'Cancelled']);
        return redirect()->back()->with('success', 'Transaction cancelled successfully.');
    }
}
