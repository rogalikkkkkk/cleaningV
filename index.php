<!DOCTYPE HTML>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="assets/css/index_css.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-white">Главная</a></li>
                <?php
                if (isset($_COOKIE['role']) && $_COOKIE['role'] != 2) {
                    echo '<li><a href="pages/my_page.php" class="nav-link px-2 text-white">Личный кабинет</a></li>';
                } elseif (isset($_COOKIE['role'])&& $_COOKIE['role']==2) {
                    echo '<li><a href="pages/edit_equip.php" class="nav-link px-2 text-white">Учёт оборудования</a></li>
                    <li><a href="pages/edit_service.php" class="nav-link px-2 text-white">Редактирование услуг</a></li>';
                }
                if (isset($_COOKIE['role']) && $_COOKIE['role'] == 0) {
                    echo '<li><a href="pages/addresses.php" class="nav-link px-2 text-white">Адресы</a></li>
                            <li><a href="pages/order.php" class="nav-link px-2 text-white">Заказ</a></li>';
                }elseif (isset($_COOKIE['role']) && $_COOKIE['role'] == 1){
                    echo '<li><a href="pages/list_emp_serv.php" class="nav-link px-2 text-white">Список услуг</a></li>';
                }
                ?>
            </ul>
            <?php
            if(!isset($_COOKIE['role'])){
                echo'<form method="post" action="vendor/log.php">
                <div class="text-end">
                    <input type="submit" name="log" value="Войти" class="btn btn-outline-light me-2"></input>
                    <input type="submit" name="reg" value="Зарегистрироваться" class="btn btn-warning"></input>
                </div>
            </form>';
            }
            else{
                echo'<form method="post" action="vendor/logout.php">
                <div class="text-end">
                    <input type="submit" name="logout" value="Выйти" class="btn btn-warning"></input>
                </div>
            </form>';
            }
            ?>
        </div>
    </div>

</header>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Добро пожаловать в CleaningVin</h1>
        <div class="row">
            <div class="col-5">
                <img src="assets/images/main_img.png">
            </div>
            <div class="col-7 text-main">
                <h3>Сервис по подбору клининг-услуг.</h3>
                <h3>Здесь вы сами выбраете своего мастера.</h3>
                <h3>Гарантируем, вы останетесь довольны!</h3>
                <h3>Мы вам это гарантируем!</h3>
            </div>
        </div>


    </div>
</main>
<footer class="footer mt-auto py-3 bg-light">
    <?php require_once ('templates/footer.php')?>
</footer>
</body>
</html>
