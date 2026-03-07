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


<!-- Recent Transactions -->

<div class="card shadow border-0 mt-4">

<div class="card-header bg-white">
<h5 class="mb-0">Recent Transactions</h5>
</div>

<div class="card-body p-0">

@foreach($transactions as $t)

<div class="d-flex justify-content-between align-items-center px-4 py-3 border-bottom">

<div>

<div class="fw-bold">
{{ $t->description ?? 'Transaction' }}
</div>

<div class="text-muted small">
{{ $t->created_at->format('d M Y H:i') }}
</div>

</div>

<div class="text-end">

@if($t->type=='deposit')

<div class="text-success fw-bold">
+ {{ $t->currency }} {{ number_format($t->amount,2) }}
</div>

@else

<div class="text-danger fw-bold">
- {{ $t->currency }} {{ number_format($t->amount,2) }}
</div>

@endif

</div>

</div>

@endforeach

</div>

</div>



<button onclick="alert('Please contact support')" class="btn btn-warning">

Transfer Funds

</button>


</div>
</div>

@endsection
