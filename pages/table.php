<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:)</title>
    <link rel="stylesheet" href="style.css" />

    <script>
        function displayTime() {
            let now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();

            if (hours < 10) hours = '0' + hours;
            if (minutes < 10) minutes = '0' + minutes;
            if (seconds < 10) seconds = '0' + seconds;

            let currentTime = hours + ':' + minutes + ':' + seconds;

            document.getElementById('time').innerHTML = currentTime;
        }


        setInterval(displayTime, 1000);
    </script>
</head>

<body>
    <header style="height: 8vh; border-bottom: 4px solid rgb(64, 64, 64); background-color: #193B3A;">
        <nav style="height: 100%;">
            <ul class="list">
                <div style="flex-grow: 1; display: flex; align-items: center; justify-content: center;"
                    onclick="window.location.href='index.php'">
                    <li>На головну</li>
                </div>
                <div style="flex-grow: 1; justify-content: center; display: flex; align-items: center;"
                    onclick="window.location.href='table.php'">
                    <li>Таблиця</li>
                </div>
                <div style="flex-grow: 1; justify-content: center; display: flex; align-items: center;"
                    onclick="window.location.href='video.php'">
                    <li>Відео</li>
                </div>
            </ul>
        </nav>
    </header>
    <div style="display: flex; display: flex; height: calc(100vh - 18vh);">

        <div style="width: 20%; display: flex; justify-content: center;">
            Ліва колонка

            <ol class="list123">
                <li>Один: אֶחָד (Echad)</li>
                <li>Два: שְׁנַיִם (Shnayim)</li>
                <li>Три: שְׁלֹשָׁה (Shlosha)</li>
            </ol>
            <p>Поточний час: <span id="time"></span></p>
            <p>Сьогодні <?php echo date('d.m.Y'); ?></p>
        </div>
        <div style="width: 60%; display: flex; align-items: center; justify-content: center;">

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Виріб</th>
                        <th>Ціна</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Моаї</td>
                        <td>200</td>
                    </tr>
                    <tr class="active-row">
                        <td>міні моаї</td>
                        <td>80</td>
                    </tr>
                    <tr class="active-row"></tr>
                    <td>флешка моаї</td>
                    <td>договірна</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
        <div style="width: 20%;">
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