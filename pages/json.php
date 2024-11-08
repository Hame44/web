<?php
// Підключення до бази даних
$link = mysqli_connect("localhost", "root", "", "weblabdatabase");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Запит для отримання даних з таблиці
$sql = "SELECT name, email, question1, question2, question3 FROM persons";
$result = mysqli_query($link, $sql);

if ($result) {
    $surveys = [];

    // Обробляємо кожен рядок результату
    while ($row = mysqli_fetch_assoc($result)) {
        $surveys[] = [
            "name" => $row['name'],
            "email" => $row['email'],
            "answers" => [
                "question1" => $row['question1'],
                "question2" => $row['question2'],
                "question3" => $row['question3']
            ]
        ];
    }

    // Встановлюємо заголовок для JSON-виводу
    header('Content-Type: application/json');

    // Виводимо дані у форматі JSON
    echo json_encode($surveys, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Закриваємо з'єднання з базою даних
mysqli_close($link);
?>
