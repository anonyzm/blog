# Markdown based PHP blog
https://anonyzm.tech/

## 🚀 Быстрый запуск

```bash
git clone git@github.com:anonyzm/blog.git
cd blog
make up
```

## 📁 Структура проекта

```
blog/
├── app/                         # Основное приложение
│   ├── public/                  # Публичная директория
│   │   ├── index.php            # Точка входа
│   │   ├── assets/              # Статические файлы
│   │   │   ├── css/             # Стили
│   │   │   ├── js/              # JavaScript
│   │   │   ├── fonts/           # Шрифты
│   │   │   └── images/          # Изображения
│   │   └── posts/               # Посты в формате Markdown
│   │       ├── ...
│   │       └── ...
│   ├── src/                     # Исходный код
│   │   ├── Controller/          # Контроллеры
│   │   ├── Domain/              # Доменная логика
│   │   ├── Interface/           # Интерфейсы
│   │   ├── Service/             # Сервисы
│   │   ├── Kernel/              # Ядро приложения
│   │   └── Trait/               # Трейты
│   ├── templates/               # Шаблоны Twig
│   │   ├── base.html.twig       # Базовый шаблон
│   │   ├── index.html.twig      # Главная страница
│   │   ├── post.html.twig       # Страница поста
│   │   └── partials/            # Шаблоны отдельных блоков
│   ├── tests/                   # Тесты
│   │   ├── MarkdownPostTest.php # Тесты доменной модели поста
│   │   ├── TranslationTest.php  # Тесты сервиса перевода
│   │   ├── MarkdownConverterTest.php # Тесты сервиса конвертирования Markdown
│   │   └── Seeds/               # Тестовые данные
│   ├── cache/                   # Кэш (создается автоматически)
│   ├── logs/                    # Логи
│   ├── vendor/                  # Зависимости Composer
│   ├── composer.json            # Зависимости проекта
│   └── composer.lock            # Фиксация версий
├── docker/                      # Docker конфигурация
│   ├── Dockerfile               # Образ приложения
│   ├── nginx.conf               # Конфигурация Nginx
│   └── supervisord.conf         # Конфигурация Supervisor
├── .github/                     # GitHub Actions
│   └── workflows/
│       └── ci-cd.yml            # CI/CD пайплайн
├── docker-compose.yml           # Docker Compose конфигурация
├── Makefile                     # Команды для разработки
└── README.md                    # Этот файл
```

## 🛠 Команды Make

### Управление контейнерами

```bash
make up          # Запустить контейнеры в фоновом режиме
make down        # Остановить контейнеры
make build       # Собрать образы
make restart     # Перезапустить контейнеры
make ps          # Показать статус контейнеров
```

### Разработка

```bash
make bash        # Подключиться к контейнеру приложения
make logs        # Показать логи приложения
make clean       # Очистить неиспользуемые ресурсы Docker
```

### Зависимости

```bash
make composer-install    # Установить зависимости composer
make composer-update     # Обновить зависимости composer
```

### Тестирование и анализ кода

```bash
make run-linter          # Запустить PHPStan анализ
make run-tests           # Запустить PHPUnit тесты
make run-tests-coverage  # Запустить тесты с покрытием кода (Xdebug)
make run-tests-coverage-pcov  # Запустить тесты с покрытием кода (PCOV)
make check-xdebug        # Проверить установку Xdebug (нужен как драйвер для покрытия тестами)
make check-pcov          # Проверить установку PCOV (альтернативный драйвер для покрытия тестами)
```

## 🐳 Docker образ

### Характеристики

- **Базовый образ:** PHP 8.4-FPM
- **Веб-сервер:** Nginx
- **Процесс-менеджер:** Supervisor
- **Расширения PHP:** mbstring, exif, pcntl, bcmath, gd, xdebug

### Настройки Xdebug

Xdebug настроен для анализа покрытия кода:
- `xdebug.mode=coverage` - включает только функциональность покрытия
- `xdebug.start_with_request=yes` - активируется при каждом запросе

## 🧪 Тестирование

### Структура тестов

- **PHPUnit** для unit-тестов
- **PHPStan** для статического анализа кода
- **Покрытие кода** с помощью Xdebug

### Запуск тестов

```bash
# Обычные тесты
make run-tests

# Тесты с покрытием кода
make run-tests-coverage
```

## 🔄 CI/CD Pipeline

### Структура пайплайна

```
Pull Request:
├── linter ✅ (PHPStan анализ)
└── tests ✅ (PHPUnit тесты)

Push to main:
├── linter ✅ (PHPStan анализ)
├── tests ✅ (PHPUnit тесты с покрытием)
└── deploy ✅ (развертывание на сервер)
```

### Особенности

- **Зависимости:** Deploy запускается только после успешного прохождения linter и tests
- **Покрытие кода:** Автоматический анализ покрытия в CI/CD с минимальным порогом 80%
- **Кэширование:** Composer зависимости кэшируются для ускорения
- **Артефакты:** Результаты анализа и отчеты о покрытии сохраняются как артефакты

## 📝 Добавление постов

Посты хранятся в формате Markdown в директории `app/public/posts/`:

```
app/public/posts/
├── 2024-07-01-saga-process-consistency/
│   ├── ru.md                    # Содержимое поста для локали ru_RU
│   └── image.png                # Картинка поста
└── 2025-05-25-why-tdd-is-not-just-testing/
    ├── ru.md
    └── image.png
```

### Формат поста

```markdown
# Заголовок поста

> Цитата или эпиграф
>
> <cite>- Автор</cite>

Основное содержимое поста...
```

## 🎨 Кастомизация

### Стили
Редактируйте файлы в `app/public/assets/css/`

### JavaScript
Редактируйте файлы в `app/public/assets/js/`

### Шаблоны
Редактируйте Twig шаблоны в `app/templates/`

## 🔧 Требования

- Docker и Docker Compose
- Git
- Make (опционально, для удобства)

## 📄 Лицензия

Этот проект создан для образовательных целей.
