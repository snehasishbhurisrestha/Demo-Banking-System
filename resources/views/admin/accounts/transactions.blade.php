@extends('layouts.app')

@section('title') Transactions @endsection

@section('content')

<div class="section-body">
<div class="container-fluid">

<h2 class="mb-4">Transactions - {{ $user->name }}</h2>

<div class="card shadow-sm">

<div class="card-body">

<div class="text-center mb-4">
<h6 class="text-muted">Current Balance</h6>
<h2 class="fw-bold text-success">{{ number_format($balance,2) }}</h2>
</div>

@foreach($transactions as $t)

<div class="d-flex justify-content-between align-items-center border-bottom py-3">

<div>

<div class="fw-bold">
{{ $t->description }}
</div>

<div class="text-muted small">
{{ $t->created_at->format('d M Y H:i') }}
</div>

</div>

<div class="text-end">

@if($t->type == 'deposit')

<div class="text-success fw-bold">
+ {{ number_format($t->amount,2) }}
</div>

@else

<div class="text-danger fw-bold">
- {{ number_format($t->amount,2) }}
</div>

@endif

<div class="small text-muted">
Bal: {{ number_format($t->balance_after,2) }}
</div>

</div>

</div>

@endforeach

</div>
</div>

</div>
</div>

@endsection