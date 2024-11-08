<?php 
// $_SESSION = false; 
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $_SESSION = true;
// }


    // Initialize a file URL to the variable
    // $url = 
     //'http://localhost/ServerDB/web2.1/assets/37.jpg';
    
    // // Use basename() function to return the base name of file
    // $file_name = basename($url);
    
    // // Use file_get_contents() function to get the file
    // // from url and use file_put_contents() function to
    // // save the file by using base name
    // if (file_put_contents($file_name, file_get_contents($url)))
    // {
    //     echo "File downloaded successfully";
    // }
    // else
    // {
    //     echo "File downloading failed.";
    // }
   

  
    // Initialize the cURL session
    // $ch = curl_init($url);
  
    // // Initialize directory name where
    // // file will be save
    // $dir = './';
  
    // // Use basename() function to return
    // // the base name of file
    // $file_name = basename($url);
  
    // // Save file into file location
    // $save_file_loc = $dir . $file_name;
  
    // // Open file
    // $fp = fopen($save_file_loc, 'wb');
  
    // // It set an option for a cURL transfer
    // curl_setopt($ch, CURLOPT_FILE, $fp);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
  
    // // Perform a cURL session
    // curl_exec($ch);
  
    // // Closes a cURL session and frees all resources
    // curl_close($ch);
  
    // // Close file
    // fclose($fp);

?>


<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['pass'])) {
    // Перевірка логіну і пароля
    if ($_POST['email'] == 'hame@gmail.com' && $_POST['pass'] == '4444') {
        $_SESSION['loggedin'] = true;
    }
}
?>



<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['export'])) {
 $servername = "localhost";
 $username = "root";  // Ваше ім'я користувача для бази даних
 $password = "";      // Пароль для бази даних (якщо пустий, залиште пустим)
 $dbname = "weblabdatabase";
 
 // Створення з'єднання
 $link = new mysqli($servername, $username, $password, $dbname);
 
 // Перевірка підключення
 if ($link->connect_error) {
     die("Підключення до бази даних не вдалося: " . $link->connect_error);
 }
 
 // 2. Виконання запиту на отримання всіх даних з таблиці `persons`
 $query = "SELECT * FROM persons";
 $result = $link->query($query);
 
 if ($result->num_rows > 0) {
     // 3. Відкриття текстового файлу для запису
     $filename = "D:\data.txt";
     $file = fopen($filename, "w");
 
     // Перевірка, чи файл вдалося відкрити
     if ($file) {
         // 4. Запис заголовку таблиці у файл
         fwrite($file, "Name\tEmail\tQuestion1\tQuestion2\tQuestion3\tTime\n");
 
         // 5. Запис кожного рядка даних з бази даних у текстовий файл
         while ($row = $result->fetch_assoc()) {
             $line = $row['name'] . "\t" . $row['email'] . "\t" . $row['question1'] . "\t" . $row['question2'] . "\t" . $row['question3'] . "\t" . $row['time'] . "\n";
             fwrite($file, $line);
         }
 
         // 6. Закриття файлу
         fclose($file);
         echo "Дані успішно записані у файл: $filename";
     } 
 }
 
 // 7. Закриття з'єднання з базою даних
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
    // if (!$_SESSION): 
        ?>
    <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
<form name="form" method="POST" id="form">
            <!-- <label>Username: </label>
            <input type="text" id="user" name="user"></br></br>
            <label>Password</label>
            <input type="password" id="pass" name="pass"></br></br>
            <input type="submit" id="btn" value="Login" name="submit" /> -->
           

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
        // endif; 
        ?>
        <?php else: ?>

        <?php 
            // if ($_SESSION): 
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