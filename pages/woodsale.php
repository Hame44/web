<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продам</title>
</head>
<body>


<div class="container">
    <h2>Відгуки</h2>

    <form name="form" action="login.php" method="POST">
            <!-- <label>Username: </label>
            <input type="text" id="user" name="user"></br></br>
            <label>Password</label>
            <input type="password" id="pass" name="pass"></br></br>
            <input type="submit" id="btn" value="Login" name="submit" /> -->

            <p>
                <label for="Name">Name:</label>
                <input type="text" name="name" id="Name">
            </p>

           

            <p>
                <label for="emailAddress">Email:</label>
                <input type="text" name="email" id="emailAddress">
            </p> 
            
            <p>
                <label for="comment">Comment:</label>
                <!-- <input type="text" name="comment" id="comment"> -->
                <textarea name="comment" rows="5" cols="40"></textarea>
            </p>

            <input type="submit" value="Submit">

        </form>

        <?php
        $link = mysqli_connect("localhost", "root", "", "weblabdatabase");
        $result = mysqli_query($link, "SELECT * FROM persons LIMIT 50");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        ?>

        <table border="1">
            <tr>
                <th>name</th>
                <th>email</th>
                <th>comment</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['comment']) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
</div>

</body>
</html>