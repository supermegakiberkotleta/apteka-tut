<?php

// Подключение к базе данных (замените данными вашего сервера)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pharmacy_db";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Заполнение таблицы users тестовыми данными
$sql = "INSERT INTO users (username, password, role) VALUES
    ('pharmacy1', 'password1', 'pharmacy'),
    ('pharmacist1', 'password2', 'pharmacist')";
$conn->query($sql);

// Заполнение таблицы medicines тестовыми данными
$sql = "INSERT INTO medicines (name, manufacturer, price, expiration_date, quantity) VALUES
    ('Paracetamol', 'Manufacturer A', 5.99, '2024-12-31', 100),
    ('Ibuprofen', 'Manufacturer B', 7.50, '2023-10-15', 50),
    ('Aspirin', 'Manufacturer C', 3.25, '2025-06-30', 200)";
$conn->query($sql);

// Заполнение таблицы categories тестовыми данными
$sql = "INSERT INTO categories (name) VALUES
    ('Painkillers'),
    ('Antipyretics')";
$conn->query($sql);

// Заполнение таблицы stock тестовыми данными
$sql = "INSERT INTO stock (medicine_id, quantity_available) VALUES
    (1, 100),
    (2, 50),
    (3, 200)";
$conn->query($sql);

$conn->close();

echo "Test data inserted successfully\n";
?>
