<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = [
            [
                'name' => 'Что такое Laravel?',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => <<<JSON
{
  "pages": [
    {
      "name": "page1",
      "elements": [
        {
          "name": "question1",
          "type": "radiogroup",
          "title": "Что такое Laravel?",
          "choices": [
            "Язык программирования",
            "PHP-фреймворк",
            "Система управления базами данных",
            "Графический редактор"
          ],
          "correctAnswer": "PHP-фреймворк"
        },
        {
          "name": "question2",
          "type": "checkbox",
          "title": "Какие преимущества Laravel?",
          "choices": [
            "Eloquent ORM",
            "Система маршрутизации",
            "Шаблонизатор Blade",
            "Встроенная аутентификация"
          ],
          "correctAnswer": [
            "Eloquent ORM",
            "Система маршрутизации",
            "Шаблонизатор Blade",
            "Встроенная аутентификация"
          ]
        },
        {
          "name": "question4",
          "type": "radiogroup",
          "title": "Какой инструмент используется для управления зависимостями в Laravel?",
          "choices": [
            "npm",
            "Composer",
            "yarn",
            "pip"
          ],
          "correctAnswer": "Composer"
        }
      ]
    }
  ],
  "title": "Тест по лекции 'Что такое Laravel?'",
  "description": "Проверка знаний по основам Laravel",
  "completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
  "showQuestionNumbers": "on"
}
JSON
                ,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Маршрутизация и контроллеры',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => <<<JSON
{
  "pages": [
    {
      "name": "page1",
      "elements": [
        {
          "name": "question1",
          "type": "radiogroup",
          "title": "Где определяются веб-маршруты в Laravel?",
          "choices": [
            "routes/api.php",
            "routes/web.php",
            "app/Http/Controllers",
            "config/routes.php"
          ],
          "correctAnswer": "routes/web.php"
        },
        {
          "name": "question2",
          "type": "dropdown",
          "title": "Какой командой создать ресурсный контроллер?",
          "choices": [
            "php artisan make:controller --resource",
            "php artisan make:model --controller",
            "php artisan make:resource",
            "php artisan controller:make"
          ],
          "correctAnswer": "php artisan make:controller --resource"
        },
        {
          "name": "question3",
          "type": "checkbox",
          "title": "Какие методы HTTP поддерживает Route::resource?",
          "choices": [
            "index",
            "create",
            "store",
            "show",
            "edit",
            "update",
            "destroy"
          ],
          "correctAnswer": [
            "index",
            "create",
            "store",
            "show",
            "edit",
            "update",
            "destroy"
          ]
        }
      ]
    }
  ],
  "title": "Тест по лекции 'Маршрутизация и контроллеры'",
  "description": "Проверка знаний по маршрутизации и контроллерам в Laravel",
  "completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
  "showQuestionNumbers": "on"
}
JSON
                ,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Eloquent ORM',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => <<<JSON
{
  "pages": [
    {
      "name": "page1",
      "elements": [
        {
          "name": "question1",
          "type": "radiogroup",
          "title": "Что такое Eloquent ORM?",
          "choices": [
            "Система кэширования",
            "Реализация шаблона Active Record",
            "Шаблонизатор",
            "Система очередей"
          ],
          "correctAnswer": "Реализация шаблона Active Record"
        },
        {
          "name": "question3",
          "rows": [
            "Один к одному",
            "Один ко многим",
            "Многие ко многим"
          ],
          "type": "matrix",
          "title": "Соответствие методов отношениям",
          "columns": [
            "hasOne",
            "hasMany",
            "belongsToMany"
          ],
          "correctAnswer": {
            "Один к одному": "hasOne",
            "Один ко многим": "hasMany",
            "Многие ко многим": "belongsToMany"
          }
        },
        {
          "name": "question4",
          "type": "checkbox",
          "title": "Какие возможности предоставляет Eloquent?",
          "choices": [
            "Мутаторы и аксессоры",
            "Мягкое удаление",
            "События моделей",
            "Ленивая загрузка"
          ],
          "correctAnswer": [
            "Мутаторы и аксессоры",
            "Мягкое удаление",
            "События моделей",
            "Ленивая загрузка"
          ]
        }
      ]
    }
  ],
  "title": "Тест по лекции 'Погружение в Eloquent ORM'",
  "description": "Проверка знаний по работе с Eloquent ORM",
  "completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
  "showQuestionNumbers": "on"
}
JSON
                ,
                'created_at' => now(),
                'updated_at' => now()
],
[
    'name' => 'Введение в JavaScript: история и назначение',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "radiogroup",
"title": "В каком году был создан JavaScript?",
"choices": ["1995", "1999", "2005", "2010"],
"correctAnswer": "1995"
},
{
"name": "question2",
"type": "checkbox",
"title": "Где применяется JavaScript?",
"choices": [
"В браузерах",
"Серверная разработка (Node.js)",
"Мобильные приложения",
"Операционные системы"
],
"correctAnswer": [
"В браузерах",
"Серверная разработка (Node.js)",
"Мобильные приложения"
]
},
{
"name": "question3",
"type": "radiogroup",
"title": "Кто создал JavaScript?",
"choices": ["Брендан Айк", "Гвидо ван Россум", "Деннис Ритчи", "Джеймс Гослинг"],
"correctAnswer": "Брендан Айк"
}
]
}],
"title": "Тест по лекции 'Введение в JavaScript'",
"description": "Проверка знаний по истории и назначению JavaScript",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
],
[
    'name' => 'Основы синтаксиса JavaScript',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "checkbox",
"title": "Какие способы объявления переменных существуют в JavaScript?",
"choices": ["var", "let", "const", "static"],
"correctAnswer": ["var", "let", "const"]
},
{
"name": "question2",
"type": "radiogroup",
"title": "Как обозначается однострочный комментарий?",
"choices": ["//", "/*", "<!--", "#"],
"correctAnswer": "//"
},
{
"name": "question3",
"type": "radiogroup",
"title": "Какая функция создает новую переменную в области видимости блока?",
"choices": ["var", "let", "const", "function"],
"correctAnswer": "let"
}
]
}],
"title": "Тест по лекции 'Основы синтаксиса JavaScript'",
"description": "Проверка знаний базового синтаксиса и объявления переменных",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
],
[
    'name' => 'Переменные, типы данных и преобразования в JavaScript',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "checkbox",
"title": "Какие типы данных есть в JavaScript?",
"choices": [
"string",
"number",
"boolean",
"object",
"undefined",
"list"
],
"correctAnswer": [
"string",
"number",
"boolean",
"object",
"undefined"
]
},
{
"name": "question2",
"type": "radiogroup",
"title": "Что вернет выражение typeof null?",
"choices": [
"\"object\"",
"\"null\"",
"\"undefined\"",
"\"boolean\""
],
"correctAnswer": "\"object\""
}
]
}],
"title": "Тест по лекции 'Переменные, типы данных и преобразования'",
"description": "Проверка знаний по переменным и типам данных в JavaScript",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
],
[
    'name' => 'Введение в PHP: история и применение',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "radiogroup",
"title": "Кто создал PHP?",
"choices": [
"Брендан Айк",
"Расмус Лердорф",
"Гвидо ван Россум",
"Джеймс Гослинг"
],
"correctAnswer": "Расмус Лердорф"
},
{
"name": "question2",
"type": "checkbox",
"title": "Где используется PHP?",
"choices": [
"Создание динамических веб-сайтов",
"Работа с базами данных",
"Мобильная разработка приложений",
"Создание REST API"
],
"correctAnswer": [
"Создание динамических веб-сайтов",
"Работа с базами данных",
"Создание REST API"
]
},
{
"name": "question3",
"type": "radiogroup",
"title": "В каком году появился PHP?",
"choices": [
"1995",
"2005",
"2010",
"1985"
],
"correctAnswer": "1995"
}
]
}],
"title": "Тест по лекции 'Введение в PHP'",
"description": "Проверка знаний по истории и применению PHP",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
],
[
    'name' => 'Основы синтаксиса PHP',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "radiogroup",
"title": "С какого тега начинается PHP-скрипт?",
"choices": [
"<?php",
"<script>",
"<php>",
"<code>"
],
"correctAnswer": "<?php"
},
{
"name": "question2",
"type": "checkbox",
"title": "Какие типы данных поддерживает PHP?",
"choices": [
"integer",
"float",
"string",
"array",
"dictionary"
],
"correctAnswer": [
"integer",
"float",
"string",
"array"
]
},
{
"name": "question3",
"type": "radiogroup",
"title": "Чем заканчивается каждая инструкция в PHP?",
"choices": [
"Точкой с запятой",
"Двоеточием",
"Запятой",
"Точкой"
],
"correctAnswer": "Точкой с запятой"
}
]
}],
"title": "Тест по лекции 'Основы синтаксиса PHP'",
"description": "Проверка знаний по базовому синтаксису PHP",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
],
[
    'name' => 'Управляющие конструкции и функции в PHP',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "radiogroup",
"title": "Какой цикл используется для обхода массивов?",
"choices": [
"for",
"foreach",
"while",
"do-while"
],
"correctAnswer": "foreach"
},
{
"name": "question2",
"type": "checkbox",
"title": "Какие управляющие конструкции есть в PHP?",
"choices": [
"if",
"else",
"switch",
"repeat",
"for"
],
"correctAnswer": [
"if",
"else",
"switch",
"for"
]
},
{
"name": "question3",
"type": "radiogroup",
"title": "С помощью какой инструкции объявляется функция в PHP?",
"choices": [
"function",
"def",
"func",
"method"
],
"correctAnswer": "function"
}
]
}],
"title": "Тест по лекции 'Управляющие конструкции и функции в PHP'",
"description": "Проверка знаний по управляющим конструкциям и функциям в PHP",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
],
[
    'name' => 'Введение в SQL: история и назначение',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "radiogroup",
"title": "Для чего применяется SQL?",
"choices": [
"Работа с реляционными базами данных",
"Создание сайтов",
"Машинное обучение",
"Дизайн интерфейсов"
],
"correctAnswer": "Работа с реляционными базами данных"
},
{
"name": "question2",
"type": "checkbox",
"title": "Какие СУБД поддерживают SQL?",
"choices": [
"MySQL",
"PostgreSQL",
"MongoDB",
"Oracle"
],
"correctAnswer": [
"MySQL",
"PostgreSQL",
"Oracle"
]
},
{
"name": "question3",
"type": "radiogroup",
"title": "Когда появился SQL?",
"choices": [
"1970-е",
"1990-е",
"2000-е",
"1960-е"
],
"correctAnswer": "1970-е"
}
]
}],
"title": "Тест по лекции 'Введение в SQL: история и назначение'",
"description": "Проверка знаний по истории и назначению SQL",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
],
[
    'name' => 'Основные команды SELECT, INSERT, UPDATE, DELETE',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "radiogroup",
"title": "Какой SQL-запрос используется для добавления данных?",
"choices": [
"INSERT",
"SELECT",
"UPDATE",
"DELETE"
],
"correctAnswer": "INSERT"
},
{
"name": "question2",
"type": "checkbox",
"title": "Какие команды относятся к DML (Data Manipulation Language)?",
"choices": [
"SELECT",
"INSERT",
"ALTER",
"UPDATE",
"DELETE"
],
"correctAnswer": [
"SELECT",
"INSERT",
"UPDATE",
"DELETE"
]
},
{
"name": "question3",
"type": "radiogroup",
"title": "Что делает команда DELETE?",
"choices": [
"Удаляет строки",
"Удаляет столбцы",
"Удаляет таблицу",
"Создаёт таблицу"
],
"correctAnswer": "Удаляет строки"
}
]
}],
"title": "Тест по лекции 'Основные команды SELECT, INSERT, UPDATE, DELETE'",
"description": "Проверка знаний по основным SQL-командам",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
],
[
    'name' => 'Создание и изменение таблиц в SQL',
    'user_id' => User::where('name', '=', 'teacher')->first()->id,
    'content' => <<<JSON
{
"pages": [{
"name": "page1",
"elements": [
{
"name": "question1",
"type": "radiogroup",
"title": "Какая команда используется для создания новой таблицы?",
"choices": [
"CREATE TABLE",
"ALTER TABLE",
"DROP TABLE",
"INSERT INTO"
],
"correctAnswer": "CREATE TABLE"
},
{
"name": "question2",
"type": "checkbox",
"title": "Какие действия можно выполнить с помощью ALTER TABLE?",
"choices": [
"Добавить столбец",
"Удалить столбец",
"Изменить тип столбца",
"Удалить строку"
],
"correctAnswer": [
"Добавить столбец",
"Удалить столбец",
"Изменить тип столбца"
]
},
{
"name": "question3",
"type": "radiogroup",
"title": "Как удалить столбец age из таблицы users?",
"choices": [
"ALTER TABLE users DROP COLUMN age;",
"DELETE FROM users WHERE age;",
"DROP TABLE users;",
"ALTER TABLE users REMOVE age;"
],
"correctAnswer": "ALTER TABLE users DROP COLUMN age;"
}
]
}],
"title": "Тест по лекции 'Создание и изменение таблиц в SQL'",
"description": "Проверка знаний по созданию и изменению таблиц в SQL",
"completedHtml": "<h3>Спасибо за прохождение теста!</h3>",
"showQuestionNumbers": "on"
}
JSON
    ,
    'created_at' => now(),
    'updated_at' => now()
]
        ];

        DB::table('tests')->insert($tests);
    }
}
