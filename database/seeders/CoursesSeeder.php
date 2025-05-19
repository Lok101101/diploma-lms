<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Laravel для начинающих',
                'description' => 'Полный курс по основам Laravel: routing, Eloquent, Blade и создание первого приложения',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Продвинутый Laravel',
                'description' => 'Изучение сложных тем: очереди, события, тестирование, производительность',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'PHP: Основы программирования',
                'description' => 'Основы PHP для начинающих: синтаксис, функции, ООП',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'JavaScript и Vue.js',
                'description' => 'Современный JavaScript и интеграция Vue.js с Laravel',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Базы данных и SQL',
                'description' => 'Работа с MySQL, оптимизация запросов и взаимодействие с Eloquent',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'API на Laravel',
                'description' => 'Создание RESTful API с аутентификацией и документацией',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('courses')->insert($courses);
    }
}
