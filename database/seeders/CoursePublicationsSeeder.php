<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Test;
use App\Models\CoursePublication;
use Illuminate\Support\Facades\DB;

class CoursePublicationsSeeder extends Seeder
{
    protected $courseThemes = [
        'Laravel' => [
            'topics' => [
                'Введение в Laravel' => [
                    'lecture' => true,
                    'test' => 'Основы Laravel'
                ],
                'Маршрутизация и контроллеры' => [
                    'lecture' => true,
                    'test' => 'Маршрутизация в Laravel'
                ],
                'Работа с базой данных: Eloquent ORM' => [
                    'lecture' => true,
                    'test' => 'Тест по Eloquent'
                ],
                'Шаблонизатор Blade' => [
                    'lecture' => true,
                    'test' => 'Тест по Blade'
                ],
                'Аутентификация и авторизация' => [
                    'lecture' => true,
                    'test' => 'Тест по аутентификации'
                ]
            ]
        ],
        'PHP' => [
            'topics' => [
                'Основы синтаксиса PHP' => [
                    'lecture' => true,
                    'test' => 'Базовый синтаксис PHP'
                ],
                'Функции и массивы' => [
                    'lecture' => true,
                    'test' => 'Тест по функциям и массивам'
                ],
                'Объектно-ориентированное программирование' => [
                    'lecture' => true,
                    'test' => 'ООП в PHP'
                ],
                'Работа с файлами и формами' => [
                    'lecture' => true,
                    'test' => 'Тест по работе с файлами'
                ]
            ]
        ],
        'JavaScript' => [
            'topics' => [
                'Основы JavaScript' => [
                    'lecture' => true,
                    'test' => 'Базовый JavaScript'
                ],
                'Работа с DOM' => [
                    'lecture' => true,
                    'test' => 'Тест по DOM'
                ],
                'Асинхронный JavaScript' => [
                    'lecture' => true,
                    'test' => 'Тест по асинхронности'
                ],
                'ES6+ особенности' => [
                    'lecture' => true,
                    'test' => 'Тест по ES6+'
                ]
            ]
        ]
    ];

