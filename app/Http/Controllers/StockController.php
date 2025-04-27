<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::where('user_id', Auth::id())->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'stock_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $data['user_id'] = Auth::id();
        Stock::create($data);

        return redirect()->route('stocks.index')->with('success', 'Stock added successfully!');
    }

    public function edit(Stock $stock)
    {
        return view('stocks.edit', compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        $data = $request->validate([
            'stock_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $stock->update($data);

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully!');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully!');
    }
}
