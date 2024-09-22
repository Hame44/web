<!DOCTYPE html>
<html lang="en" style="height: 100%; margin: 0;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RickRoll</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>

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

<body style="padding: 0; margin: 0;">
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
    <div style="display: flex; height: calc(100vh - 18vh); background-color: #ffffff;">

        <div style="width: 20%;">

            <div style="display: flex; margin-top: 6%; height: 88%; background-color: #f0f0f0;
    border: 2px solid #ccc; margin-left: 2%; border-radius: 25px;
            justify-content: center; align-items: center;">
                <p style="text-align: center; margin: 0; color: #30A61D; font-size: xx-large;">Життя бентежне</p>
            </div>

        </div>
        <div style="width: 60%;">
            Основний вміст
            <button id="buttonn">
                <p id="p">Якнопка</p>
            </button>
            <p>Поточний час: <span id="time"></span></p>
            <p>Сьогодні <?php echo date('d.m.Y'); ?></p>

        </div>
        <div style="width: 20%;">

            <div style="display: flex; margin-top: 6%; height: 88%; background-color: #f0f0f0;
    border: 2px solid #ccc; margin-right: 2%; border-radius: 25px;">
    <div style="margin-top: 5%; margin-left: 5%; width: 40%; height: 13%; background-color: #30A61D; border-radius: 20px;">

    </div>
    <div style="margin-top: 5%; margin-left: 10%; width: 40%; height: 13%; background-color: #30A61D; border-radius: 20px;"></div>



    </div>
    </div>


            </div>

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