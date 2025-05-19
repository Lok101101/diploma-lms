@extends('layouts.main')

@section('title', 'Успеваемость студентов')

@section('content')
@empty($users)
<h2 class="text-3xl text-center">Студентов пока нет. Для просмотра успеваемости должен появиться хотя бы один студент</h2>
@else
<div class="relative w-full sm:max-w-md">
    <input type="text" id="studentSearch" placeholder="Поиск по имени студента..."
           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#17b292] focus:border-transparent">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-2.5 text-gray-400" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
    </svg>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($users as $user)
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-all student-card" data-name="{{ mb_strtolower($user->name) }}">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-[#17b292] flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="#17b292">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                {{ $user->name }}
            </h3>
        </div>

        <div class="space-y-3">
            <p class="text-gray-600">
                <span class="font-semibold">Пройдено тестов:</span>
                <span class="font-bold text-gray-800">{{ $user->passesTestsCount }}</span>
            </p>

            <p class="text-gray-600">
                <span class="font-semibold">Средняя оценка:</span>
                <span class="font-bold text-gray-800">
                    {{ $user->avgEstimation }}
                </span>
            </p>

            <div class="flex items-center text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Зарегистрирован: {{ $user->created_at->format('d.m.Y') }}
            </div>
        </div>

        <div class="mt-4 pt-4 border-t border-gray-100 flex justify-end">
            <span class="px-3 py-1 rounded-lg bg-[#17b292] text-white"></span>
        </div>
    </div>
    @endforeach
</div>
@endempty
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('studentSearch');
        const cards = document.querySelectorAll('.student-card');

        searchInput.addEventListener('input', function () {
            const query = this.value.trim().toLowerCase();

            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                if (name.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