    public function run()
    {
        DB::transaction(function () {
            Course::each(function ($course) {
                $theme = $this->determineCourseTheme($course->name);

                foreach ($this->courseThemes[$theme]['topics'] as $topicTitle => $topic) {
                    if ($topic['lecture']) {
                        $lesson = Lesson::create([
                            'name' => $topicTitle,
                            'user_id' => $course->user_id,
                            'content' => json_encode($this->generateThematicLectureContent($topicTitle, $theme)),
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);

                        CoursePublication::create([
                            'course_id' => $course->id,
                            'lesson_id' => $lesson->id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }

                    if (isset($topic['test'])) {
                        $testContent = $this->generateThematicTestContent($topic['test'], $topicTitle, $theme);

                        if (empty($testContent['pages'][0]['elements'])) {
                            $testContent['pages'][0]['elements'] = $this->getFallbackQuestions($topicTitle);
                        }

                        $test = Test::create([
                            'name' => $topic['test'],
                            'user_id' => $course->user_id,
                            'content' => json_encode($testContent),
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);

                        CoursePublication::create([
                            'course_id' => $course->id,
                            'test_id' => $test->id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                }
            });
        });
    }

    protected function determineCourseTheme(string $courseName): string
    {
        if (stripos($courseName, 'Laravel') !== false) return 'Laravel';
        if (stripos($courseName, 'PHP') !== false) return 'PHP';
        if (stripos($courseName, 'JavaScript') !== false) return 'JavaScript';

        return 'Laravel';
    }

    protected function generateThematicLectureContent(string $title, string $theme): array
    {
        $content = [
            'time' => now()->timestamp,
            'blocks' => [
                [
                    'type' => 'header',
                    'data' => [
                        'text' => $title,
                        'level' => 1
                    ]
                ],
                [
                    'type' => 'paragraph',
                    'data' => [
                        'text' => $this->getLectureIntroduction($theme, $title)
                    ]
                ],
                [
                    'type' => 'header',
                    'data' => [
                        'text' => 'Основные концепции',
                        'level' => 2
                    ]
                ],
                [
                    'type' => 'paragraph',
                    'data' => [
                        'text' => $this->getLectureMainContent($theme, $title)
                    ]
                ]
            ],
            'version' => '2.22.2'
        ];

        $content['blocks'] = array_merge($content['blocks'], $this->getThemeSpecificBlocks($theme, $title));

        $content['blocks'][] = [
            'type' => 'header',
            'data' => [
                'text' => 'Заключение',
                'level' => 2
            ]
        ];

        $content['blocks'][] = [
            'type' => 'paragraph',
            'data' => [
                'text' => $this->getLectureConclusion($theme, $title)
            ]
        ];

        return $content;
    }

    protected function generateThematicTestContent(string $testTitle, string $lectureTitle, string $theme): array
    {
        $testData = [
            'pages' => [
                [
                    'name' => $testTitle,
                    'elements' => $this->getQuestionsForTopic($theme, $lectureTitle)
                ]
            ],
            'headerView' => 'advanced'
        ];

        return $testData;
    }

    protected function getQuestionsForTopic(string $theme, string $lectureTitle): array
    {
        $questions = [];

        $commonQuestions = [
            [
                'type' => 'radiogroup',
                'name' => 'difficulty_rating',
                'title' => 'Как вы оцениваете сложность материала?',
                'choices' => ['Очень легко', 'Легко', 'Средне', 'Сложно', 'Очень сложно'],
                'isRequired' => true
            ]
        ];

        $thematicQuestions = [
            'Laravel' => [
                'Введение в Laravel' => [
                    [
                        'type' => 'text',
                        'name' => 'laravel_definition',
                        'title' => 'Что такое Laravel?',
                        'correctAnswer' => 'PHP фреймворк',
                        'isRequired' => true
                    ],
                    [
                        'type' => 'radiogroup',
                        'name' => 'laravel_install',
                        'title' => 'Как установить Laravel?',
                        'correctAnswer' => 'composer create-project',
                        'choices' => [
                            'npm install laravel',
                            'composer create-project',
                            'download zip архив',
                            'git clone'
                        ]
                    ]
                ],
                'Маршрутизация и контроллеры' => [
                    [
                        'type' => 'text',
                        'name' => 'route_definition',
                        'title' => 'Что такое маршрут в Laravel?',
                        'correctAnswer' => 'URL endpoint',
                        'isRequired' => true
                    ],
                    [
                        'type' => 'checkbox',
                        'name' => 'route_methods',
                        'title' => 'Какие HTTP методы поддерживают маршруты?',
                        'correctAnswer' => ['GET', 'POST', 'PUT', 'DELETE'],
                        'choices' => ['GET', 'POST', 'PUT', 'DELETE', 'PING']
                    ]
                ]
            ],
            'PHP' => [
                'Основы синтаксиса PHP' => [
                    [
                        'type' => 'radiogroup',
                        'name' => 'php_definition',
                        'title' => 'Что такое PHP?',
                        'correctAnswer' => 'Язык программирования',
                        'choices' => [
                            'База данных',
                            'Фреймворк',
                            'Язык программирования',
                            'Библиотека'
                        ]
                    ],
                    [
                        'type' => 'text',
                        'name' => 'php_tags',
                        'title' => 'Как начинается PHP код?',
                        'correctAnswer' => '<?php'
                    ]
                ]
            ],
            'JavaScript' => [
                'Основы JavaScript' => [
                    [
                        'type' => 'radiogroup',
                        'name' => 'js_definition',
                        'title' => 'Где выполняется JavaScript?',
                        'correctAnswer' => 'В браузере',
                        'choices' => ['На сервере', 'В браузере', 'В базе данных', 'В командной строке']
                    ]
                ]
            ]
        ];

        if (isset($thematicQuestions[$theme][$lectureTitle])) {
            $questions = $thematicQuestions[$theme][$lectureTitle];
        }

        return array_merge($questions, $commonQuestions);
    }

    protected function getFallbackQuestions(string $topicTitle): array
    {
        return [
            [
                'type' => 'text',
                'name' => 'main_concept',
                'title' => 'Назовите основной концепт из темы "'.$topicTitle.'"',
                'isRequired' => true
            ],
            [
                'type' => 'radiogroup',
                'name' => 'importance',
                'title' => 'Насколько важна эта тема?',
                'choices' => ['Не важно', 'Средней важности', 'Очень важно']
            ]
        ];
    }

    protected function getLectureIntroduction(string $theme, string $title): string
    {
        $introductions = [
            'Laravel' => [
                'Введение в Laravel' => 'Laravel - это современный PHP-фреймворк для веб-разработки...',
                'Маршрутизация и контроллеры' => 'Маршрутизация - фундаментальная концепция Laravel...'
            ],
            'PHP' => [
                'Основы синтаксиса PHP' => 'PHP - серверный язык программирования...'
            ],
            'JavaScript' => [
                'Основы JavaScript' => 'JavaScript - язык программирования для веб-страниц...'
            ]
        ];

        return $introductions[$theme][$title] ?? 'Введение в тему: '.$title;
    }

    protected function getLectureMainContent(string $theme, string $title): string
    {
        $contents = [
            'Laravel' => [
                'Введение в Laravel' => 'Laravel предоставляет элегантный синтаксис...',
                'Маршрутизация и контроллеры' => 'Маршруты в Laravel определяются...'
            ],
            'PHP' => [
                'Основы синтаксиса PHP' => 'PHP скрипты выполняются на сервере...'
            ],
            'JavaScript' => [
                'Основы JavaScript' => 'JavaScript добавляет интерактивность...'
            ]
        ];

        return $contents[$theme][$title] ?? 'Основное содержание лекции по теме: '.$title;
    }

    protected function getThemeSpecificBlocks(string $theme, string $title): array
    {
        $blocks = [];

        switch ($theme) {
            case 'Laravel':
                if (strpos($title, 'Введение') !== false) {
                    $blocks = [
                        [
                            'type' => 'code',
                            'data' => [
                                'code' => "<?php\n\nRoute::get('/', function () {\n    return view('welcome');\n});",
                                'language' => 'php'
                            ]
                        ]
                    ];
                }
                break;
            case 'PHP':
                $blocks = [
                    [
                        'type' => 'code',
                        'data' => [
                            'code' => "<?php\n\necho 'Hello World!';",
                            'language' => 'php'
                        ]
                    ]
                ];
                break;
            case 'JavaScript':
                $blocks = [
                    [
                        'type' => 'code',
                        'data' => [
                            'code' => "console.log('Hello World!');",
                            'language' => 'javascript'
                        ]
                    ]
                ];
                break;
        }

        return $blocks;
    }

    protected function getLectureConclusion(string $theme, string $title): string
    {
        $conclusions = [
            'Laravel' => [
                'Введение в Laravel' => 'Теперь вы знакомы с основами Laravel...',
                'Маршрутизация и контроллеры' => 'Вы научились создавать маршруты...'
            ],
            'PHP' => [
                'Основы синтаксиса PHP' => 'Вы освоили базовый синтаксис PHP...'
            ],
            'JavaScript' => [
                'Основы JavaScript' => 'Вы изучили основы JavaScript...'
            ]
        ];

        return $conclusions[$theme][$title] ?? 'На этом лекция завершена. Не забывайте практиковаться!';
    }
}
