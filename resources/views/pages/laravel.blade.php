@extends('layouts.master')

@section('Content')
    <h2>Laravel</h2>
    @if($khoahoc != '')
    {{$khoahoc}}
    @else
    {{"Khong co khoa hoc"}}
    @endif
    <br>
    @for($i = 1; $i<=10; $i++)
    {{$i.' '}}
    @endfor
@endsection
