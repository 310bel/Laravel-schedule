Установка compser локально

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

php composer.phar create-project laravel/laravel

добавил git из интерфейса в шторм и сделал первый комит

установил laravel-ide-helper
установил php composer.phar require barryvdh/laravel-debugbar --dev

далее нужно попробовать спарсить с API деканата расписания
для этого заменить шаблон главной страницы на свой

Испльзуем пакет laravel guzzle. он парсит данные из API и преобразует их в обьект
С помощью селекторов мы создаем массив данных для отправки запроса.
Получаем ответ и его(обьект) нужно разложить циклом и вывести на экран.

сделал консольную команду:
php artisan make:command importJsonplaceholderCommand

json_decode - функция PHP, позволяющая преобразовать JSON строку в переменную PHP, которая по умолчанию будет являться объектом

Синтаксис: json_decode (string, [assoc, depth, options]);

Обязательным является только первый параметр:

string - json строка, которую будем декодировать
assoc - по умолчанию преобразует все в объект, но если поставить TRUE, то в ассоциативные массивы
depth - глубину рекурсии
options - битовая маска опций декодирования

https://blogprogram.ru/dekodiruem-json-dannye-s-pomoshhyu-json_decode-v-php-chast-2/


сделал json_decode и вывел эти данные в консоль из API деканата.
с помощью консольной команды:
php artisan import:jsonplaceholder

Создаем REST-контроллер ресурсный
php artisan make:controller ScheduleController --resource

Создаем маршрут в web.php
Route::resource('Sched','ScheduleController')->names('Schedule');

Импорт класса alt + Enter

Во view добавил :
@php
    use App\Components\ImportDataClient;
    $import = new ImportDataClient();
    $response = $import->client->request('GET', '');
    $data = json_decode($response->getBody()->getContents());

    foreach ($data as $item) {
    dd($item);
    }
@endphp

Вставил в schedule.blade.php код из расписания

Далее требуются знания шаблонизатора blade. также нужно превратить массив в строку и запихнуть в форму расписания.
добавил app.blade.php начал работать с шаблонизатором

Добавил в app.blade.php шапку. остальное поместил в schedule.blade.php

API расписания:
blocks/bsu_api/bsu_schedule/readStudent.php

Что нужно указать во входящих параметрах API Олега:
$os = optional_param('os', null, PARAM_TEXT);
$dep = optional_param('dep', null, PARAM_INT);
$form = optional_param('form', null, PARAM_INT);
$group = optional_param('group', null, PARAM_TEXT);
$period = optional_param('period', null, PARAM_INT);
$date = optional_param('date', null, PARAM_TEXT);

Ответ API:

    "schedule": [
        {
            "pairnumber": "1",
            "id": "12737892",
            "groups": "12002101",
            "subgroup": "null",
            "date": "04.09.2021",
            "weekday": "Суббота",
            "timestart": "08:30",
            "timeend": "10:05",
            "edworkkind": "лек.",
            "dis": "Философия",
            "teacher": "Носков Владимир Алексеевич",
            "position": "Профессор",
            "pos": "проф.",
            "subdepteacher": "11100002. Кафедра философии и теологии",
            "room": "null",
            "area": "null",
            "address": "null",
            "online": "1"
        },

Логика для расписания

$dep = optional_param('dep', null, PARAM_INT);
$form = optional_param('form', null, PARAM_INT);
$group = optional_param('group', null, PARAM_TEXT);
$period = optional_param('period', null, PARAM_INT);
$date = optional_param('date', null, PARAM_TEXT);

селекторами выбираем:
три селектора и дата:
1. Факультет $dep
2. Форма обучения $form
3. Группа $group
4. Неделя $period

создал массив факультетов из API и подставил его в селектор первый

отрисовку селектора буду делать при помощи Livewire

php composer.phar require livewire/livewire

php artisan config:cache

php artisan make:livewire HelloWorld

Долго решал проблему ошибки работы пакета. решение:
У меня была такая же проблема в v1.0.12, снова при развертывании на сервере DigitalOcean (изначально настраивалась через Laravel Forge).
Я решил это, опубликовав активы:
php artisan vendor:publish --force --tag=livewire:assets
Директива лезвия @livewireScripts по-прежнему требуется, но она автоматически правильно извлекает ресурсы из /public/vendor/livewire/livewire.js



