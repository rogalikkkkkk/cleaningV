<?php  session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link rel="stylesheet" href="../pages_css/reg_empl.css">


</head>
<body class="text-center">

<main class="form-signin">
    <form method="post" action="../vendor/registration_code.php">
        <h1 class="h3 mb-3 fw-normal">Введите данные</h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="login" id="floatingInput" placeholder="login">
            <label for="floatingInput">Логин</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="password">
            <label for="floatingPassword">Пароль</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="name" id="floatingPassword" placeholder="name">
            <label for="floatingPassword">Имя</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="lname" id="floatingPassword" placeholder="lastname">
            <label for="floatingPassword">Фамилия</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="pname" id="floatingPassword" placeholder="patrname">
            <label for="floatingPassword">Отчество</label>
        </div>
        <div class="form-floating">
            <input type="number" class="form-control" name="elvl" id="floatingPassword" placeholder="elvl">
            <label for="floatingPassword">Уровень мастерства</label>
        </div>

        <?php
        if(isset($_SESSION['message'])) {
            echo '<p style="color: darkred">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>

        <input class="w-100 btn btn-lg btn-primary" name="reg_empl" type="submit">
    </form>
</main>



</body>
</html>
