<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link rel="stylesheet" href="../pages_css/reg_empl.css">


    <title>Авторизация</title>
</head>
<body>

<main class="form-signin">
    <form action="../vendor/login.php" method="post">

        <h1 class="h3 mb-3 fw-normal">Вход</h1>

        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="wrong_login">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }
        ?>

        <div class="form-floating">
            <input type="text" class="form-control" id="login" name="login" placeholder="name@example.com" required>
            <label for="login">Логин</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Пароль</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Войти</button>
    </form>
    <div class="reg_btn_container" style="display: flex; align-items: center; justify-content: center">
        <form action="registration.php">
            <button type="submit" class="btn btn-outline-primary">Зарегистрироваться</button>
        </form>
    </div>
</main>

</body>
</html>
