@extends('layouts.app')

@section('title')
{{ $Blog->title }}
@endsection

@section('content')
    <h2>{{ $Blog->title }}</h2>
    <hr>
    {!!$Blog->content!!}
    
@endsection
