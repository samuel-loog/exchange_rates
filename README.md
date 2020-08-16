FacePass ExchangeRates TestCase
-------------------------------

1. Переходим в папку, в которой хотим развернуть проект.
2. Клонируем репозиторий:
```
$ git clone https://github.com/samuel-loog/exchange_rates.git
```

3. Переходим в папку с проектом:
```
$ cd ./exchange_rates
```

4. Запускаем Docker:
```
$ docker-compose up -d
```

5. Выполняем миграции:
```
$ docker-compose exec app php artisan migrate
```

6. Создаем .env файл:
```
$ cp .env.example .env
```

6. Генрируем ключ приложения и кэшируем настройки:
```
$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan config:cache
```

7. Проверяем результат:
http://localhost/exchange-rates
http://localhost/exchange-rates/history