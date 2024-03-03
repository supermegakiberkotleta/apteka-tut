<?php

// Подключение к базе данных (замените данными вашего сервера)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pharmacy_db";

// Создание подключения
$conn = new mysqli($servername, $username, $password);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Создание базы данных
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// Выбор созданной базы данных
$conn->select_db($dbname);

// Создание таблицы users
$sql = "CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('pharmacy', 'pharmacist') NOT NULL
)";
$conn->query($sql);

// Создание таблицы medicines
$sql = "CREATE TABLE IF NOT EXISTS medicines (
    medicine_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    manufacturer VARCHAR(100),
    price DECIMAL(10,2) NOT NULL,
    expiration_date DATE NOT NULL,
    quantity INT NOT NULL
)";
$conn->query($sql);

// Создание таблицы sales
$sql = "CREATE TABLE IF NOT EXISTS sales (
    sale_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    medicine_id INT,
    sale_date DATETIME NOT NULL,
    quantity_sold INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (medicine_id) REFERENCES medicines(medicine_id)
)";
$conn->query($sql);

// Создание таблицы stock
$sql = "CREATE TABLE IF NOT EXISTS stock (
    stock_id INT AUTO_INCREMENT PRIMARY KEY,
    medicine_id INT,
    quantity_available INT NOT NULL,
    FOREIGN KEY (medicine_id) REFERENCES medicines(medicine_id)
)";
$conn->query($sql);

// Создание таблицы categories
$sql = "CREATE TABLE IF NOT EXISTS categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
)";
$conn->query($sql);

// Создание хранимых процедур
$sql = "CREATE PROCEDURE add_medicine (
    IN p_name VARCHAR(100),
    IN p_manufacturer VARCHAR(100),
    IN p_price DECIMAL(10,2),
    IN p_expiration_date DATE,
    IN p_quantity INT
)
BEGIN
    INSERT INTO medicines (name, manufacturer, price, expiration_date, quantity) VALUES (p_name, p_manufacturer, p_price, p_expiration_date, p_quantity);
END";
$conn->query($sql);

// Создание других хранимых процедур (update_medicine_price, add_sale, check_stock_level, get_user_sales)

// Создание триггеров
$sql = "CREATE TRIGGER update_stock_on_sale AFTER INSERT ON sales
FOR EACH ROW
BEGIN
    UPDATE stock SET quantity_available = quantity_available - NEW.quantity_sold WHERE medicine_id = NEW.medicine_id;
END";
$conn->query($sql);

// Создание других триггеров (check_expiry_date, update_stock_on_addition, log_successful_login, log_failed_login)

$conn->close();
?>
