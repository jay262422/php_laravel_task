<?php

namespace App\Http\Controllers;

use App\Models\FixedDeposit;
use App\Models\Property;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $fixedDepositsTotal = FixedDeposit::where('user_id', $userId)->sum('amount');
        $propertiesTotal = Property::where('user_id', $userId)->sum('value');
        $stocksTotal = Stock::where('user_id', $userId)->sum(DB::raw('quantity * purchase_price'));

        $totalInvestment = $fixedDepositsTotal + $propertiesTotal + $stocksTotal;

        return view('dashboard', compact('fixedDepositsTotal', 'propertiesTotal', 'stocksTotal', 'totalInvestment'));
    }

}


