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

сделал консольную команду:
php artisan make:command importJsonplaceholderCommand

сделал json_decode и вывел эти данные в консоль из API деканата.
с помощью консольной команды:
php artisan import:jsonplaceholder

Создаем REST-контроллер ресурсный
php artisan make:controller ScheduleController --resource

Создаем маршрут в web.php
Route::resource('Sched','ScheduleController')->names('Schedule');
