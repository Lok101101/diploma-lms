@extends('layouts.main')

@section('title','Создать тест')

@section('content')
<h2>Создать тест</h2>
<form action="{{ route('createTest') }}" method="post">
    <input type="text" placeholder="Название">
    <button type="submit"></button>
</form>
@endsection
