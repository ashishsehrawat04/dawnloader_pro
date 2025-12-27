@extends('admin.template')

@section('title','Dashboard')

@section('content')

<div class="stats">
    <div class="stat">
        <h4>Total Users</h4>
        <p>1,248</p>
    </div>
    <div class="stat">
        <h4>Orders</h4>
        <p>320</p>
    </div>
    <div class="stat">
        <h4>Revenue</h4>
        <p>$12,450</p>
    </div>
</div>

<div class="card">
    <h3>Welcome Back 👋</h3>
    <p>This is your modern Laravel dashboard. Clean, fast, and scalable.</p>
</div>

@endsection
