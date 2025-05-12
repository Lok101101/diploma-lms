<!DOCTYPE html>
<html>
<head>
    <title>Редактор теста</title>
    <link href="https://unpkg.com/survey-core/survey-core.min.css" rel="stylesheet">
    <script src="https://unpkg.com/survey-core/survey.core.min.js"></script>
    <script src="https://unpkg.com/survey-js-ui/survey-js-ui.min.js"></script>
    <link href="https://unpkg.com/survey-creator-core/survey-creator-core.min.css" rel="stylesheet">
    <script src="https://unpkg.com/survey-creator-core/survey-creator-core.min.js"></script>
    <script src="https://unpkg.com/survey-creator-js/survey-creator-js.min.js"></script>
    <script src="https://unpkg.com/survey-creator-core/survey-creator-core.i18n.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .header {
            padding: 15px;
            background: #f5f5f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #surveyName {
            padding: 8px;
            width: 300px;
            font-size: 16px;
        }
        #saveBtn {
            padding: 8px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        #saveBtn:hover {
            background: #45a049;
        }
        #statusMessage {
            margin-left: 10px;
            color: #666;
            font-style: italic;
        }
        #surveyCreator {
            height: calc(100vh - 60px);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-3xl">{{ $test->name}}</h2>
            <button id="saveBtn">Сохранить изменения</button>
            <span id="statusMessage"></span>
        </div>
    </div>
    <div id="surveyCreator"></div>

    <form id="saveForm" method="POST" action="{{ route('saveTest') }}">
        @csrf
        <input type="hidden" name="id" id="formSurveyId" value="{{ $test->id }}">
        <input type="hidden" name="content" id="formSurveyJson">
    </form>

    <script>
        // 1. Безопасное получение данных
        const testData = @json($test->content ?? '{}');
        const initialData = {
            name: '{{ $test->name }}',
            content: testData && typeof testData === 'object' ? testData : JSON.parse(testData || '{}')
        };

        // 2. Инициализация редактора
        const creator = new SurveyCreator.SurveyCreator({
            showLogicTab: true,
            isAutoSave: true
        });

        // 3. Загрузка данных в редактор
        creator.text = JSON.stringify(initialData.content);
        creator.render("surveyCreator");

        // 4. Отслеживание изменений
        let initialJson = creator.text;
        let hasChanges = false;

        creator.onModified.add(() => {
            hasChanges = creator.text !== initialJson;
        });

        // 5. Обработчик beforeunload (опционально)
        function beforeUnloadHandler(e) {
            if (hasChanges) {
                e.preventDefault();
                e.returnValue = 'У вас есть несохраненные изменения. Вы уверены, что хотите уйти?';
                return e.returnValue;
            }
        }
        window.addEventListener('beforeunload', beforeUnloadHandler);

        // 6. Сохранение формы и отключение beforeunload
        document.getElementById('saveBtn').addEventListener('click', function () {
            window.removeEventListener('beforeunload', beforeUnloadHandler);

            // Заполняем и отправляем форму
            document.getElementById('formSurveyJson').value = creator.text || '{}';
            document.getElementById('saveForm').submit();

            showStatus('Сохранение...', 'info');
    });


        // 7. Статус
        function showStatus(message, type = 'info') {
            const statusEl = document.getElementById('statusMessage');
            statusEl.textContent = message;
            statusEl.style.color = type === 'success' ? 'green' :
                                  type === 'error' ? 'red' : '#666';
            if (type === 'success') {
                setTimeout(() => statusEl.textContent = '', 5000);
            }
        }
    </script>
</body>
</html>
