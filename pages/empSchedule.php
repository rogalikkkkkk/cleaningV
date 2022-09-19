<!DOCTYPE HTML>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../assets/css/index_css.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-white">Главная</a></li>
                <li><a href="../php/my_page.php" class="nav-link px-2 text-white">Личный кабинет</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">Заказ</a></li>
            </ul>
            <form method="post" action="..php/log.php">
                <div class="text-end">
                    <input type="submit" name="log" value="Войти" class="btn btn-outline-light me-2"></input>
                    <input type="submit" name="reg" value="Зарегистрироваться" class="btn btn-warning"></input>
                </div>
            </form>
        </div>
    </div>
</header>
<main class="flex-shrink-0">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Дата</th>
                <th scope="col">Услуга</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Услуга</td>
            </tr>
            </tbody>
        </table>
        <script type="text/javascript" src="../js/addDayFunc.js"></script>
        <button type="button" class="btn btn-outline-primary" onclick="addDayFunc()">Добавить день работы</button>
        <div class="addingDay" id="addingDay" style="display: none">
            <form action="">
                <div class="mb-3">
                    <label for="dateServ" class="form-label">Выберите дату</label>
                    <input type="date" class="form-control" name = "dateServ" required>
                </div>
                <div class="mb-3">
                    <label for="service" class="form-label">Выберите услугу</label>
                    <select class="form-control" name="service">
                        <?php
                        $empSch = [['name'=> 'услуга', 'id' => '1']];
                        foreach ($empSch as $emp) {
                            print "<option value=" . $emp['name'] . ">";
                            print $emp['id'];
                            echo("</option>");
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</main>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Made by Виноградова Екатерина.</span>
    </div>
</footer>
</body>
</html>