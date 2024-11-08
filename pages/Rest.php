<?php
// URL з GET-параметрами
$url = "http://lab.vntu.org/api-server/lab8.php?user=student&pass=p@ssw0rd";

// Використання file_get_contents() для отримання JSON-даних
$jsonData = file_get_contents($url);

// Перевіряємо, чи отримали ми дані
if ($jsonData !== false) {
    // Перетворення JSON у PHP-об'єкти
    $data = json_decode($jsonData, true); // true для отримання асоціативного масиву

    if (is_array($data)) {
        // Об'єднуємо вкладені масиви в один масив
        $mergedData = array_merge(...$data);

        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Affiliation</th><th>Rank</th><th>Location</th></tr>";

        // Проходимо по всіх записах і виводимо їх у таблицю
        foreach ($mergedData as $person) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($person['name']) . "</td>";
            echo "<td>" . htmlspecialchars($person['affiliation']) . "</td>";
            echo "<td>" . htmlspecialchars($person['rank']) . "</td>";
            echo "<td>" . htmlspecialchars($person['location']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

} else {
    echo "Помилка: не вдалося отримати дані.";
}
?>
