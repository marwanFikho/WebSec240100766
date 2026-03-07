@extends('layouts.master')
@section('title', 'Even Numbers')
@section('content')
<div class="card m-4">
    <div class="card-header">Even Numbers</div>
    <div class="card-body">
        <div class="row">
            @foreach(range(1, 100) as $i)
                <div class="col-2 col-md-1 text-center mb-2">
                    @if($i % 2 == 0)
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