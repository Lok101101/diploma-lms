@extends('layouts.main')

@section('title', 'Создать курс')

@section('content')
<form class="max-w-sm" action="{{ @route('create-course') }}" method="POST">
    @csrf
    <div class="mb-3">
        <input type="text" id="name" name="name" class="bg-white-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3 dark:bg-white-700 dark:border-white-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Название" required />
    </div>
    <button type="submit" class="px-4 py-2 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center cursor-pointer">
        Создать курс
        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </button>
</form>
@endsection
