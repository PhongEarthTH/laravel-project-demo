@extends('layout')

@section('title', 'เกี่ยวกับเรา')

@section('content')
    <h2>เกี่ยวกับเรา</h2>
    <hr>
    <p>ผู้พัฒนาระบบ : {{ $name }}</p>
    <p>วันที่เริ่มพัฒนาระบบ : {{ $date }}</p>
    <p>เนื้อหา</p>
@endsection
