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

4. Собираем Docker:
```
$ docker-compose build
```

5. Устанавливаем пакеты
```
docker run --rm -v $(pwd):/app composer install
```

6. Запускаем Docker:
```
$ docker-compose up -d
```

7. Создаем .env файл:
```
$ cp .env.example .env
```

8. Выполняем миграции:
```
$ docker-compose exec app php artisan migrate
```

9. Генрируем ключ приложения и кэшируем настройки:
```
$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan config:cache
```

10. Проверяем результат:
http://localhost/exchange-rates
http://localhost/exchange-rates/history