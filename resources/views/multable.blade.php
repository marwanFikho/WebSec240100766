@extends('layouts.master')
@section('title', 'Multiplication Table')
@section('content')
@php($j = 5)
<div class="card m-4 col-sm-4">	
    <div class="card-header">{{$j}} Multiplication Table</div>
    <div class="card-body">
        <table class="table table-bordered">
            @foreach(range(1, 10) as $i)
                <tr>
                    <td>{{$i}} * {{$j}}</td>
                    <td>=</td>
                    <td>{{ $i * $j }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection