# Vk bot framework
Фреймворк для бота вк

###Установка
```composer install```

**info** https://sergeivl.ru/phinx-migration.html - работа с миграциями

### основная информация о миграциях

Создать миграцию:

```"vendor/bin/phinx" create MyMigration -c config/config-phinx.php```

Выполнить миграции:

```"vendor/bin/phinx" migrate -c config/config-phinx.php```

Откатить миграции:

```"vendor/bin/phinx" rollback -c config/config-phinx.php```

# Структура приложения
```
vk-bot-framework
|- App - основное приложение
   |- Actions - события, создаваемые API vk
      |- AbstractAction.php - абстрактный класс для событий
   |- Commands - классы команд, выполняемых ботом
      |- AbstractCommand.php - абстрактный класс для команд
   |- Exceptions - Исключения
   |- Factories - фабрики для генерации рандомных выражений
      |- AbstractFactory.php - абстрактный класс фабрики
   |- Keyboards - классы клавиатур
      |- AbstractKeyboard.php - абстрактный класс клавиатур
   |- Models - модели для БД
   |- Operations - различные операции
      |- AbstractOperation.php - абстрактный класс всех операций
   |- Presenters - "представители" сущностей БД
      |- AbstractPresenter.php - абстрактный класс "представителей" 
   |- App.php - класс приложения
   |- Boostrap.php - сборщик приложения
   |- Database.php - класс для подключения к бд
   |- Kernel.php - класс ядра приложения
   |- Migration.php - класс миграций БД
   |- Response.php - ответ, направляемый серверу ВК
|- commands - декларация команд бота
|- config
   |- config.php - определение констант, выгрузка из .env
   |- config-phinx.php - конфигурация phinx
   |- db.php - конфигурация БД
|- dictionaries - словари
|- helpers
   |- default.php - основные хелперы
|- keyboards - декларация клавиатур
|- migrations - миграции базы данных
|- public - общедостпная папка, index.php тут
|- templates - шаблоны сообщений
|- .env.example
|- .gitignore
|- composer.json
|- composer.lock
|- README.md
```
