<!DOCTYPE html>
<html lang="en" style="height: 100%; margin: 0;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RickRoll</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body style="padding: 0; margin: 0;">
    <header style="height: 8vh; border-bottom: 4px solid rgb(64, 64, 64); background-color: #193B3A;">
    <?php require './navigation.php'; ?>
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


            <!-- <button id="load-joke">Get a Joke</button> -->
            <div id="joke">Click the button to see a random joke!</div>

    <table id="data-table">
        <thead>
            <tr>
                <th data-sort="name">Name</th>
                <th data-sort="affiliation">Affiliation</th>
            </tr>
        </thead>
        <tbody>
            <!-- Дані з сервера будуть додаватись сюди динамічно -->
        </tbody>
    </table>

    <script>
        // Функція для завантаження даних з сервера
        function loadData() {
            $.ajax({
                url: "http://lab.vntu.org/api-server/lab7.php",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Очищуємо вміст таблиці перед завантаженням нових даних
                    $("#data-table tbody").empty();

                    // Проходимося по кожному елементу масиву data та додаємо рядки до таблиці
                    $.each(data, function(index, item) {
                        let row = `<tr>
                            <td>${item.name}</td>
                            <td>${item.affiliation}</td>
                            <td>${item.rank}</td>
                            <td>${item.location}</td>
                        </tr>`;
                        $("#data-table tbody").append(row);
                    });
                },
                error: function() {
                    alert("Failed to load data from server.");
                }
            });
        }

        // Функція для сортування таблиці
        function sortTable(parameter) {
    let rows = $('#data-table tbody tr').get();

    rows.sort(function(a, b) {
        // Вибір потрібної колонки: 0 для 'name', 1 для 'email' чи іншого поля
        let columnIndex = parameter === 'name' ? 0 : 1;

        // Порівняння тексту з відповідних комірок
        let A = $(a).children('td').eq(columnIndex).text();
        let B = $(b).children('td').eq(columnIndex).text();

        return A.localeCompare(B); // Використання вбудованого методу для сортування
    });

    // Додаємо відсортовані рядки назад до таблиці
    $.each(rows, function(index, row) {
        $('#data-table').children('tbody').append(row);
    });
    }

        // Виконується після завантаження сторінки
        $(document).ready(function() {
            // Завантаження даних при першому завантаженні сторінки
            loadData();

            // Оновлення таблиці при натисканні на кнопку
            $('#refresh').click(function() {
                loadData();
            });

            // Сортування при натисканні на заголовки таблиці
            $('th[data-sort]').click(function() {
                let sortParameter = $(this).data('sort');
                sortTable(sortParameter);
            });
        });
    </script>


        </div>
        <div style="width: 20%;">

            <div style="display: flex; margin-top: 6%; height: 88%; background-color: #f0f0f0;
    border: 2px solid #ccc; margin-right: 2%; border-radius: 25px;">
    <div style="margin-top: 5%; margin-left: 5%; width: 40%; height: 13%; background-color: #30A61D;
     border-radius: 20px; text-align: center;
            line-height: 50px;" id="load-joke">
Get a joke
    </div>
    <div style="margin-top: 5%; margin-left: 10%; width: 40%; height: 13%; background-color: #30A61D;
     border-radius: 20px; text-align: center;line-height: 50px;" id="refresh">Update table</div>



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


    <script>
        $(document).ready(function() {
            $('#load-joke').click(function() {
                $.ajax({
                    url: 'jokes.txt',
                    method: 'GET',
                    cache: false,
                    success: function(data) {
                        // Розділяємо жарт на окремі рядки
                        let jokes = data.split('---');
                        
                        // Обираємо випадковий жарт
                        let randomJoke = jokes[Math.floor(Math.random() * jokes.length)];
                        
                        // Виводимо жарт на сторінку
                        $('#joke').html(randomJoke.replace(/\n/g, '<br>'));
                        console.log(randomJoke)
                    },
                    error: function() {
                        $('#joke').text('Failed to load jokes.');
                    }
                });
            });
        });
    </script>


</body>

</html>