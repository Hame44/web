<?php

$url = "http://localhost/ServerDB/web2.3/pages/json.php";


$jsonData = file_get_contents($url);


if ($jsonData !== false) {
    $surveys = json_decode($jsonData, true);

    if (is_array($surveys)) {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Question 1</th><th>Question 2</th><th>Question 3</th></tr>";

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
