<?php require_once ('../vendor/get_all_services.php')?>
<!DOCTYPE HTML>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказ</title>
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
        <h1 class="mt-5">Заказ</h1>

        <form action='order_cont.php' method="post">
            <div class="row user_info">
                <div class="col-3"></div>
                <div class="col-6 ">
                    <select class="form-control" name="service">
                    <?php
                    foreach ($res_all_serv as $ser) {
                        print "<option value=" . $ser['id'] . ">";
                        print $ser['name'];
                        echo("</option>");
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row user_info mt-2">
                <div class="col-3"></div>
                <div class="col-3">
                    <input type="date" name="date" required>
                </div>
                <div class="col-3 text-end">
                    <button type="submit" class="btn btn-warning" name="order_f" value="">Продолжить</button>
                </div>

        </form>
    </div>
</main>
<footer class="footer mt-auto py-3 bg-light">
    <?php require_once ('../templates/footer.php')?>
</footer>
</body>
</html>
