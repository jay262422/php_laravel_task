@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="card p-4 mb-4">
        <h4>Total Investment: ₹ {{ number_format($totalInvestment, 2) }}</h4>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-4">
                <h5 id="TotafixedDepositsl">Fixed Deposits: ₹ {{ number_format($fixedDepositsTotal, 2) }}</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <h5 id="Totalproperties">Properties: ₹ {{ number_format($propertiesTotal, 2) }}</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <h5 id="Totalstocks">Stocks: ₹ {{ number_format($stocksTotal, 2) }}</h5>
            </div>
        </div>
    </div>

    <div style="width: 400px; height: 400px; margin: auto;">
    <canvas id="investmentChart"></canvas>

    </div>


</div>

@endsection
@section('scripts')
    <script src="{{ asset('js/investmentChart.js') }}"></script>
@endsection