@extends('layouts.main')

@section('title', 'Курсы')

@section('content')

<div class="grid grid-cols-1 gap-6">
    @if ($courses->isEmpty())
        <h2 class="text-center text-bold text-3xl">Пока нет ни одного курса
        <div class="flex justify-center mt-5">
            <a href="{{ route('create-course') }}"
               class="px-5 py-2.5 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center gap-1">
                Создать курс
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    @else
    <div class="flex justify-start">
        <a href="{{ route('create-course') }}"
        class="px-5 py-2.5 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center">
            Новый курс
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>

        @foreach($courses as $course)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg w-full border border-gray-100">
                <!-- Шапка карточки -->
                <div class="bg-[#17b292] px-5 py-4 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-9 h-9" fill="white" viewBox="0 0 24 24">
                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                    </svg>
                    <h2 class="text-xl font-bold text-white">{{ $course->name }}</h2>
                </div>

                <!-- Тело карточки -->
                <div class="p-6">
                    <div class="flex justify-between gap-4 mb-4">
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            {{ $course->description ?? '' }}
                        </p>

                        <span class="text-sm text-gray-500 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $course->created_at->format('d.m.Y') }}
                        </span>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('getCoursePublications', $course) }}"
                        class="px-5 py-2.5 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center">
                            Посмотреть
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
