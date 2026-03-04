@extends('layouts.app')
@section('title','Admin Dashboard')

@section('content')

<div class="section-body">
<div class="container-fluid">

<h1 class="page-title">Super Admin Dashboard</h1>

<div class="row">

<div class="col-lg-3 col-md-6">
<div class="card bg-primary text-white">
<div class="card-body">
<h6>Total Users</h6>
<h3>{{ $totalUsers }}</h3>
</div>
</div>
</div>


<div class="col-lg-3 col-md-6">
<div class="card bg-success text-white">
<div class="card-body">
<h6>Total USD Balance</h6>
<h3>${{ number_format($totalUsd,2) }}</h3>
</div>
</div>
</div>


<div class="col-lg-3 col-md-6">
<div class="card bg-info text-white">
<div class="card-body">
<h6>Total EUR Balance</h6>
<h3>€{{ number_format($totalEur,2) }}</h3>
</div>
</div>
</div>


<div class="col-lg-3 col-md-6">
<div class="card bg-dark text-white">
<div class="card-body">
<h6>Total Transactions</h6>
<h3>{{ $totalTransactions }}</h3>
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
<th>User ID</th>
<th>Type</th>
<th>Currency</th>
<th>Amount</th>
<th>Date</th>
</tr>

@foreach($latestTransactions as $t)

<tr>

<td>{{ $t->user_id }}</td>

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

</div>
</div>

@endsection
