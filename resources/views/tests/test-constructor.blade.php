<!DOCTYPE html>
<html>
<head>
    <title>Конструктор теста</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.svg') }}">
    <link href="https://unpkg.com/survey-core/survey-core.min.css" type="text/css" rel="stylesheet">
    <script src="https://unpkg.com/survey-core/survey.core.min.js"></script>
    <script src="https://unpkg.com/survey-js-ui/survey-js-ui.min.js"></script>
    <link href="https://unpkg.com/survey-creator-core/survey-creator-core.min.css" type="text/css" rel="stylesheet">
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
    <div class="header bg-gray-100 p-3 sm:p-4 border-b border-gray-200">
        <div class="flex items-center justify-between flex-col sm:flex-row gap-y-2 gap-x-3">
            <input type="text" id="surveyName" placeholder="Название теста" class="w-full pl-4 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#4CAF50] focus:border-transparent">

            <button id="saveBtn" class="px-3 py-2 bg-[#4CAF50] text-white rounded-lg hover:bg-[#45a049] transition-colors">
                Сохранить
            </button>
        </div>
    </div>

    <div id="surveyCreator" class="h-[calc(100vh-72px)]"></div>

    <form id="saveForm" method="POST" action="{{ route('createTest') }}" class="hidden">
        @csrf
        <input type="hidden" name="name" id="formSurveyName">
        <input type="hidden" name="content" id="formSurveyJson">
    </form>

    <script>
        SurveyCreator.localization.currentLocale = "ru";
        SurveyCreator.localization.locales["ru"].pe.clear = "Очистить";
        SurveyCreator.localization.locales["ru"].pe.change = "Поменять";
        SurveyCreator.localization.locales["ru"].pe.set = "Установить";

        const creator = new SurveyCreator.SurveyCreator({
            showLogicTab: true,
            isAutoSave: false
        });
        creator.render("surveyCreator");

        let isSavedToServer = false;
        let initialSurveyJson = JSON.stringify(creator.JSON);

        function hasUnsavedChanges() {
            return JSON.stringify(creator.JSON) !== initialSurveyJson;
        }

        window.addEventListener('beforeunload', (e) => {
            if (hasUnsavedChanges() && !isSavedToServer) {
                e.preventDefault();
                e.returnValue = 'У вас есть несохраненные изменения. Вы уверены, что хотите уйти?';
                return e.returnValue;
            }
        });

        document.getElementById('saveBtn').addEventListener('click', () => {
            const surveyName = document.getElementById('surveyName').value;
            const surveyJson = creator.text;

            if (!surveyName) {
                alert("Введите название теста для сохранения");
                return;
            }

            document.getElementById('formSurveyName').value = surveyName;
            document.getElementById('formSurveyJson').value = surveyJson;

            document.getElementById('saveForm').submit();

            isSavedToServer = true;
            initialSurveyJson = JSON.stringify(creator.JSON);
            showStatus('Отправка данных на сервер...', 'info');
        });

        function showStatus(message, type = 'info') {
            const statusEl = document.getElementById('statusMessage');
            statusEl.textContent = message;
            statusEl.className = `ml-3 ${type === 'success' ? 'text-green-600' : type === 'error' ? 'text-red-600' : 'text-gray-600'} italic`;

            if (type === 'success') {
                setTimeout(() => statusEl.textContent = '', 3000);
            }
        }
    </script>
</body>
</html>
