<?php
// URL до скрипта json.php
$url = "http://localhost/ServerDB/web2.3/pages/json.php";

// Отримання даних JSON за допомогою file_get_contents()
$jsonData = file_get_contents($url);

// Якщо file_get_contents() не вдалося, використовуємо cURL як резервний метод
if ($jsonData === false) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $jsonData = curl_exec($curl);
    curl_close($curl);
}

// Перевірка, чи отримані дані успішно
if ($jsonData !== false) {
    // Перетворення JSON у PHP-масив
    $surveys = json_decode($jsonData, true);

    // Перевірка, чи дані є масивом
    if (is_array($surveys)) {
        // Виведення HTML-таблиці з даними
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Question 1</th><th>Question 2</th><th>Question 3</th></tr>";

        // Проходимо по всіх анкетах і виводимо їх у таблицю
        foreach ($surveys as $survey) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($survey['name']) . "</td>";
            echo "<td>" . htmlspecialchars($survey['email']) . "</td>";
            echo "<td>" . htmlspecialchars($survey['answers']['question1']) . "</td>";
            echo "<td>" . htmlspecialchars($survey['answers']['question2']) . "</td>";
            echo "<td>" . htmlspecialchars($survey['answers']['question3']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Помилка: отримані дані не є масивом.";
    }
} else {
    echo "Помилка: не вдалося отримати дані з json.php.";
}
?>
