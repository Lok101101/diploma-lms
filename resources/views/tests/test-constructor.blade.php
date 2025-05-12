<!DOCTYPE html>
<html>
<head>
    <title>Конструктор теста</title>
    <link href="https://unpkg.com/survey-core/survey-core.min.css" type="text/css" rel="stylesheet">
    <script src="https://unpkg.com/survey-core/survey.core.min.js"></script>
    <script src="https://unpkg.com/survey-js-ui/survey-js-ui.min.js"></script>
    <link href="https://unpkg.com/survey-creator-core/survey-creator-core.min.css" type="text/css" rel="stylesheet">
    <script src="https://unpkg.com/survey-creator-core/survey-creator-core.min.js"></script>
    <script src="https://unpkg.com/survey-creator-js/survey-creator-js.min.js"></script>
    <script src="https://unpkg.com/survey-creator-core/survey-creator-core.i18n.min.js"></script>

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
        /* Стили для скрытой формы */
        #saveForm {
            display: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <input type="text" id="surveyName" placeholder="Название теста" value="Тест">
            <button id="saveBtn">Сохранить на сервер</button>
            <span id="statusMessage"></span>
        </div>
    </div>
    <div id="surveyCreator"></div>

    <!-- Скрытая форма для отправки данных -->
    <form id="saveForm" method="POST" action="{{ route('createTest') }}">
        @csrf <!-- CSRF токен для Laravel -->
        <input type="hidden" name="name" id="formSurveyName">
        <input type="hidden" name="content" id="formSurveyJson">
    </form>

    <script>
        // Инициализация редактора
        const creator = new SurveyCreator.SurveyCreator({
            showLogicTab: true,
            isAutoSave: true
        });
        creator.render("surveyCreator");

        // Ключ для localStorage
        const STORAGE_KEY = 'surveyjs_editor_data';
        let isSavedToServer = false;
        let initialSurveyJson = JSON.stringify(creator.JSON);

        // Проверка изменений
        function hasUnsavedChanges() {
            return JSON.stringify(creator.JSON) !== initialSurveyJson;
        }

        // Обработчик перед закрытием страницы
        window.addEventListener('beforeunload', (e) => {
            if (hasUnsavedChanges() && !isSavedToServer) {
                e.preventDefault();
                e.returnValue = 'У вас есть несохраненные изменения. Вы уверены, что хотите уйти?';
                return e.returnValue;
            }
        });

        // Отслеживание изменений
        creator.onModified.add(() => {
            const surveyName = document.getElementById('surveyName').value || 'Тест';
            const surveyJson = creator.text;

            localStorage.setItem(STORAGE_KEY, JSON.stringify({
                name: surveyName,
                json: surveyJson
            }));

            showStatus('Автосохранено: ' + new Date().toLocaleTimeString());
        });

        // Отправка на сервер через форму
        document.getElementById('saveBtn').addEventListener('click', () => {
            const surveyName = document.getElementById('surveyName').value || 'Тест';
            const surveyJson = creator.text;

            // Заполняем скрытую форму
            document.getElementById('formSurveyName').value = surveyName;
            document.getElementById('formSurveyJson').value = surveyJson;

            // Отправляем форму
            document.getElementById('saveForm').submit();

            // Обновляем статус (это сработает только если форма не перезагрузит страницу)
            isSavedToServer = true;
            initialSurveyJson = JSON.stringify(creator.JSON);
            showStatus('Отправка данных на сервер...', 'info');
        });

        // Показать статус
        function showStatus(message, type = 'info') {
            const statusEl = document.getElementById('statusMessage');
            statusEl.textContent = message;
            statusEl.style.color = type === 'success' ? 'green' :
                                type === 'error' ? 'red' : '#666';

            if (type === 'success') {
                setTimeout(() => statusEl.textContent = '', 3000);
            }
        }

        // Загрузка сохраненного теста
        const savedData = localStorage.getItem(STORAGE_KEY);
        if (savedData) {
            const { name, json } = JSON.parse(savedData);
            document.getElementById('surveyName').value = name;
            creator.text = json;
            initialSurveyJson = json;
        }
    </script>
</body>
</html>
