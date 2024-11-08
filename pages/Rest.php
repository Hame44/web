<?php

$url = "http://lab.vntu.org/api-server/lab8.php?user=student&pass=p@ssw0rd";


$jsonData = file_get_contents($url);

if ($jsonData !== false) {
    $data = json_decode($jsonData, true);

    if (is_array($data)) {

        $mergedData = array_merge(...$data);

        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Affiliation</th><th>Rank</th><th>Location</th></tr>";

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
