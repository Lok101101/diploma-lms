<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = [
            [
                'name' => 'Что такое Laravel?',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{"time": 1748036628908, "blocks": [{"id": "YYwEcy1p1a", "data": {"text": "Что такое Laravel и почему он так популярен?", "level": 2}, "type": "header"}, {"id": "sel_AlLvTc", "data": {"text": "Laravel - это современный PHP-фреймворк с открытым исходным кодом, который произвел революцию в веб-разработке на PHP. По данным <a href=\"https://surveys.jetbrains.com/\">JetBrains Developer Survey 2022</a>, Laravel используют 50% PHP-разработчиков."}, "type": "paragraph"}, {"id": "6pLdAgkkkr", "data": {"url": "https://laravel.com/img/logomark.min.svg", "caption": "Официальный логотип Laravel", "stretched": false, "withBorder": true, "withBackground": true}, "type": "simpleImage"}, {"id": "6rM1Wzte3L", "data": {}, "type": "delimiter"}, {"id": "YV5WfejTVr", "data": {"text": "Ключевые преимущества Laravel", "level": 3}, "type": "header"}, {"id": "5DaJxCQFBO", "data": {"meta": {}, "items": [{"meta": {}, "items": [], "content": "Элегантный синтаксис и простота обучения"}, {"meta": {}, "items": [], "content": "Мощная система маршрутизации"}, {"meta": {}, "items": [], "content": "Eloquent ORM - одна из лучших реализаций ActiveRecord"}, {"meta": {}, "items": [], "content": "Встроенная система аутентификации (включая Socialite для OAuth)"}, {"meta": {}, "items": [], "content": "Шаблонизатор Blade с наследованием шаблонов"}, {"meta": {}, "items": [], "content": "Система очередей для фоновых задач"}, {"meta": {}, "items": [], "content": "Тестирование из коробки (PHPUnit)"}, {"meta": {}, "items": [], "content": "Экосистема (Forge, Envoyer, Vapor, Nova)"}], "style": "unordered"}, "type": "list"}, {"id": "b8fzMnv4r9", "data": {"text": "Для сравнения с другими фреймворками рекомендую статью <a href=\"https://kinsta.com/blog/laravel-vs-symfony/\">Laravel vs Symfony</a> на Kinsta."}, "type": "paragraph"}, {"id": "hLqo6LivVh", "data": {}, "type": "delimiter"}, {"id": "Uv7zKTmzBe", "data": {"text": "Установка и настройка окружения", "level": 3}, "type": "header"}, {"id": "ImsXTGtQI0", "data": {"text": "Для работы с Laravel вам потребуется:"}, "type": "paragraph"}, {"id": "NxmRQEOWHj", "data": {"meta": {"counterType": "numeric"}, "items": [{"meta": {}, "items": [], "content": "PHP ≥ 8.0 (рекомендуется 8.2)"}, {"meta": {}, "items": [], "content": "Composer (менеджер зависимостей)"}, {"meta": {}, "items": [], "content": "База данных (MySQL, PostgreSQL, SQLite)"}], "style": "ordered"}, "type": "list"}, {"id": "BxcEYrrxbU", "data": {"code": "# Установка через Laravel Installer\ncomposer global require laravel/installer\nlaravel new project-name\n\n# Или через Composer\ncomposer create-project --prefer-dist laravel/laravel project-name"}, "type": "code"}, {"id": "7c2T0pV5VH", "data": {"text": "Для локальной разработки можно использовать <a href=\"https://laravel.com/docs/sail\">Laravel Sail</a> (Docker) или <a href=\"https://laragon.org/\">Laragon</a> (Windows)."}, "type": "paragraph"}, {"id": "Yu7Ttb_fjP", "data": {"embed": "https://www.youtube.com/embed/ImtZ5yENzgE", "width": 580, "height": 320, "source": "https://www.youtube.com/watch?v=ImtZ5yENzgE", "caption": "Установка Laravel с нуля", "service": "youtube"}, "type": "embed"}, {"id": "ph0pcPpSM3", "data": {}, "type": "delimiter"}, {"id": "vOJKwcdVSs", "data": {"text": "Структура проекта Laravel", "level": 3}, "type": "header"}, {"id": "58B6m6Jf9e", "data": {"text": "Основные директории:"}, "type": "paragraph"}, {"id": "RMuetIUFUg", "data": {"meta": {}, "items": [{"meta": {}, "items": [], "content": "app/ - ядро приложения (модели, контроллеры)"}, {"meta": {}, "items": [], "content": "config/ - файлы конфигурации"}, {"meta": {}, "items": [], "content": "database/ - миграции, сидеры, фабрики"}, {"meta": {}, "items": [], "content": "public/ - точка входа и публичные ассеты"}, {"meta": {}, "items": [], "content": "resources/ - шаблоны Blade, JS/SASS"}, {"meta": {}, "items": [], "content": "routes/ - маршруты"}, {"meta": {}, "items": [], "content": "storage/ - логи, загруженные файлы"}, {"meta": {}, "items": [], "content": "tests/ - тесты"}], "style": "unordered"}, "type": "list"}, {"id": "gMGVhQATt7", "data": {"text": "Подробнее о структуре можно узнать в <a href=\"https://laravel.com/docs/structure\">официальной документации</a>."}, "type": "paragraph"}], "version": "2.31.0-rc.7"}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Маршрутизация и контроллеры в Laravel',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{"time": 1748037034894, "blocks": [{"id": "wYYC2SotgH", "data": {"text": "Маршрутизация и контроллеры в Laravel", "level": 2}, "type": "header"}, {"id": "fIpeY7UXFQ", "data": {"text": "Laravel предлагает одну из самых мощных систем маршрутизации среди PHP-фреймворков. Все маршруты определяются в файлах routes/web.php (для веб) и routes/api.php (для API)."}, "type": "paragraph"}, {"id": "HkGV-L1ufI", "data": {"url": "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAiIGhlaWdodD0iNTIiIHZpZXdCb3g9IjAgMCA1MCA1MiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48dGl0bGU+TG9nb21hcms8L3RpdGxlPjxwYXRoIGQ9Ik00OS42MjYgMTEuNTY0YS44MDkuODA5IDAgMCAxIC4wMjguMjA5djEwLjk3MmEuOC44IDAgMCAxLS40MDIuNjk0bC05LjIwOSA1LjMwMlYzOS4yNWMwIC4yODYtLjE1Mi41NS0uNC42OTRMMjAuNDIgNTEuMDFjLS4wNDQuMDI1LS4wOTIuMDQxLS4xNC4wNTgtLjAxOC4wMDYtLjAzNS4wMTctLjA1NC4wMjJhLjgwNS44MDUgMCAwIDEtLjQxIDBjLS4wMjItLjAwNi0uMDQyLS4wMTgtLjA2My0uMDI2LS4wNDQtLjAxNi0uMDktLjAzLS4xMzItLjA1NEwuNDAyIDM5Ljk0NEEuODAxLjgwMSAwIDAgMSAwIDM5LjI1VjYuMzM0YzAtLjA3Mi4wMS0uMTQyLjAyOC0uMjEuMDA2LS4wMjMuMDItLjA0NC4wMjgtLjA2Ny4wMTUtLjA0Mi4wMjktLjA4NS4wNTEtLjEyNC4wMTUtLjAyNi4wMzctLjA0Ny4wNTUtLjA3MS4wMjMtLjAzMi4wNDQtLjA2NS4wNzEtLjA5My4wMjMtLjAyMy4wNTMtLjA0LjA3OS0uMDYuMDI5LS4wMjQuMDU1LS4wNS4wODgtLjA2OWguMDAxbDkuNjEtNS41MzNhLjgwMi44MDIgMCAwIDEgLjggMGw5LjYxIDUuNTMzaC4wMDJjLjAzMi4wMi4wNTkuMDQ1LjA4OC4wNjguMDI2LjAyLjA1NS4wMzguMDc4LjA2LjAyOC4wMjkuMDQ4LjA2Mi4wNzIuMDk0LjAxNy4wMjQuMDQuMDQ1LjA1NC4wNzEuMDIzLjA0LjAzNi4wODIuMDUyLjEyNC4wMDguMDIzLjAyMi4wNDQuMDI4LjA2OGEuODA5LjgwOSAwIDAgMSAuMDI4LjIwOXYyMC41NTlsOC4wMDgtNC42MTF2LTEwLjUxYzAtLjA3LjAxLS4xNDEuMDI4LS4yMDguMDA3LS4wMjQuMDItLjA0NS4wMjgtLjA2OC4wMTYtLjA0Mi4wMy0uMDg1LjA1Mi0uMTI0LjAxNS0uMDI2LjAzNy0uMDQ3LjA1NC0uMDcxLjAyNC0uMDMyLjA0NC0uMDY1LjA3Mi0uMDkzLjAyMy0uMDIzLjA1Mi0uMDQuMDc4LS4wNi4wMy0uMDI0LjA1Ni0uMDUuMDg4LS4wNjloLjAwMWw5LjYxMS01LjUzM2EuODAxLjgwMSAwIDAgMSAuOCAwbDkuNjEgNS41MzNjLjAzNC4wMi4wNi4wNDUuMDkuMDY4LjAyNS4wMi4wNTQuMDM4LjA3Ny4wNi4wMjguMDI5LjA0OC4wNjIuMDcyLjA5NC4wMTguMDI0LjA0LjA0NS4wNTQuMDcxLjAyMy4wMzkuMDM2LjA4Mi4wNTIuMTI0LjAwOS4wMjMuMDIyLjA0NC4wMjguMDY4em0tMS41NzQgMTAuNzE4di05LjEyNGwtMy4zNjMgMS45MzYtNC42NDYgMi42NzV2OS4xMjRsOC4wMS00LjYxMXptLTkuNjEgMTYuNTA1di05LjEzbC00LjU3IDIuNjEtMTMuMDUgNy40NDh2OS4yMTZsMTcuNjItMTAuMTQ0ek0xLjYwMiA3LjcxOXYzMS4wNjhMMTkuMjIgNDguOTN2LTkuMjE0bC05LjIwNC01LjIwOS0uMDAzLS4wMDItLjAwNC0uMDAyYy0uMDMxLS4wMTgtLjA1Ny0uMDQ0LS4wODYtLjA2Ni0uMDI1LS4wMi0uMDU0LS4wMzYtLjA3Ni0uMDU4bC0uMDAyLS4wMDNjLS4wMjYtLjAyNS0uMDQ0LS4wNTYtLjA2Ni0uMDg0LS4wMi0uMDI3LS4wNDQtLjA1LS4wNi0uMDc4bC0uMDAxLS4wMDNjLS4wMTgtLjAzLS4wMjktLjA2Ni0uMDQyLS4xLS4wMTMtLjAzLS4wMy0uMDU4LS4wMzgtLjA5di0uMDAxYy0uMDEtLjAzOC0uMDEyLS4wNzgtLjAxNi0uMTE3LS4wMDQtLjAzLS4wMTItLjA2LS4wMTItLjA5di0uMDAyLTIxLjQ4MUw0Ljk2NSA5LjY1NCAxLjYwMiA3Ljcyem04LjgxLTUuOTk0TDIuNDA1IDYuMzM0bDguMDA1IDQuNjA5IDguMDA2LTQuNjEtOC4wMDYtNC42MDh6bTQuMTY0IDI4Ljc2NGw0LjY0NS0yLjY3NFY3LjcxOWwtMy4zNjMgMS45MzYtNC42NDYgMi42NzV2MjAuMDk2bDMuMzY0LTEuOTM3ek0zOS4yNDMgNy4xNjRsLTguMDA2IDQuNjA5IDguMDA2IDQuNjA5IDguMDA1LTQuNjEtOC4wMDUtNC42MDh6bS0uODAxIDEwLjYwNWwtNC42NDYtMi42NzUtMy4zNjMtMS45MzZ2OS4xMjRsNC42NDUgMi42NzQgMy4zNjQgMS45Mzd2LTkuMTI0ek0yMC4wMiAzOC4zM2wxMS43NDMtNi43MDQgNS44Ny0zLjM1LTgtNC42MDYtOS4yMTEgNS4zMDMtOC4zOTUgNC44MzMgNy45OTMgNC41MjR6IiBmaWxsPSIjRkYyRDIwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4=", "caption": "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Логотип Laravel", "stretched": false, "withBorder": false, "withBackground": true}, "type": "simpleImage"}, {"id": "w0AD9rUgOM", "data": {}, "type": "delimiter"}, {"id": "ynGB_O8N0n", "data": {"text": "Типы маршрутов", "level": 3}, "type": "header"}, {"id": "lN386C2UOg", "data": {"code": "// Базовый маршрут\nRoute::get(\'/\', function () {\n    return \'Главная страница\';\n});\n\n// Маршрут с параметрами\nRoute::get(\'user/{id}\', function ($id) {\n    return \'Пользователь \'.$id;\n});\n\n// Маршрут с несколькими методами\nRoute::match([\'get\', \'post\'], \'/contact\', function () {\n    // ...\n});\n\n// Маршрут для всех методов\nRoute::any(\'/any\', function () {\n    // ...\n});"}, "type": "code"}, {"id": "WREYLREgLC", "data": {"text": "Документация по маршрутизации: <a href=\"https://laravel.com/docs/routing\">Laravel Routing</a>"}, "type": "paragraph"}, {"id": "GPkWXeDQJ7", "data": {}, "type": "delimiter"}, {"id": "iesRhxW1uu", "data": {"text": "Группировка маршрутов", "level": 3}, "type": "header"}, {"id": "AhmVlbZjrX", "data": {"text": "Laravel позволяет группировать маршруты с общими атрибутами:"}, "type": "paragraph"}, {"id": "AndjQsbU2O", "data": {"code": "// Группа с префиксом\nRoute::prefix(\'admin\')->group(function () {\n    Route::get(\'users\', function () {\n        // /admin/users\n    });\n});\n\n// Группа с middleware\nRoute::middleware([\'auth\'])->group(function () {\n    Route::get(\'profile\', function () {\n        // Только для аутентифицированных\n    });\n});\n\n// Группа для API\nRoute::name(\'api.\')->prefix(\'api\')->group(function () {\n    Route::get(\'users\', function () {\n        // ...\n    })->name(\'users\'); // api.users\n});"}, "type": "code"}, {"id": "ONLGClyOj-", "data": {}, "type": "delimiter"}, {"id": "Ryare8TLdr", "data": {"text": "Ресурсные контроллеры", "level": 3}, "type": "header"}, {"id": "EmaVd4FxeF", "data": {"text": "Laravel генерирует все CRUD-методы одной командой:"}, "type": "paragraph"}, {"id": "Q2ORZFTfuJ", "data": {"code": "php artisan make:controller PhotoController --resource --model=Photo"}, "type": "code"}, {"id": "NFyaZsUGEI", "data": {"text": "Это создаст контроллер с методами: index, create, store, show, edit, update, destroy"}, "type": "paragraph"}, {"id": "oGBgi_1gB_", "data": {"text": "Подробнее о ресурсных контроллерах: <a href=\"https://laravel.com/docs/controllers#resource-controllers\">Resource Controllers</a>"}, "type": "paragraph"}, {"id": "IdwulAphEp", "data": {"embed": "https://www.youtube.com/embed/i_pkBJSVFzA", "width": 580, "height": 320, "source": "https://www.youtube.com/watch?v=i_pkBJSVFzA", "caption": "Маршрутизация Laravel с нуля", "service": "youtube"}, "type": "embed"}], "version": "2.31.0-rc.7"}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Погружение в Eloquent ORM',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                "content" => "{\"time\": 1748038319699, \"blocks\": [{\"id\": \"_MZXNTqhnZ\", \"data\": {\"text\": \"&nbsp;Погружение в Eloquent ORM\", \"level\": 2}, \"type\": \"header\"}, {\"id\": \"camnWcKDtN\", \"data\": {\"url\": \"data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAiIGhlaWdodD0iNTIiIHZpZXdCb3g9IjAgMCA1MCA1MiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48dGl0bGU+TG9nb21hcms8L3RpdGxlPjxwYXRoIGQ9Ik00OS42MjYgMTEuNTY0YS44MDkuODA5IDAgMCAxIC4wMjguMjA5djEwLjk3MmEuOC44IDAgMCAxLS40MDIuNjk0bC05LjIwOSA1LjMwMlYzOS4yNWMwIC4yODYtLjE1Mi41NS0uNC42OTRMMjAuNDIgNTEuMDFjLS4wNDQuMDI1LS4wOTIuMDQxLS4xNC4wNTgtLjAxOC4wMDYtLjAzNS4wMTctLjA1NC4wMjJhLjgwNS44MDUgMCAwIDEtLjQxIDBjLS4wMjItLjAwNi0uMDQyLS4wMTgtLjA2My0uMDI2LS4wNDQtLjAxNi0uMDktLjAzLS4xMzItLjA1NEwuNDAyIDM5Ljk0NEEuODAxLjgwMSAwIDAgMSAwIDM5LjI1VjYuMzM0YzAtLjA3Mi4wMS0uMTQyLjAyOC0uMjEuMDA2LS4wMjMuMDItLjA0NC4wMjgtLjA2Ny4wMTUtLjA0Mi4wMjktLjA4NS4wNTEtLjEyNC4wMTUtLjAyNi4wMzctLjA0Ny4wNTUtLjA3MS4wMjMtLjAzMi4wNDQtLjA2NS4wNzEtLjA5My4wMjMtLjAyMy4wNTMtLjA0LjA3OS0uMDYuMDI5LS4wMjQuMDU1LS4wNS4wODgtLjA2OWguMDAxbDkuNjEtNS41MzNhLjgwMi44MDIgMCAwIDEgLjggMGw5LjYxIDUuNTMzaC4wMDJjLjAzMi4wMi4wNTkuMDQ1LjA4OC4wNjguMDI2LjAyLjA1NS4wMzguMDc4LjA2LjAyOC4wMjkuMDQ4LjA2Mi4wNzIuMDk0LjAxNy4wMjQuMDQuMDQ1LjA1NC4wNzEuMDIzLjA0LjAzNi4wODIuMDUyLjEyNC4wMDguMDIzLjAyMi4wNDQuMDI4LjA2OGEuODA5LjgwOSAwIDAgMSAuMDI4LjIwOXYyMC41NTlsOC4wMDgtNC42MTF2LTEwLjUxYzAtLjA3LjAxLS4xNDEuMDI4LS4yMDguMDA3LS4wMjQuMDItLjA0NS4wMjgtLjA2OC4wMTYtLjA0Mi4wMy0uMDg1LjA1Mi0uMTI0LjAxNS0uMDI2LjAzNy0uMDQ3LjA1NC0uMDcxLjAyNC0uMDMyLjA0NC0uMDY1LjA3Mi0uMDkzLjAyMy0uMDIzLjA1Mi0uMDQuMDc4LS4wNi4wMy0uMDI0LjA1Ni0uMDUuMDg4LS4wNjloLjAwMWw5LjYxMS01LjUzM2EuODAxLjgwMSAwIDAgMSAuOCAwbDkuNjEgNS41MzNjLjAzNC4wMi4wNi4wNDUuMDkuMDY4LjAyNS4wMi4wNTQuMDM4LjA3Ny4wNi4wMjguMDI5LjA0OC4wNjIuMDcyLjA5NC4wMTguMDI0LjA0LjA0NS4wNTQuMDcxLjAyMy4wMzkuMDM2LjA4Mi4wNTIuMTI0LjAwOS4wMjMuMDIyLjA0NC4wMjguMDY4em0tMS41NzQgMTAuNzE4di05LjEyNGwtMy4zNjMgMS45MzYtNC42NDYgMi42NzV2OS4xMjRsOC4wMS00LjYxMXptLTkuNjEgMTYuNTA1di05LjEzbC00LjU3IDIuNjEtMTMuMDUgNy40NDh2OS4yMTZsMTcuNjItMTAuMTQ0ek0xLjYwMiA3LjcxOXYzMS4wNjhMMTkuMjIgNDguOTN2LTkuMjE0bC05LjIwNC01LjIwOS0uMDAzLS4wMDItLjAwNC0uMDAyYy0uMDMxLS4wMTgtLjA1Ny0uMDQ0LS4wODYtLjA2Ni0uMDI1LS4wMi0uMDU0LS4wMzYtLjA3Ni0uMDU4bC0uMDAyLS4wMDNjLS4wMjYtLjAyNS0uMDQ0LS4wNTYtLjA2Ni0uMDg0LS4wMi0uMDI3LS4wNDQtLjA1LS4wNi0uMDc4bC0uMDAxLS4wMDNjLS4wMTgtLjAzLS4wMjktLjA2Ni0uMDQyLS4xLS4wMTMtLjAzLS4wMy0uMDU4LS4wMzgtLjA5di0uMDAxYy0uMDEtLjAzOC0uMDEyLS4wNzgtLjAxNi0uMTE3LS4wMDQtLjAzLS4wMTItLjA2LS4wMTItLjA5di0uMDAyLTIxLjQ4MUw0Ljk2NSA5LjY1NCAxLjYwMiA3Ljcyem04LjgxLTUuOTk0TDIuNDA1IDYuMzM0bDguMDA1IDQuNjA5IDguMDA2LTQuNjEtOC4wMDYtNC42MDh6bTQuMTY0IDI4Ljc2NGw0LjY0NS0yLjY3NFY3LjcxOWwtMy4zNjMgMS45MzYtNC42NDYgMi42NzV2MjAuMDk2bDMuMzY0LTEuOTM3ek0zOS4yNDMgNy4xNjRsLTguMDA2IDQuNjA5IDguMDA2IDQuNjA5IDguMDA1LTQuNjEtOC4wMDUtNC42MDh6bS0uODAxIDEwLjYwNWwtNC42NDYtMi42NzUtMy4zNjMtMS45MzZ2OS4xMjRsNC42NDUgMi42NzQgMy4zNjQgMS45Mzd2LTkuMTI0ek0yMC4wMiAzOC4zM2wxMS43NDMtNi43MDQgNS44Ny0zLjM1LTgtNC42MDYtOS4yMTEgNS4zMDMtOC4zOTUgNC44MzMgNy45OTMgNC41MjR6IiBmaWxsPSIjRkYyRDIwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4=\", \"caption\": \"&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Логотип Laravel\", \"stretched\": false, \"withBorder\": false, \"withBackground\": true}, \"type\": \"simpleImage\"}, {\"id\": \"ugTo9sJ99h\", \"data\": {\"text\": \"Eloquent - это реализация шаблона Active Record в Laravel, предоставляющая простой и выразительный способ работы с базой данных. По сравнению с Raw SQL или другими ORM, Eloquent предлагает:\"}, \"type\": \"paragraph\"}, {\"id\": \"mBqeeSgLqy\", \"data\": {\"meta\": {}, \"items\": [{\"meta\": {}, \"items\": [], \"content\": \"Автоматическое маппинг таблиц на модели\"}, {\"meta\": {}, \"items\": [], \"content\": \"Отношения между моделями (1:1, 1:n, n:m)\"}, {\"meta\": {}, \"items\": [], \"content\": \"Мутаторы и аксессоры\"}, {\"meta\": {}, \"items\": [], \"content\": \"Мягкое удаление (soft delete)\"}, {\"meta\": {}, \"items\": [], \"content\": \"События моделей (observers)\"}, {\"meta\": {}, \"items\": [], \"content\": \"Ленивая и жадная загрузка\"}], \"style\": \"unordered\"}, \"type\": \"list\"}, {\"id\": \"ldAUllvght\", \"data\": {}, \"type\": \"delimiter\"}, {\"id\": \"8qsqHjmhW7\", \"data\": {\"text\": \"Создание и настройка моделей\", \"level\": 3}, \"type\": \"header\"}, {\"id\": \"qStNxCcWkN\", \"data\": {\"code\": \"php artisan make:model Flight -mf\"}, \"type\": \"code\"}, {\"id\": \"6qSonOkTyQ\", \"data\": {\"text\": \"Флаги: -m создает миграцию, -f создает фабрику\"}, \"type\": \"paragraph\"}, {\"id\": \"ScqUMtcYgh\", \"data\": {\"code\": \"<?php\\n\\nnamespace App\\\\Models;\\n\\nuse Illuminate\\\\Database\\\\Eloquent\\\\Model;\\n\\nclass Flight extends Model\\n{\\n    // Таблица, связанная с моделью\\n    protected \$table = 'my_flights';\\n    \\n    // Первичный ключ\\n    protected \$primaryKey = 'flight_id';\\n    \\n    // Тип автоинкремента\\n    public \$incrementing = false;\\n    \\n    // Тип ключа\\n    protected \$keyType = 'string';\\n    \\n    // Отключает created_at/updated_at\\n    public \$timestamps = false;\\n    \\n    // Формат дат\\n    protected \$dateFormat = 'U';\\n    \\n    // Значения по умолчанию\\n    protected \$attributes = [\\n        'delayed' => false,\\n    ];\\n}\"}, \"type\": \"code\"}, {\"id\": \"F2QoBNzP9w\", \"data\": {}, \"type\": \"delimiter\"}, {\"id\": \"0Vlec1ZgL2\", \"data\": {\"text\": \"Отношения в Eloquent\", \"level\": 3}, \"type\": \"header\"}, {\"id\": \"Djt6hP_zx8\", \"data\": {\"text\": \"Основные типы отношений:\"}, \"type\": \"paragraph\"}, {\"id\": \"WDm6RyR4Cr\", \"data\": {\"meta\": {}, \"items\": [{\"meta\": {}, \"items\": [], \"content\": \"Один к одному (hasOne)\"}, {\"meta\": {}, \"items\": [], \"content\": \"Один ко многим (hasMany)\"}, {\"meta\": {}, \"items\": [], \"content\": \"Многие ко многим (belongsToMany)\"}, {\"meta\": {}, \"items\": [], \"content\": \"Полиморфные отношения\"}, {\"meta\": {}, \"items\": [], \"content\": \"Отношения через (hasManyThrough)\"}], \"style\": \"unordered\"}, \"type\": \"list\"}, {\"id\": \"RtzeAEM9id\", \"data\": {\"code\": \"// User имеет много Post\\nclass User extends Model\\n{\\n    public function posts()\\n    {\\n        return \$this->hasMany(Post::class);\\n    }\\n}\\n\\n// Post принадлежит User\\nclass Post extends Model\\n{\\n    public function user()\\n    {\\n        return \$this->belongsTo(User::class);\\n    }\\n}\\n\\n// Использование\\n\$posts = User::find(1)->posts;\\n\$user = Post::find(1)->user;\"}, \"type\": \"code\"}, {\"id\": \"MAy21MXtZL\", \"data\": {\"text\": \"Подробнее об отношениях: <a href=\\\"https://laravel.com/docs/eloquent-relationships\\\">Eloquent Relationships</a>\"}, \"type\": \"paragraph\"}, {\"id\": \"nDt3DGy59m\", \"data\": {}, \"type\": \"delimiter\"}, {\"id\": \"5SYqdV-1NA\", \"data\": {\"embed\": \"https://www.youtube.com/embed/lpxdeW7uq2I\", \"width\": 580, \"height\": 320, \"source\": \"https://www.youtube.com/watch?v=lpxdeW7uq2I\", \"caption\": \"Eloquent\", \"service\": \"youtube\"}, \"type\": \"embed\"}], \"version\": \"2.31.0-rc.7\"}",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Введение в JavaScript: история и назначение',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748050000001,
    "blocks": [
        {
            "id": "js1",
            "type": "header",
            "data": {
                "text": "Введение в JavaScript: история и назначение",
                "level": 2
            }
        },
        {
            "id": "js_img1",
            "type": "simpleImage",
            "data": {
                "url": "https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png",
                "caption": "Официальный логотип JavaScript",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "js2",
            "type": "paragraph",
            "data": {
                "text": "JavaScript — это язык программирования, который был создан в 1995 году Бренданом Айком всего за 10 дней для браузера Netscape Navigator. Первоначально язык назывался LiveScript, но был переименован в JavaScript по маркетинговым причинам."
            }
        },
        {
            "id": "js3",
            "type": "paragraph",
            "data": {
                "text": "JavaScript изначально использовался только для добавления интерактивности на веб-страницы, но сейчас это один из самых популярных языков программирования, применяемый для фронтенда, бэкенда (Node.js), мобильных приложений и даже встраиваемых систем."
            }
        },
        {
            "id": "js4",
            "type": "header",
            "data": {
                "text": "Основные особенности JavaScript",
                "level": 3
            }
        },
        {
            "id": "js5",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "Динамическая типизация и простота изучения",
                    "Работает во всех современных браузерах",
                    "Возможность работы как на клиенте, так и на сервере",
                    "Огромное сообщество и развитая экосистема",
                    "Основа для современных фреймворков: React, Vue, Angular"
                ]
            }
        },
        {
            "id": "js6",
            "type": "paragraph",
            "data": {
                "text": "JavaScript стал стандартом для разработки интерактивных веб-приложений благодаря своей гибкости и поддержке всеми браузерами. Современные стандарты языка (ECMAScript) продолжают активно развиваться."
            }
        },
        {
            "id": "js7",
            "type": "delimiter",
            "data": {}
        },
        {
            "id": "js8",
            "type": "header",
            "data": {
                "text": "Где используется JavaScript?",
                "level": 3
            }
        },
        {
            "id": "js9",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "Браузеры — для динамических веб-страниц",
                    "Node.js — серверная разработка",
                    "Мобильные приложения — React Native, Ionic",
                    "Интернет вещей (IoT)"
                ]
            }
        },
        {
            "id": "js10",
            "type": "paragraph",
            "data": {
                "text": "Подробнее: <a href=\\"https://developer.mozilla.org/ru/docs/Web/JavaScript/Guide/Introduction\\">Введение в JavaScript на MDN</a>"
            }
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Основы синтаксиса и структуры JavaScript',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748050000002,
    "blocks": [
        {
            "id": "js11",
            "type": "header",
            "data": {
                "text": "Основы синтаксиса и структуры JavaScript",
                "level": 2
            }
        },
        {
            "id": "js_img2",
            "type": "simpleImage",
            "data": {
                "url": "https://upload.wikimedia.org/wikipedia/commons/9/99/Unofficial_JavaScript_logo_2.svg",
                "caption": "JavaScript — универсальный язык для веба",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "js12",
            "type": "paragraph",
            "data": {
                "text": "JavaScript чувствителен к регистру, поддерживает динамическую типизацию и несколько способов объявления переменных: var, let, const."
            }
        },
        {
            "id": "js13",
            "type": "header",
            "data": {
                "text": "Переменные",
                "level": 3
            }
        },
        {
            "id": "js14",
            "type": "code",
            "data": {
                "code": "// Примеры объявления переменных\nlet name = \'Alice\';\nconst PI = 3.14;\nvar age = 25;"
            }
        },
        {
            "id": "js15",
            "type": "paragraph",
            "data": {
                "text": "let и const — современные способы объявления переменных (ES6). Используйте const для неизменяемых значений."
            }
        },
        {
            "id": "js16",
            "type": "header",
            "data": {
                "text": "Операторы и выражения",
                "level": 3
            }
        },
        {
            "id": "js17",
            "type": "paragraph",
            "data": {
                "text": "Арифметические: +, -, *, /, %, ++, --. Сравнения: ==, ===, !=, !==, >, <. Логические: &&, ||, !"
            }
        },
        {
            "id": "js18",
            "type": "code",
            "data": {
                "code": "// Пример\nlet a = 5;\nlet b = 2;\nlet sum = a + b;\nlet isEqual = (a === b);"
            }
        },
        {
            "id": "js19",
            "type": "header",
            "data": {
                "text": "Функции",
                "level": 3
            }
        },
        {
            "id": "js20",
            "type": "code",
            "data": {
                "code": "// Обычная функция\nfunction greet(name) {\n  return \'Hello, \' + name;\n}\n\n// Стрелочная функция\nconst sum = (a, b) => a + b;"
            }
        },
        {
            "id": "js21",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "Комментарии: // однострочный, /* многострочный */",
                    "Конец строки: точка с запятой (опционально)",
                    "Блоки кода: { ... }"
                ]
            }
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Переменные, типы данных и преобразования в JavaScript',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748050000003,
    "blocks": [
        {
            "id": "js22",
            "type": "header",
            "data": {
                "text": "Переменные, типы данных и преобразования",
                "level": 2
            }
        },
        {
            "id": "js_img3",
            "type": "simpleImage",
            "data": {
                "url": "https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg",
                "caption": "Типы данных в JavaScript",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "js23",
            "type": "paragraph",
            "data": {
                "text": "JavaScript поддерживает несколько основных типов данных: string, number, boolean, null, undefined, object, symbol (с ES6)."
            }
        },
        {
            "id": "js24",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "let str = \'Hello\'; // string",
                    "let n = 42; // number",
                    "let b = true; // boolean",
                    "let u; // undefined",
                    "let obj = {a: 1}; // object"
                ]
            }
        },
        {
            "id": "js25",
            "type": "header",
            "data": {
                "text": "Преобразование типов",
                "level": 3
            }
        },
        {
            "id": "js26",
            "type": "code",
            "data": {
                "code": "// Преобразования\nlet num = Number(\'2\'); // 2\nlet str = String(123); // \"123\"\nlet bool = Boolean(0); // false"
            }
        },
        {
            "id": "js27",
            "type": "paragraph",
            "data": {
                "text": "Для проверки типа используйте оператор typeof: typeof str // \"string\""
            }
        },
        {
            "id": "js28",
            "type": "header",
            "data": {
                "text": "Пример использования типов",
                "level": 3
            }
        },
        {
            "id": "js29",
            "type": "code",
            "data": {
                "code": "// Проверка типов\nconsole.log(typeof 123); // number\nconsole.log(typeof \'abc\'); // string\nconsole.log(typeof null); // object\nconsole.log(typeof undefined); // undefined"
            }
        },
        {
            "id": "js30",
            "type": "delimiter",
            "data": {}
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Введение в PHP: история и применение',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748051000001,
    "blocks": [
        {
            "id": "php1",
            "type": "header",
            "data": {
                "text": "Введение в PHP: история и применение",
                "level": 2
            }
        },
        {
            "id": "php_img1",
            "type": "simpleImage",
            "data": {
                "url": "https://www.php.net/images/logos/new-php-logo.svg",
                "caption": "Официальный логотип PHP",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "php2",
            "type": "paragraph",
            "data": {
                "text": "PHP — это популярный язык программирования для веба, созданный Расмусом Лердорфом в 1995 году. Первоначально PHP расшифровывался как Personal Home Page, а сейчас — как рекурсивное PHP: Hypertext Preprocessor."
            }
        },
        {
            "id": "php3",
            "type": "header",
            "data": {
                "text": "Где используется PHP?",
                "level": 3
            }
        },
        {
            "id": "php4",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "Создание динамических веб-сайтов",
                    "Работа с базами данных",
                    "Разработка CMS (WordPress, Drupal, Joomla)",
                    "Создание REST API",
                    "Скрипты для автоматизации"
                ]
            }
        },
        {
            "id": "php5",
            "type": "paragraph",
            "data": {
                "text": "PHP поддерживается большинством хостингов, входит в стек LAMP (Linux, Apache, MySQL, PHP) и легко изучается новичками."
            }
        },
        {
            "id": "php6",
            "type": "paragraph",
            "data": {
                "text": "Подробнее: <a href=\\"https://www.php.net/manual/ru/history.php.php\\">История PHP</a>"
            }
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Основы синтаксиса PHP',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748051000002,
    "blocks": [
        {
            "id": "php7",
            "type": "header",
            "data": {
                "text": "Основы синтаксиса PHP",
                "level": 2
            }
        },
        {
            "id": "php_img2",
            "type": "simpleImage",
            "data": {
                "url": "https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg",
                "caption": "PHP в разработке сайтов",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "php8",
            "type": "paragraph",
            "data": {
                "text": "PHP-скрипт начинается с <?php и заканчивается ?>. Все инструкции завершаются точкой с запятой."
            }
        },
        {
            "id": "php9",
            "type": "code",
            "data": {
                "code": "<?php\n$greeting = \"Hello, world!\";\necho $greeting;\n?>"
            }
        },
        {
            "id": "php10",
            "type": "header",
            "data": {
                "text": "Переменные и типы данных",
                "level": 3
            }
        },
        {
            "id": "php11",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "$a = 5; // integer",
                    "$b = 3.14; // float",
                    "$str = \"PHP\"; // string",
                    "$flag = true; // boolean",
                    "$arr = [1, 2, 3]; // array"
                ]
            }
        },
        {
            "id": "php12",
            "type": "paragraph",
            "data": {
                "text": "PHP автоматически определяет тип переменной в зависимости от значения."
            }
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Управляющие конструкции и функции в PHP',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748051000003,
    "blocks": [
        {
            "id": "php13",
            "type": "header",
            "data": {
                "text": "Управляющие конструкции и функции в PHP",
                "level": 2
            }
        },
        {
            "id": "php_img3",
            "type": "simpleImage",
            "data": {
                "url": "https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg",
                "caption": "PHP — один из самых популярных языков для серверной разработки",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "php14",
            "type": "header",
            "data": {
                "text": "Условные операторы",
                "level": 3
            }
        },
        {
            "id": "php15",
            "type": "code",
            "data": {
                "code": "<?php\nif ($a > $b) {\n  echo \"$a больше $b\";\n} else {\n  echo \"$a не больше $b\";\n}\n?>"
            }
        },
        {
            "id": "php16",
            "type": "header",
            "data": {
                "text": "Циклы",
                "level": 3
            }
        },
        {
            "id": "php17",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "for ($i = 0; $i < 10; $i++) { ... }",
                    "while ($i < 10) { ... }",
                    "foreach ($arr as $val) { ... }"
                ]
            }
        },
        {
            "id": "php18",
            "type": "header",
            "data": {
                "text": "Функции",
                "level": 3
            }
        },
        {
            "id": "php19",
            "type": "code",
            "data": {
                "code": "<?php\nfunction sum($a, $b) {\n  return $a + $b;\n}\necho sum(2, 3);\n?>"
            }
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Введение в SQL: история и назначение',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748052000001,
    "blocks": [
        {
            "id": "sql1",
            "type": "header",
            "data": {
                "text": "Введение в SQL: история и назначение",
                "level": 2
            }
        },
        {
            "id": "sql_img",
            "type": "simpleImage",
            "data": {
                "url": "https://upload.wikimedia.org/wikipedia/commons/8/87/Sql_data_base_with_logo.png",
                "caption": "SQL и базы данных",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "sql2",
            "type": "paragraph",
            "data": {
                "text": "SQL (Structured Query Language) — стандартный язык для работы с реляционными базами данных. Язык был создан в 1970-х годах в IBM и стал стандартом ANSI и ISO."
            }
        },
        {
            "id": "sql3",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "Запрос данных",
                    "Изменение структуры таблиц",
                    "Добавление, удаление, обновление записей",
                    "Управление доступом к данным"
                ]
            }
        },
        {
            "id": "sql4",
            "type": "paragraph",
            "data": {
                "text": "SQL поддерживается почти всеми современными СУБД: MySQL, PostgreSQL, Microsoft SQL Server, Oracle и др."
            }
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Основные команды SELECT, INSERT, UPDATE, DELETE',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748052000002,
    "blocks": [
        {
            "id": "sql5",
            "type": "header",
            "data": {
                "text": "Основные команды SELECT, INSERT, UPDATE, DELETE",
                "level": 2
            }
        },
        {
            "id": "sql_img",
            "type": "simpleImage",
            "data": {
                "url": "https://upload.wikimedia.org/wikipedia/commons/8/87/Sql_data_base_with_logo.png",
                "caption": "SQL и базы данных",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "sql6",
            "type": "paragraph",
            "data": {
                "text": "SQL включает четыре основные команды для работы с данными: SELECT (выборка), INSERT (добавление), UPDATE (обновление), DELETE (удаление)."
            }
        },
        {
            "id": "sql7",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "SELECT * FROM users;",
                    "INSERT INTO users (name, age) VALUES (\'Alice\', 25);",
                    "UPDATE users SET age = 26 WHERE name = \'Alice\';",
                    "DELETE FROM users WHERE name = \'Alice\';"
                ]
            }
        },
        {
            "id": "sql8",
            "type": "paragraph",
            "data": {
                "text": "Эти команды являются базой для любой работы с реляционными БД."
            }
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Создание и изменение таблиц в SQL',
                'user_id' => User::where('name', '=', 'teacher')->first()->id,
                'content' => '{
    "time": 1748052000003,
    "blocks": [
        {
            "id": "sql9",
            "type": "header",
            "data": {
                "text": "Создание и изменение таблиц в SQL",
                "level": 2
            }
        },
        {
            "id": "sql_img",
            "type": "simpleImage",
            "data": {
                "url": "https://upload.wikimedia.org/wikipedia/commons/8/87/Sql_data_base_with_logo.png",
                "caption": "SQL и базы данных",
                "stretched": false,
                "withBorder": true,
                "withBackground": true
            }
        },
        {
            "id": "sql10",
            "type": "paragraph",
            "data": {
                "text": "Для создания и изменения структуры таблиц в SQL используются команды CREATE TABLE и ALTER TABLE."
            }
        },
        {
            "id": "sql11",
            "type": "list",
            "data": {
                "style": "unordered",
                "items": [
                    "CREATE TABLE users (id INT PRIMARY KEY, name VARCHAR(100));",
                    "ALTER TABLE users ADD COLUMN age INT;",
                    "ALTER TABLE users DROP COLUMN age;"
                ]
            }
        },
        {
            "id": "sql12",
            "type": "paragraph",
            "data": {
                "text": "С помощью этих команд можно создавать новые таблицы, добавлять и удалять столбцы."
            }
        }
    ],
    "version": "2.31.0-rc.7"
}',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('lessons')->insert($lessons);
    }
}
