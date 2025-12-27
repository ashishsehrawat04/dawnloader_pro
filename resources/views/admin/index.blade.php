@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('page-title')
    Dashboard
@endsection

@section('content')
    <div class="card">
        <h3>Welcome {{ auth()->user()->name ?? 'User' }}</h3>
        <p>You are logged in successfully.</p>
    </div>
@endsection
