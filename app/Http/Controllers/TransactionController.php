<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaction = Transaction::all();
        return view('frontend/pages/history-transaction', compact(['transaction']));
    }

    // Menampilkan form untuk membuat transaksi baru
    public function create($id)
    {
        $tourism = Tourism::findOrFail($id);
        return view('frontend/pages/form-transaction', compact('tourism'));

    }
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('frontend/pages/detail-history', compact(['transaction']));
    }

    // Menyimpan transaksi baru ke database
    public function store(Request $request)
    {
        // $transaction = new Transaction([
        //     'user_id' => Auth::id(),
        //     'name' => $request->name,
        //     'hp' => $request->hp,
        //     'date' => $request->date,
        //     'number_people' => $request->number_people,
        //     'number_day' => $request->number_day,
        //     'accommodation' => isset($request->accommodation) ? $request->accommodation : null,
        //     'transportation' => isset($request->transportation) ? $request->transportation : null,
        //     'food' => isset($request->food) ? $request->food : null,
        //     'travel_package_price' => $request->travel_package_price,
        //     'total' => $request->total,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        $transaction = new Transaction([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'jk' => $request->jk,
            'nik'=> $request->nik,
            'start_date' => $request->start_date,
            'duration_stay' => $request->number_day,
            'number_day' => $request->number_day,
            'accommodation' => isset($request->standar) ? $request->standar : null,
            'standar' => isset($request->standar) ? $request->standar : null,
            'transportation' => isset($request->deluxe) ? $request->deluxe : null,
            'deluxe' => isset($request->deluxe) ? $request->deluxe : null,
            'food' => isset($request->family) ? $request->family : null,
            'family' => isset($request->family) ? $request->family : null,
            'travel_package_price' => $request->travel_package_price,
            'total' => $request->total,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $transaction->save();

        return response()->json($transaction->id);
    }
    public function struk($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('frontend/pages/struk', compact('transaction'));
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    // Memperbarui transaksi di database
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'hp' => 'required|string',
            'date' => 'required|date',
            'number_people' => 'required|integer',
            'accommodation' => 'nullable|string',
            'transportation' => 'nullable|string',
            'food' => 'nullable|string',
            'travel_package_price' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }


    // Menghapus transaksi
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
