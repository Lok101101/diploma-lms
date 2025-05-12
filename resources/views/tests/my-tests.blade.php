@extends('layouts.main')

@section('title', 'Мои тесты')

@section('content')

<div class="grid grid-cols-1 gap-6">
    @if ($tests->isEmpty())
        <h2 class="flex justify-center text-bold text-3xl">У вас пока нет созданных тестов</h2>
        <div class="flex justify-center">
            <a href="{{ route('testConstructor') }}"
               class="px-5 py-2.5 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center">
                Новый тест
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    @else
        <div class="flex justify-start">
            <a href="{{ route('testConstructor') }}"
            class="px-5 py-2.5 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center">
                Новый тест
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
        @foreach($tests as $test)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg w-full border border-gray-100">
                <!-- Шапка карточки -->
                <div class="bg-[#17b292] px-6 py-4">
                    <h2 class="text-xl font-bold text-white">{{ $test->name }}</h2>
                </div>

                <!-- Тело карточки -->
                <div class="p-6">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                        <span class="inline-block bg-[#e0f7f2] text-[#107a6a] text-xs px-3 py-1 rounded-full font-semibold">
                            123
                        </span>

                        <span class="text-sm text-gray-500 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $test->created_at->format('d.m.Y') }}
                        </span>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('changeTest', $test) }}"
                        class="px-5 py-2.5 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center">
                            Редактировать
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
