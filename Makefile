install: # установка зависимостей
	composer install

validate: # валидация composer.json
	composer validate

lint: # проверка кода на соответствие PSR12
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-games: # приветствие пользователя
	bin/brain-games

brain-even: # запуск игры четный/нечетный
	bin/brain-even

brain-calc: # запуск игры калькулятор
	bin/brain-calc

brain-gcd: # запуск игры нахождение НОД
	bin/brain-gcd

brain-prime: # запуск и игры определение простого числа
	bin/brain-prime

brain-progression: # запуск игры нахождение неизвестного прогрессии
	bin/brain-progression