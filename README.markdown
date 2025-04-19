# Форма зв’язку

Цей проєкт реалізує форму зв’язку з можливістю надсилання повідомлень і відображення всіх отриманих повідомлень у таблиці. Проєкт використовує PHP, MySQL, JavaScript (jQuery) і Bootstrap.

## Демо-версія

Демо-версія доступна за посиланням: [https://dn75user.github.io/Testing/](https://dn75user.github.io/Testing/)

**Примітка**: Демо-версія на GitHub Pages є статичною і відображає лише інтерфейс форми. Для повноцінної роботи (збереження повідомлень у базі даних) потрібен сервер із підтримкою PHP і MySQL.

## Встановлення локально

1. Встановіть [MAMP](https://www.mamp.info/) для запуску PHP і MySQL.

2. Склонуйте репозиторій:

   ```bash
   git clone https://github.com/DN75user/Testing.git
   ```

3. Помістіть файли в папку `C:\MAMP\htdocs` або `C:\MAMP\htdocs\Testing`.

4. Створіть базу даних і таблицю:

   - Відкрийте phpMyAdmin (`http://localhost/phpmyadmin`).
   - Виконайте SQL-скрипт із файлу `database.sql` або скопіюйте наступний код:

     ```sql
     CREATE DATABASE contact_form;
     USE contact_form;
     CREATE TABLE messages (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL,
         message TEXT NOT NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     -- (Опціонально) Тестові дані
     INSERT INTO messages (name, email, message, created_at) VALUES
     ('Іван', 'ivan@example.com', 'Тестове повідомлення', '2025-04-19 18:00:00'),
     ('Марія', 'maria@example.com', 'Ще одне повідомлення', '2025-04-19 18:15:00');
     ```

5. Запустіть MAMP і відкрийте `http://localhost/index.php` у браузері.

## Файли проєкту

- `index.php`: Основна сторінка з формою та таблицею повідомлень.
- `submit.php`: Обробка даних форми та збереження в базі.
- `script.js`: AJAX-логіка для надсилання форми.
- `style.css`: Стилі для форми та таблиці.
- `index.html`: Статична версія для демо на GitHub Pages.
- `database.sql`: SQL-скрипт для створення бази даних і таблиці.

## Технології

- PHP
- MySQL
- JavaScript (jQuery)
- Bootstrap 5
- HTML/CSS

## Повноцінне розгортання

Для повноцінної роботи форми (з підтримкою PHP і MySQL) розгорніть проєкт на хостингу, наприклад, [Hostinger](https://www.hostinger.com/). Інструкції для розгортання дивіться в документації хостингу.