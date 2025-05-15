<!DOCTYPE html>
<html>
<head>
    <title>Интерактивный тест</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Используем стандартную тему SurveyJS -->
    <link href="https://unpkg.com/survey-core/defaultV2.min.css" rel="stylesheet">
    <link href="https://unpkg.com/survey-core/survey-core.min.css" rel="stylesheet">
    <script src="https://unpkg.com/survey-core/survey.core.min.js"></script>
    <script src="https://unpkg.com/survey-js-ui/survey-js-ui.min.js"></script>
    <script src="https://unpkg.com/survey-core/survey.i18n.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }
        #testContainer {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        #surveyContainer {
            padding: 30px;
        }
        #resultsContainer {
            display: none;
            padding: 30px;
        }
        .result-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .result-score {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .progress-container {
            margin: 30px 0;
        }
        .progress-bar {
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
        }
        .progress {
            height: 100%;
            background-color: #4CAF50;
            width: 0%;
            transition: width 0.5s ease;
        }
        .question-result {
            margin-bottom: 25px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
        .question-text {
            font-weight: bold;
            margin-bottom: 15px;
            color: #2c3e50;
        }
        .user-answer.correct {
            color: #4CAF50;
            font-weight: bold;
        }
        .user-answer.incorrect {
            color: #f44336;
            text-decoration: line-through;
        }
        .correct-answer {
            color: #4CAF50;
            font-style: italic;
            margin-top: 5px;
        }
        .btn-retry {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 12px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-retry:hover {
            background-color: #0b7dda;
        }
        .result-grade {
        text-align: center;
        font-size: 22px;
        margin: 15px 0;
        padding: 10px;
        border-radius: 8px;
        }
        .excellent {
            background-color: #4CAF50;
            color: white;
        }
        .good {
            background-color: #8BC34A;
            color: white;
        }
        .satisfactory {
            background-color: #FFC107;
            color: #333;
        }
        .poor {
            background-color: #FF9800;
            color: white;
        }
        .fail {
            background-color: #F44336;
            color: white;
        }
    </style>
</head>
<body>
    <div id="testContainer">
        <div id="surveyContainer"></div>
        <div id="resultsContainer">
            <div class="result-header">
                <h2>Результаты теста</h2>
            </div>
            <div class="result-score">
                Правильных ответов: <span id="score">0</span> из <span id="total">0</span>
            </div>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress" id="progressBar"></div>
                </div>
            </div>
            <div id="detailedResults"></div>
            <form action="{{ route('completeTest', $test) }}" method="POST" class="flex justify-center">
                @csrf
                <input type="hidden" value="" name="estimation" id="estimation">
                <button type="submit" class="px-5 py-2.5 bg-[#17b292] text-white rounded-lg hover:bg-[#11957a] transition-colors flex items-center justify-center font-bold text-2xl w-50 cursor-pointer">Завершить</button>
            </form>
        </div>
    </div>

    <script>
        const surveyJson = JSON.parse(@json($test->content ?? '{}'));
        surveyJson.showProgressBar = 'bottom';
        surveyJson.progressBarType = 'questions';
        surveyJson.completeText = 'Завершить';

        // Инициализация теста
        const survey = new Survey.Model(surveyJson);
        survey.locale = "ru";

        // Отображение результатов
        survey.onComplete.add((sender, options) => {
            document.getElementById("surveyContainer").style.display = "none";
            document.getElementById("resultsContainer").style.display = "block";

            const questions = sender.getAllQuestions();
            let correctAnswers = 0;

            // Подсчет правильных ответов
            questions.forEach(q => {
                if (q.isAnswerCorrect()) correctAnswers++;
            });

            // Обновление статистики
            document.getElementById("score").textContent = correctAnswers;
            document.getElementById("total").textContent = questions.length;

            // Расчет процента правильных ответов
            const percentage = (correctAnswers / questions.length) * 100;
            document.getElementById("progressBar").style.width = percentage + "%";

            // Система оценок
            let grade = '';
            let gradeClass = '';
            let estimation = 0;

            if (percentage >= 90) {
                estimation = 5;
                grade = '5 (Отлично)';
                gradeClass = 'excellent';
            } else if (percentage >= 75) {
                estimation = 4;
                grade = '4 (Хорошо)';
                gradeClass = 'good';
            } else if (percentage >= 30) {
                estimation = 3;
                grade = '3 (Удовлетворительно)';
                gradeClass = 'satisfactory';
            } else if (percentage <= 29) {
                estimation = 2;
                grade = '2 (Неудовлетворительно)';
                gradeClass = 'poor';
            }

            document.getElementById('estimation').value = estimation;

            // Добавляем отображение оценки
            const gradeElement = document.createElement('div');
            gradeElement.className = `result-grade ${gradeClass}`;
            gradeElement.innerHTML = `<strong>Ваша оценка:</strong> ${grade} (${percentage}%)`;
            document.querySelector('.result-score').after(gradeElement);

            // Детализация по вопросам
            const resultsDiv = document.getElementById("detailedResults");
            resultsDiv.innerHTML = "";

            questions.forEach((question, index) => {
                const questionDiv = document.createElement("div");
                questionDiv.className = "question-result";

                questionDiv.innerHTML = `
                    <div class="question-text">${index + 1}. ${question.title}</div>
                    <div class="user-answer ${question.isAnswerCorrect() ? 'correct' : 'incorrect'}">
                        Ваш ответ: ${question.value || "Нет ответа"}
                    </div>
                    ${!question.isAnswerCorrect() ?
                        `<div class="correct-answer">Правильный ответ: ${question.correctAnswer}</div>` : ''}
                `;

                resultsDiv.appendChild(questionDiv);
        });
    });

        // Рендеринг теста после загрузки страницы
        document.addEventListener("DOMContentLoaded", function() {
            survey.render(document.getElementById("surveyContainer"));
        });
    </script>
</body>
</html>
