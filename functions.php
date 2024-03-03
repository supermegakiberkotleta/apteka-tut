
<?php

require_once 'config.php';
function get_header(){
    return require 'header.php';
}
function get_footer(){
   return require 'footer.php';
}



function getNameById($table, $id, $idFieldName) {
    // Создание подключения
    $conn = connectToDatabase();

    // Защита от SQL-инъекций
    $table = $conn->real_escape_string($table);
    $id = $conn->real_escape_string($id);
    $idFieldName = $conn->real_escape_string($idFieldName);

    // Формирование запроса
    $sql = "SELECT name FROM $table WHERE $idFieldName = $id";

    // Выполнение запроса
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Получение данных из результата запроса
        $row = $result->fetch_assoc();
        $name = $row['name'];
    } else {
        // Если элемент не найден, возвращаем null
        $name = null;
    }

    // Закрытие подключения
    $conn->close();

    return $name;
}

?>
