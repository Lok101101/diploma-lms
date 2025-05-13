@extends('layouts.main')

@section('title', 'Курс {название}')

@section('content')
<style>
    .modal-transition {
        transition: opacity 0.2s ease, transform 0.2s ease;
    }
    .modal-enter {
        opacity: 0;
        transform: translateY(-5px);
    }
    .modal-enter-active {
        opacity: 1;
        transform: translateY(0);
    }
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(2px);
    }
    .dropdown-transition {
        transition: all 0.2s ease;
    }
    .hidden-fields {
        display: none;
    }
</style>

<!-- Кнопка открытия модалки -->
<div class="flex justify-start mt-5">
    <button
        onclick="openModal()"
        class="px-5 py-2.5 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center"
    >
        Добавить элемент
        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </button>
</div>

<!-- Модальное окно -->
<div id="modal" class="fixed inset-0 z-50 hidden modal-transition">
    <!-- Фон -->
    <div onclick="closeModal()" class="absolute inset-0 modal-backdrop"></div>

    <!-- Контент модалки -->
    <div class="relative flex items-center justify-center min-h-screen p-4">
        <div id="modal-content" class="bg-white rounded-lg shadow-lg w-full max-w-md modal-transition modal-enter border border-gray-100">
            <div class="p-6">
                <!-- Заголовок и кнопка закрытия -->
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Добавить новый элемент</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Основное содержимое -->
                <div class="mb-6 text-gray-600">
                    <!-- Выпадающее меню выбора типа -->
                    <div class="relative mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Тип элемента</label>
                        <button
                            onclick="toggleDropdown('type-dropdown')"
                            class="w-full flex justify-between items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-[#17b292]"
                        >
                            <span id="selected-type">Выберите тип</span>
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div id="type-dropdown" class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg dropdown-transition">
                            <div class="py-1">
                                <button
                                    onclick="selectType('Лекция', 'lecture')"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#17b292]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6a2 2 0 012 2v10a2 2 0 01-2 2H9a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                        </svg>
                                        Лекция
                                    </div>
                                </button>
                                <button
                                    onclick="selectType('Тест', 'test')"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#17b292]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Тест
                                    </div>
                                </button>
                                <button
                                    onclick="selectType('Практика', 'practice')"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#17b292]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Практика
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Общие поля -->
                    <div class="space-y-4">
                        <div>
                            <label for="element-name" class="block text-sm font-medium text-gray-700">Название элемента</label>
                            <input
                                type="text"
                                id="element-name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#17b292] focus:border-[#17b292] sm:text-sm"
                                placeholder="Введите название элемента"
                            >
                        </div>

                        <!-- Поля для лекции -->
                        <div id="lecture-fields" class="hidden-fields space-y-4">
                            <div>
                                <label for="lecture-content" class="block text-sm font-medium text-gray-700">Контент лекции</label>
                                <textarea
                                    id="lecture-content"
                                    rows="4"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#17b292] focus:border-[#17b292] sm:text-sm"
                                    placeholder="Текст лекции..."
                                ></textarea>
                            </div>
                            <div>
                                <label for="lecture-file" class="block text-sm font-medium text-gray-700">Прикрепить файл</label>
                                <input
                                    type="file"
                                    id="lecture-file"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#17b292] file:text-white hover:file:bg-[#11957a]"
                                >
                            </div>
                        </div>

                        <!-- Поля для теста -->
                        <div id="test-fields" class="hidden-fields">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Количество вопросов</label>
                                <input
                                    type="number"
                                    min="1"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#17b292] focus:border-[#17b292] sm:text-sm"
                                    placeholder="Введите число"
                                >
                            </div>
                        </div>

                        <!-- Поля для практики -->
                        <div id="practice-fields" class="hidden-fields">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Описание задания</label>
                                <textarea
                                    rows="3"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#17b292] focus:border-[#17b292] sm:text-sm"
                                    placeholder="Опишите практическое задание..."
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Кнопки действий -->
                <div class="flex justify-end space-x-3">
                    <button
                        onclick="closeModal()"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 transition"
                    >
                        Отмена
                    </button>
                    <button
                        class="px-4 py-2 bg-[#17b292] text-white rounded hover:bg-[#11957a] transition"
                    >
                        Сохранить элемент
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Управление модальным окном
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('modal-content').classList.add('modal-enter-active');
        }, 10);
    }

    function closeModal() {
        const content = document.getElementById('modal-content');
        content.classList.remove('modal-enter-active');
        setTimeout(() => {
            document.getElementById('modal').classList.add('hidden');
            resetForm();
        }, 200);
    }

    // Управление выпадающим меню
    function toggleDropdown(id) {
        document.getElementById(id).classList.toggle('hidden');
    }

    function selectType(name, type) {
        document.getElementById('selected-type').textContent = name;
        document.getElementById('type-dropdown').classList.add('hidden');

        // Скрыть все поля
        document.querySelectorAll('.hidden-fields').forEach(el => {
            el.classList.add('hidden');
        });

        // Показать только нужные поля
        if (type) {
            document.getElementById(`${type}-fields`).classList.remove('hidden');
        }
    }

    // Сброс формы
    function resetForm() {
        document.getElementById('selected-type').textContent = 'Выберите тип';
        document.getElementById('element-name').value = '';
        document.querySelectorAll('.hidden-fields').forEach(el => {
            el.classList.add('hidden');
        });
    }

    // Закрытие при клике вне элементов
    document.addEventListener('click', function(e) {
        // Для выпадающего меню
        if (!e.target.closest('[onclick="toggleDropdown(\'type-dropdown\')"]') &&
            !e.target.closest('#type-dropdown')) {
            document.getElementById('type-dropdown').classList.add('hidden');
        }

        // Для модального окна
        if (e.target === document.getElementById('modal')) {
            closeModal();
        }
    });

    // Закрытие по ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>

<!-- Остальной контент страницы -->
@if ($course_publications->isEmpty())
    <h2 class="flex justify-center text-bold text-3xl mt-8">У этого курса пока нет публикаций</h2>
@else
    <div class="mt-8 space-y-6">
        @foreach ($course_publications as $course_publication)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg w-full border border-gray-100">
                <div class="bg-[#17b292] px-6 py-4">
                    <h2 class="text-xl font-bold text-white">{{ $course_publication->name }}</h2>
                </div>
                <div class="p-6">
                    <div class="flex justify-end">
                        <a href="{{ route('pass-test') }}" class="px-4 py-2 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            Открыть
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
