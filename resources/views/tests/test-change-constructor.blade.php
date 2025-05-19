<!DOCTYPE html>
<html>
<head>
    <title>Конструктор теста {{ $test->name }}</title>
    <link href="https://unpkg.com/survey-core/survey-core.min.css" rel="stylesheet">
    <script src="https://unpkg.com/survey-core/survey.core.min.js"></script>
    <script src="https://unpkg.com/survey-js-ui/survey-js-ui.min.js"></script>
    <link href="https://unpkg.com/survey-creator-core/survey-creator-core.min.css" rel="stylesheet">
    <script src="https://unpkg.com/survey-creator-core/survey-creator-core.min.js"></script>
    <script src="https://unpkg.com/survey-creator-js/survey-creator-js.min.js"></script>
    <script src="https://unpkg.com/survey-creator-core/survey-creator-core.i18n.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .svc-creator__non-commercial-text {
            display: none;
        }
    </style>
</head>
<body class="h-screen overflow-hidden bg-gray-50">
    <div class="header bg-gray-100 p-4 border-b border-gray-200">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-4xl font-bold text-gray-800">{{ $test->name }}</h2>
            <div class="flex items-center">
                <span id="statusMessage" class="ml-3 text-gray-600 italic"></span>
                <button id="saveBtn" class="ml-4 px-5 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">
                    Сохранить изменения
                </button>
            </div>
        </div>
    </div>

    <div id="surveyCreator" class="h-[calc(100vh-72px)]"></div>

    <form id="saveForm" method="POST" action="{{ route('saveTest') }}" class="hidden">
        @csrf
        <input type="hidden" name="id" id="formSurveyId" value="{{ $test->id }}">
        <input type="hidden" name="content" id="formSurveyJson">
    </form>

    <script>
        SurveyCreator.localization.currentLocale = "ru";

        SurveyCreator.localization.locales["ru"].pe = {
            ...SurveyCreator.localization.locales["ru"].pe,
            clear: "Очистить",
            change: "Поменять",
            set: "Установить",
            correctAnswer: "Правильный ответ",
            clearCorrectAnswer: "Сбросить правильный ответ"
        };

        const testData = @json($test->content ?? '{}');
        const initialData = {
            name: '{{ $test->name }}',
            content: testData && typeof testData === 'object' ? testData : JSON.parse(testData || '{}')
        };

        const creator = new SurveyCreator.SurveyCreator({
            showLogicTab: true,
            isAutoSave: true,
            showTranslationTab: false
        });

        creator.text = JSON.stringify(initialData.content);
        creator.render("surveyCreator");

        let initialJson = creator.text;
        let hasChanges = false;

        creator.onModified.add(() => {
            hasChanges = creator.text !== initialJson;
        });

        function beforeUnloadHandler(e) {
            if (hasChanges) {
                e.preventDefault();
                e.returnValue = 'У вас есть несохраненные изменения. Вы уверены, что хотите уйти?';
                return e.returnValue;
            }
        }
        window.addEventListener('beforeunload', beforeUnloadHandler);

        document.getElementById('saveBtn').addEventListener('click', function() {
            window.removeEventListener('beforeunload', beforeUnloadHandler);
            document.getElementById('formSurveyJson').value = creator.text || '{}';
            document.getElementById('saveForm').submit();
            showStatus('Сохранение...', 'info');
        });

        function showStatus(message, type = 'info') {
            const statusEl = document.getElementById('statusMessage');
            statusEl.textContent = message;
            statusEl.className = `ml-3 ${type === 'success' ? 'text-green-600' :
                               type === 'error' ? 'text-red-600' : 'text-gray-600'} italic`;

            if (type === 'success') {
                setTimeout(() => statusEl.textContent = '', 5000);
            }
        }
    </script>
</body>
</html>
