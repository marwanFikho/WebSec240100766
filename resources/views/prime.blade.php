@extends('layouts.master')
@section('title', 'Prime Numbers')
@section('content')
<div class="card m-4">
    <div class="card-header">Prime Numbers</div>
    <div class="card-body">
        <div class="row">
            @foreach(range(1, 100) as $i)
                <div class="col-2 col-md-1 text-center mb-2">
                    @if(isPrimeNumber($i))
                        <strong>{{$i}}</strong>
                    @else
                        {{$i}}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@php
function isPrimeNumber($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}
@endphp