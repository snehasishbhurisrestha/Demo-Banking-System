@extends('layouts.app')
@section('title','Dashboard')

@section('content')

<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header-action">
                <h1 class="page-title">Dashboard</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">{{ config('app.name','Laravel') }}</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="section-body mt-4">
    <div class="container-fluid">

    </div>
</div>

@endsection
