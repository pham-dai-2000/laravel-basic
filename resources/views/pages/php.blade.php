@extends('layouts.master')

@section('Content')
    <?php $khoahoc = array('php', 'java', 'ruby', 'C#'); ?>
    @foreach($khoahoc as $value)
    {{$value}}
    @endforeach

@endsection
