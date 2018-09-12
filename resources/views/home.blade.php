@extends('layouts.app')

@section('content')

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">Dashboard</div>
        
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
    </div>

@endsection

