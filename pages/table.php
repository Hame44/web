<?php
// Створюємо контекст з авторизаційними заголовками
$options = [
    'http' => [
        'header' => "Authorization: Basic " . base64_encode( "student:p@ssw0rd"),
    ]
];

// Створюємо контекст потоку
$context = stream_context_create($options);

// Виконуємо запит до URL із використанням контексту
$response = file_get_contents('http://lab.vntu.org/api-server/lab8.php', false, $context);

if ($response === false) {
    echo json_encode(['error' => 'Не вдалося отримати дані.']);
} else {
    echo $response; // Повертає JSON відповідь з API
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:)</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <header style="height: 8vh; border-bottom: 4px solid rgb(64, 64, 64); background-color: #193B3A;">
    <?php require './navigation.php'; ?>
    </header>
    <div style="display: flex; display: flex; height: calc(100vh - 18vh);">

        <div style="width: 20%; display: flex; justify-content: center;">
            Ліва колонка

            <ol class="list123">
                <li>Один: אֶחָד (Echad)</li>
                <li>Два: שְׁנַיִם (Shnayim)</li>
                <li>Три: שְׁלֹשָׁה (Shlosha)</li>
            </ol>
        </div>
        <div style="width: 60%; display: flex; align-items: center; justify-content: center;">

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Виріб</th>
                        <th>Ціна</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Моаї</td>
                        <td>200</td>
                    </tr>
                    <tr class="active-row">
                        <td>міні моаї</td>
                        <td>80</td>
                    </tr>
                    <tr class="active-row"></tr>
                    <td>флешка моаї</td>
                    <td>договірна</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
        <div style="width: 20%;">
            Права колонка
            <button id="load-data">Завантажити дані</button>
    <div id="data-output"></div>

    <script>
        $(document).ready(function () {
            $('#load-data').click(function () {
                $.ajax({
                    url: 'data.php', // URL до PHP-скрипту, що виконує запит
                    method: 'GET',
                    dataType: 'json', // Очікуємо отримати JSON
                    success: function (data) {
                        if (data.error) {
                            $('#data-output').html('<p>' + data.error + '</p>');
                        } else {
                            let output = '<ul>';
                            for (let item in data) {
                                output += '<li>' + item + ': ' + data[item] + '</li>';
                            }
                            output += '</ul>';
                            $('#data-output').html(output);
                        }
                    },
                    error: function () {
                        $('#data-output').html('<p>Не вдалося отримати дані.</p>');
                    }
                });
            });
        });
    </script>
        </div>
    </div>

    <footer style="width: 100%; position: fixed; bottom: 0; left: 0; margin: 0; padding: 0; box-sizing: border-box;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin: 0; padding: 0;">
            <a href="shop.php" style="width: 25%; display: inline-block; margin: 0; padding: 0; ">
                <img src="../assets/work.png" width="100%" style="margin: 0; padding: 0; vertical-align: bottom;">
            </a>
            <img src="../assets/robota.png" width="25%" style="margin: 0; padding: 0;">
            <img src="../assets/robota.png" width="25%" style="margin: 0; padding: 0;">
            <img src="../assets/robota.png" width="25%" style="margin: 0; padding: 0;">
        </div>
    </footer>
</body>

</html>