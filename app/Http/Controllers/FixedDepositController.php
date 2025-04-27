<?php

namespace App\Http\Controllers;

use App\Models\FixedDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FixedDepositController extends Controller
{
    public function index()
    {
        $deposits = FixedDeposit::where('user_id', Auth::id())->get();
        return view('fixed_deposits.index', compact('deposits'));
    }

    public function create()
    {
        return view('fixed_deposits.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bank_name' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $data['user_id'] = Auth::id();
        FixedDeposit::create($data);

        return redirect()->route('fixed_deposits.index')->with('success', 'Fixed Deposit added successfully!');
    }

    public function edit(FixedDeposit $fixedDeposit)
    {
        return view('fixed_deposits.edit', compact('fixedDeposit'));
    }

    public function update(Request $request, FixedDeposit $fixedDeposit)
    {
        $data = $request->validate([
            'bank_name' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $fixedDeposit->update($data);

        return redirect()->route('fixed_deposits.index')->with('success', 'Fixed Deposit updated successfully!');
    }

    public function destroy(FixedDeposit $fixedDeposit)
    {
        $fixedDeposit->delete();
        return redirect()->route('fixed_deposits.index')->with('success', 'Fixed Deposit deleted successfully!');
    }
}
