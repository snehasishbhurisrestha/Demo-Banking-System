@extends('layouts.app')

@section('title') Withdraw Funds @endsection

@section('content')

<div class="container-fluid">

<h1>Withdraw Funds</h1>

<form method="POST" action="{{ route('withdraw') }}">

@csrf

<div class="form-group">

<label>Select User</label>

<select name="user_id" class="form-control">

@foreach($customers as $user)

<option value="{{ $user->id }}">
{{ $user->name }}
</option>

@endforeach

</select>

</div>

<div class="form-group">

<label>Currency</label>

<select name="currency" class="form-control">

<option value="USD">USD</option>

<option value="EUR">EUR</option>

</select>

</div>

<div class="form-group">

<label>Amount</label>

<input type="number" name="amount" class="form-control">

</div>

<button class="btn btn-danger mt-3">

Withdraw

</button>

</form>

</div>

@endsection
