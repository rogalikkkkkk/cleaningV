<?php require_once ('../vendor/my_page.php');
if($_COOKIE['role'] == 2) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE HTML>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Профиль</title>
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
        <div class="row user_info">
            <div class="col-2"></div>
            <div class="col-6">
                <?php
                    echo '<h3>' . $res_userinfo[0]['first_name'] . '</h3>
                        <h3>' . $res_userinfo[0]['last_name'] . '</h3>
                        <h3>' . $res_userinfo[0]['patr_name'] . '</h3>';
                    if ($_COOKIE['role'] == 0) {
                        echo '<h3>Телефон: ' . $res_userinfo[0]['tel'] . '</h3>';
                    } else if ($_COOKIE['role'] == 1) {
                        echo '<h3>Уровень мастерства: ' . $res_userinfo[0]['e_lvl'] . '</h3>';
                    }
                ?>
            </div>
            <div class="col-2 ">
                <img src="../assets/images/user.png" width="180">
            </div>
        </div>
        <div class="row order">
            <div class="col-2"></div>
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
