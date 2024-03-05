$(document).ready(function () {


})

function tableRender(currentTable) {
    // Функция для отрисовки таблицы на основе данных с сервера
    let rootPath = window.location.protocol + "//" + window.location.host + "/"; // Получение корневого пути сайта
    let renderUrl = rootPath + '/php/' + currentTable.toLowerCase() + '/render.php'; // Формирование URL для запроса

    $.ajax({
        url: renderUrl, // URL для запроса данных таблицы
        method: 'POST', // HTTP-метод (POST)
        data: { currentTable: currentTable }, // Дополнительные данные для запроса
        dataType: 'html', // Ожидаемый тип данных в ответе (HTML)
        success: function (response) {
            if (response) {
                // Если получен ответ, обновляем содержимое элемента с классом 'books_table' и возвращаем ответ
                $('#tableRender').html(response);
                return response;
            } else {
                // В противном случае, возвращаем сообщение об ошибке
                return 'Ошибка получения данных с сервера';
            }
        },
        error: function () {
            // Обработка ошибки AJAX-запроса и возвращение сообщения об ошибке
            return 'Ошибка отправки данных на сервер';
        }
    });
}