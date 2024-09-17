<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    $array = ['Абдулин', 'Бемов', 'Безвинная', 'Наумов'];

    // Проверка на наличие Сидорова
    $sid_message = in_array('Сидоров', $array) ? 'Сидоров есть' : 'Сидоров отсутствует';

    // Удаление последнего элемента
    $expelled = array_pop($array);
    ?>

    <h1 class="container">Задание 1.</h1>

    <table class="table text-center container mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Фамилия</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($array as $index => $person) {
                echo '<tr>';
                echo '<th scope="row">' . ($index + 1) . '</th>';
                echo '<td>' . htmlspecialchars($person) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <div class="container d-flex justify-content-center gap-5 mt-4">
        <button class="btn btn-primary" id="checkSidButton">Проверить наличие Сидорова</button>
        <button class="btn btn-danger" id="removeLastButton">Удаление последнего</button>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="sidToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Сообщение</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="sidToastBody"></div>
        </div>
        <div id="removeToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Сообщение</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="removeToastBody"></div>
        </div>
    </div>

    <section class="container mt-5">
        <h1>Задание 2.</h1>

        <?php
        $clubs = [
            "Спортивный" => "Сидоров",
            "Художественный" => "Емелина",
            "Музыкальный" => "Иванова",
            "Литературный" => "Петров",
            "Биологический" => "Антонова"
        ];

        // Сортировка 
        asort($clubs);

        foreach ($clubs as $club => $surname) {
            echo "<p>$club - $surname<br></p>";
        }
        ?>

    </section>

    <section class="container mt-5">

        <h1>Задание 3.</h1>

        <?php
        $student = array(
            "first_name" => "Никита",
            "last_name" => "Абдулин",
            "group" => "425 Веб",
            "hobbies" => array("Спорт", "Программирование", "Бои без правил на голых кулаках"),
            "social_media" => array(
                array("platform" => "Telegram", "username" => "@Oldsmob1le")
            )
        );

        echo "<pre>";
        print_r($student);
        echo "</pre>";
        ?>


    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        document.getElementById('checkSidButton').addEventListener('click', function () {
            var sidToastBody = document.getElementById('sidToastBody');
            sidToastBody.textContent = '<?php echo $sid_message; ?>';
            var sidToast = new bootstrap.Toast(document.getElementById('sidToast'));
            sidToast.show();
        });

        document.getElementById('removeLastButton').addEventListener('click', function () {
            var removeToastBody = document.getElementById('removeToastBody');
            var lastPerson = '<?php echo htmlspecialchars($expelled); ?>';
            removeToastBody.textContent = 'Из массива был удален: ' + lastPerson;
            var removeToast = new bootstrap.Toast(document.getElementById('removeToast'));
            removeToast.show();
        });
    </script>
</body>

</html>