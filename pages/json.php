<?php

$link = mysqli_connect("localhost", "root", "", "weblabdatabase");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "SELECT name, email, question1, question2, question3 FROM persons";
$result = mysqli_query($link, $sql);

if ($result) {
    $surveys = [];

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

    header('Content-Type: application/json');

    echo json_encode($surveys, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>
