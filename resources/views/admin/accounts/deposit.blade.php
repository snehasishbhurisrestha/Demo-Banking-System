@extends('layouts.app')

@section('title') Deposit Funds @endsection

@section('content')

<div class="section-body">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">Deposit Funds</h1>
            </div>

            <a href="{{ route('customers.index') }}" class="btn btn-info">
                Back
            </a>
        </div>

        <div class="card mt-4">
            <div class="card-body">

                <form method="POST" action="{{ route('deposit') }}">
                    @csrf

                    <div class="form-group">
                        <label>Select User</label>
                        <select name="user_id" class="form-control" required>

                            @foreach($customers as $user)

                                <option value="{{ $user->id }}">
                                    {{ $user->name }} ({{ $user->email }})
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label>Currency</label>

                        <select name="currency" class="form-control">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label>Amount</label>

                        <input type="number"
                               step="0.01"
                               name="amount"
                               class="form-control"
                               required>
                    </div>

                    <button class="btn btn-success mt-3">
                        Deposit
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
