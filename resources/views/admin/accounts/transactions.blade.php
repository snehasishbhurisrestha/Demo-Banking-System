@extends('layouts.app')

@section('title') Transactions @endsection

@section('content')

<div class="section-body">
<div class="container-fluid">

<h1 class="page-title">
Transactions - {{ $user->name }}
</h1>

<div class="card">

<div class="card-body">

<div class="table-responsive">

<table class="table table-striped">

<thead>

<tr>
<th>ID</th>
<th>Date</th>
<th>Type</th>
<th>Currency</th>
<th>Amount</th>
<th>Balance After</th>
<th>Description</th>
</tr>

</thead>

<tbody>

@foreach($transactions as $t)

<tr>

<td>{{ $t->id }}</td>

<td>{{ $t->created_at->format('d M Y H:i') }}</td>

<td>

@if($t->type == 'deposit')

<span class="badge bg-success">Deposit</span>

@else

<span class="badge bg-danger">Withdraw</span>

@endif

</td>

<td>{{ $t->currency }}</td>

<td>{{ number_format($t->amount,2) }}</td>

<td>{{ number_format($t->balance_after,2) }}</td>

<td>{{ $t->description }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>

@endsection
