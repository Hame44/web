<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продам</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>


<div class="container">
    <h2>Відгуки</h2>

    <form id="form" action="login.php" method="POST">
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
            
            <br>
                <label for="question1">Як ви ставитеся до виробів з дерева?</label>
                <br>
                <!-- <input type="text" name="comment" id="comment"> -->
                <textarea name="question1" rows="5" cols="40"></textarea>
            </p>

            <br>
                <label for="question2">Які вироби з дерева ви хотіли б купити?</label>
                <br>
                <!-- <input type="text" name="comment" id="comment"> -->
                <textarea name="question2" rows="5" cols="40"></textarea>
            </p>

            <br>
                <label for="question3">Найбезумніша ідея для виробу з дерева</label>
                <br>
                <!-- <input type="text" name="comment" id="comment"> -->
                <textarea name="question3" rows="5" cols="40"></textarea>
            </p>

            <input type="submit" value="Submit">

        </form>

</div>

<script>
$(document).ready(function() {
    $('#form').on('submit', function(e) {
        e.preventDefault(); // Запобігаємо стандартному надсиланню

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // URL, куди відправляємо дані
            data: $(this).serialize(), // Серіалізуємо дані форми
            success: function(response) {
                $('#response').html(response); // Відображаємо відповідь
                $('#form')[0].reset(); // Очищаємо форму після успішного відправлення
                console.log('WOW')

                //loadData();
                //stealData();
            },
            error: function(xhr, status, error) {
                $('#response').html("An error occurred: " + error); // Виводимо помилку
            }
        });
    });
});
</script>


</body>
</html>