@extends('layouts.main')

@section('title', 'Курс {название}')

@section('content')
@if ($course_publications->isEmpty())
    <h2 class="flex justify-center text-bold text-3xl">У этого курса пока нет публикаций</h2>
    @else
        @foreach ($course_publications as $course_publication)
            <a href="{{ route('pass-test') }}">{{ $course_publication->name }}</a>
        @endforeach
    @endif
@endsection
