

@extends('Header.home')

@section('content')

    @foreach ($data as $key => $value)
    
        <div class="card mb-3">
            <h3 class="card-header">{{ $key }}</h3>
            <div class="card-body">
                <p class="card-text">{{ $value }}</p>
            </div>
        </div>
    @endforeach

@endsection

