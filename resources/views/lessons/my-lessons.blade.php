@extends('layouts.main')

@section('title', 'Мои лекции')

@section('content')

<div class="grid grid-cols-1 gap-6">
    @if ($lessons->isEmpty())
        <h2 class="flex justify-center text-bold text-3xl">У вас пока нет созданных лекций</h2>
        @empty($course)
        <div class="flex justify-center">
            <a href="{{ route('newLessonConstructor') }}"
               class="px-5 py-2.5 bg-[#1aa2c0] text-white rounded-lg hover:bg-[#158a9d] transition-colors flex items-center">
                Новая лекция
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
        @endempty
    @else
        @empty($course)
        <div class="flex justify-start">
            <a href="{{ route('newLessonConstructor') }}"
            class="px-5 py-2.5 bg-[#1aa2c0] text-white rounded-lg hover:bg-[#158a9d] transition-colors flex items-center">
                Новая лекция
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
        @endempty
        @foreach($lessons as $lesson)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg w-full border border-gray-100">
                <!-- Шапка карточки -->
                <div class="bg-[#1aa2c0] px-6 py-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <h2 class="text-xl font-bold text-white">{{ $lesson->name }}</h2>
                </div>

                <!-- Тело карточки -->
                <div class="p-6">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                        <div></div>

                        <span class="text-sm text-gray-500 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $lesson->created_at->format('d.m.Y') }}
                        </span>
                    </div>

                    <div class="flex justify-end gap-2">
                        @isset($course)
                        <form action="{{ route('addLessonToCourse', ['course' => $course, 'lesson' => $lesson]) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-5 py-2.5 bg-[#1aa2c0] text-white rounded-lg hover:bg-[#158a9d] transition-colors flex items-center cursor-pointer">Добавить</button>
                        </form>
                        @else
                        <form action="{{ route('deleteLesson', $lesson) }}" method="post">
                            @csrf
                            <button class="px-4 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors flex items-center gap-1 cursor-pointer">
                                Удалить
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>

                        <a href="{{ route('changeLessonConstructor', $lesson) }}"
                        class="px-5 py-2 bg-[#1aa2c0] text-white rounded-lg hover:bg-[#158a9d] transition-colors flex items-center">
                            Редактировать
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        @endisset
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
