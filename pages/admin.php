<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['pass'])) {

    if ($_POST['email'] == 'hame@gmail.com' && $_POST['pass'] == '4444') {
        $_SESSION['loggedin'] = true;
    }
}
?>



<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['export'])) {
 $servername = "localhost";
 $username = "root";  
 $password = ""; 
 $dbname = "weblabdatabase";
 

 $link = new mysqli($servername, $username, $password, $dbname);
 
 // Перевірка підключення
 if ($link->connect_error) {
     die("Підключення до бази даних не вдалося: " . $link->connect_error);
 }
 

 $query = "SELECT * FROM persons";
 $result = $link->query($query);
 
 if ($result->num_rows > 0) {

     $filename = "D:\data.txt";
     $file = fopen($filename, "w");
 
 
     if ($file) {

         fwrite($file, "Name\tEmail\tQuestion1\tQuestion2\tQuestion3\tTime\n");
 

         while ($row = $result->fetch_assoc()) {
             $line = $row['name'] . "\t" . $row['email'] . "\t" . $row['question1'] . "\t" . $row['question2'] . "\t" . $row['question3'] . "\t" . $row['time'] . "\n";
             fwrite($file, $line);
         }

         fclose($file);
         echo "Дані успішно записані у файл: $filename";
     } 
 }
 

 $link->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        ?>
    <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
<form name="form" method="POST" id="form">
           

            <p id="p">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </p> 

            <p>
                <label for="pass">Password:</label>
                <input type="text" name="pass" id="pass" required>
            </p> 

            <input type="submit" value="Submit" onclick="sendForm()" >

        </form>
        <?php 

        ?>
        <?php else: ?>

        <?php 
            ?>
            <?php
        $link = mysqli_connect("localhost", "root", "", "weblabdatabase");
        $result = mysqli_query($link, "SELECT * FROM persons LIMIT 50");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        ?>

        

        <table border="1">
            <tr>
                <th>name</th>
                <th>email</th>
                <th>question1</th>
                <th>question2</th>
                <th>question3</th>
                <th>time</th>
                <th>Button</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['question1']) ?></td>
                    <td><?= htmlspecialchars($row['question2']) ?></td>
                    <td><?= htmlspecialchars($row['question3']) ?></td>
                    <td><?= htmlspecialchars($row['time']) ?></td>
                    <td onclick="deleteData('<?= htmlspecialchars($row['email']) ?>')">Delete</td>
                </tr>
            <?php endforeach ?>
        </table>

        <form method="POST" action="admin.php">
    <input type="submit" name="export" value="Експорт даних">
</form>
        <?php endif; ?>


        <script>
            function sendForm() {
                event.preventDefault();
                if (document.getElementById("email").value=='hame@gmail.com' && document.getElementById("pass").value=='4444') {
                    form = document.getElementById('form');
                    form.submit();
                }
   
            }

            function deleteData (email) {
                console.log('lol')
               
        fetch('delete.php?email=' + encodeURIComponent(email))
            .then(response => response.text())
            .then(data => {
                //alert(data);
                location.reload();
            })
            .catch(error => console.error('Error:', error));
            }
        </script>
</body>
</html>