@extends('layouts.app')
@section('title','User Dashboard')

@section('content')

<div class="section-body">
<div class="container-fluid">

<h1 class="page-title">Welcome, {{ auth()->user()->name }}</h1>


<div class="row">

<div class="col-lg-6">

<div class="card bg-success text-white">
<div class="card-body">

<h6>USD Balance</h6>

<h2>${{ number_format($account->balance_usd,2) }}</h2>

</div>
</div>

</div>


<div class="col-lg-6">

<div class="card bg-info text-white">
<div class="card-body">

<h6>EUR Balance</h6>

<h2>€{{ number_format($account->balance_eur,2) }}</h2>

</div>
</div>

</div>

</div>


<div class="card mt-4">

<div class="card-header">
<h5>Recent Transactions</h5>
</div>

<div class="card-body">

<table class="table table-striped">

<tr>
<th>Type</th>
<th>Currency</th>
<th>Amount</th>
<th>Date</th>
</tr>

@foreach($transactions as $t)

<tr>

<td>

@if($t->type=='deposit')
<span class="badge bg-success">Deposit</span>
@else
<span class="badge bg-danger">Withdraw</span>
@endif

</td>

<td>{{ $t->currency }}</td>

<td>{{ $t->amount }}</td>

<td>{{ $t->created_at->format('d M Y') }}</td>

</tr>

@endforeach

</table>

</div>

</div>


<button onclick="alert('Please contact support')" class="btn btn-warning">

Transfer Funds

</button>


</div>
</div>

@endsection
