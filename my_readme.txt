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
Видео - 39 Класс HTTP Guzzle в Laravel Интеграция со сторонними сервисами (Laravel Creative)

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
php /opt/vhosts/schedule/artisan config:cache

Создал новый livewire компонент.
php artisan make:livewire Schedule

Долго решал проблему ошибки работы пакета. решение:
У меня была такая же проблема в v1.0.12, снова при развертывании на сервере DigitalOcean (изначально настраивалась через Laravel Forge).
Я решил это, опубликовав активы:
php artisan vendor:publish --force --tag=livewire:assets
Директива лезвия @livewireScripts по-прежнему требуется, но она автоматически правильно извлекает ресурсы из /public/vendor/livewire/livewire.js

загнал в селектор данные из API. это все с помощью livewire
далее сделал при выборе в селекторе в переменную передается id департамента

добавил новый хук hydrate и передал в селектор group если совершить действие

долго пытался понять что приходит из блейда liveware(это был не массив но и не строка) оказалось обьект. преобразовал
$this->test2 = serialize($departcheck);
после вывел в блейде
departcheck не мог передать потомучто я его обьявил как массив. нужно по умолчанию.
далее добавить форму обучения
добавил

далее необходимо выводить информацию расписания
Создал новый livewire компонент visualization потомучто в Schedule guzzle выдает ошибку
php artisan make:livewire visualization
нужно проверить подтягиваются ли данные - не смог реализовать

расписание выводится на конкретную дату(если не указывать период)

далее нужно добавить поиск по группе
поиск добавил

на вывод добавил условие online =0 или нет. если 0 то выводим room и area
!!! позже надо добавить условие на null

добавил вывод subgroup

далее нужно поизучать блейд - красиво вывести таблицу и можно ли менять шрифт
далее нужно перейти на расписание преподавателей и Расписание занятий в аудиториях

добавляю <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>

создам новый компонент для Расписание преподавателей
php artisan make:livewire Teacher

при выборе преподавателя если нет занятий то выбрасывает ошибку. необходимо добавить валидацию - исправил

далее добавить Расписание занятий в аудиториях

php artisan make:livewire room

https://dekanat.bsu.edu.ru/blocks/bsu_api/bsu_schedule/readRoom.php?area=11200&build=1631&room=12002101&date=11.04.2022&period=180

https://dekanat.bsu.edu.ru/blocks/bsu_api/bsu_schedule/readRoom.php?room=9239&date=11.04.2022&period=180

SELECT * FROM dean.mdl_bsu_area_room; - аудитория
SELECT * FROM dean.mdl_bsu_area_building; - корпус
SELECT * FROM dean.mdl_bsu_area; - адрес

$area = optional_param('area', null, PARAM_INT); - адрес, нужен для выбора корпуса
$build = optional_param('build', null, PARAM_INT); - корпус, указав его получаем список аудиторий
$room = optional_param('room', null, PARAM_INT);

https://dekanat.bsu.edu.ru/blocks/bsu_api/bsu_schedule/readRoom.php?date=05.05.2022
получили список адресов(комплексов)

https://dekanat.bsu.edu.ru/blocks/bsu_api/bsu_schedule/readRoom.php?area=42
получили список корпусов(build) по адресу-комплексу (area=42 name "Учебный комплекс №2  по ул. Победы, 85")

https://dekanat.bsu.edu.ru/blocks/bsu_api/bsu_schedule/readRoom.php?area=42&build=165&date=04.05.2022
получили список аудиторий по (area=42 name	"Учебный комплекс №2  по ул. Победы, 85") и (build=165 name	"Учебный корпус №12")

https://dekanat.bsu.edu.ru/blocks/bsu_api/bsu_schedule/readStudent.php?os=android&dep=11200&form=2&group=12001890&date=11.04.2022&period=180
readStudent.php?os=android&dep=11200&form=2&group=12001803&date=04.04.2022

12001890 - нет занятий. на этой группе выкидывает ошибку. надо это решть - добавил фильтр

поиск по группе -таже проблема - решил добавил фильтр

-- права на проект, делается в начале развертывания проекта в новой папке

--для записи пользователя
chown -R ilchenko /opt/vhosts/schedule/

--для записи laravel frameworka в проект
chown -R www-data:www-data /opt/vhosts/schedule/storage/

--для записи nginx в проект
chown -R www-data:www-data /opt/vhosts/schedule/logs/

нет занятий - побольше - поцентру - готово
Кнопка Поиск сильно уехала на лево -готово
доцент если null условие сделать и обьединить с преподавателем - pos - готово
Подозрение то что не работет подгруппа - исправил

разобраться с периодом вывода рассписания - доработать API
Доработать API для расписания аудиторий
Нужно разобраться как подтягивается ссылка на расписание в пегас

SELECT edworkindid, edw.Name
                                            FROM mdl_bsu_schedule s
                                            JOIN mdl_bsu_ref_groups rg ON s.groupid = rg.id
                                            INNER JOIN mdl_bsu_ref_edworkkind edw ON edw.id = s.edworkindid
                                            WHERE edworkindid=13

проверка версии php
php -v
подключенные модули
php -m

composer update - через командную строку

php artisan optimize
