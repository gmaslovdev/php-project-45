install: # установка зависимостей
	composer install

brain-games: # отображение приветствия
	bin/brain-games

validate: # валидация composer.json
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-even:
	bin/brain-even