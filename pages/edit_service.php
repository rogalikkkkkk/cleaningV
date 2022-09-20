<?php require_once ('../vendor/get_all_equip.php');
require_once ('../vendor/get_all_services.php');
?>
<!DOCTYPE HTML>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование услуг</title>
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../assets/css/index_css.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header class="p-3 text-bg-dark">
    <?php require_once ('../templates/header.php')?>
</header>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Редактирование услуг</h1>
        <div class="row user_info">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="../vendor/add_service.php" method="post">
                    <input type="text" name="name">
                    <input type="number" name="cost">
                    <input type="text">
                    <button type="submit"> Создаю</button>

                </form>
<!--                TODO: тут добавление услуги, здесь нужно поле для ввода названия и цены и как-то впихнуть чекбоксами
                    TODO: необходимый инвентарь (юзай $res_all_equip) (его может быть несколько у одной услуги)
                    TODO: в чекбокс в значение давай айди инвентаря, имя дай eqp[]-->
                <form action="../vendor/delete_service.php" method="post">
                    <!-- TODO: табличка со всеми услугами (юзай $res_all_serv), для каждой нужен чекбокс, имя чекбокса serv[]
                    TODO: в каждый чекбокс в value класть айди удаляемой позиции-->
                    <button type="submit" class="btn"> Удалить</button>
                </form>

            </div>
        </div>
        <div class="row order">
            <div class="col-"></div>
            <div class="col-8 ">

                <?php
                if ($_COOKIE['role'] == 0) {
                    echo '
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Дата</th>
                        <th scope="col">Услуга</th>
                        <th scope="col">Работник</th>
                    </tr>
                    </thead>
                    <tbody>';
                    $i = 1;
                    foreach ($order_array as &$item) {
                        echo '
                        <tr>
                            <th scope="row">' . $i . '</th>
                            <td>' . $item['date'] . '</td>
                            <td>' . $item['ser'] . '</td>
                            <td>' . $item['e_ln'] . '</td>
                        </tr>
                        ';
                        $i++;
                    }
                    echo '
                    </tbody>
                    </table>
                    ';
                } elseif ($_COOKIE['role'] == 1) {
                    echo '
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Дата</th>
                        <th scope="col">Услуга</th>
                        <th scope="col">Адресс</th>
                        <th scope="col">Пользователь</th>
                    </tr>
                    </thead>
                    <tbody>';
                    $i = 1;
                    foreach ($res_empl_job as &$item) {
                        echo '
                        <tr>
                            <th scope="row">' . $i . '</th>
                            <td>' . $item['date'] . '</td>
                            <td>' . $item['ser'] . '</td>
                            <td>' . $item['cust_adress'] . '</td>
                            <td>' . $item['c_ln'] . '</td>
                        </tr>
                        ';
                        $i++;
                    }
                    echo '
                    </tbody>
                    </table>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</main>
<footer class="footer mt-auto py-3 bg-light">
    <?php require_once ('../templates/footer.php')?>
</footer>
</body>
</html>

