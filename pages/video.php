<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ШоТут?</title>
    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <header style="height: 8vh; border-bottom: 4px solid rgb(64, 64, 64); background-color: #193B3A;">
    <?php require './navigation.php'; ?>
    </header>
    <div style="display: flex; height: calc(100vh - 18vh);">

        <div style="width: 20%; height: 100%;">
            Ліва колонка

        </div>
        <div style="width: 60%; display: flex; justify-content: center; align-items: center; height: 100%;">
            <video controls width="65%">
                <source src="../assets/important.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div style="width: 20%; height: 100%;">
            Права колонка

        </div>
    </div>

    <footer style="width: 100%; position: fixed; bottom: 0; left: 0; margin: 0; padding: 0; box-sizing: border-box;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin: 0; padding: 0;">
            <a href="shop.php" style="width: 25%; display: inline-block; margin: 0; padding: 0; ">
                <img src="../assets/work.png" width="100%" style="margin: 0; padding: 0; vertical-align: bottom;">
            </a>
            <img src="../assets/robota.png" width="25%" style="margin: 0; padding: 0;">
            <img src="../assets/robota.png" width="25%" style="margin: 0; padding: 0;">
            <img src="../assets/robota.png" width="25%" style="margin: 0; padding: 0;">
        </div>
    </footer>

</body>

</html>