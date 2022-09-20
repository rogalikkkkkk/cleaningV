<?php require_once ('../vendor/emp_serv.php')?>
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
</head>
<body class="d-flex flex-column h-100">
<header class="p-3 text-bg-dark">
    <?php require_once ('../templates/header.php')?>
</header>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Мои услуги</h1>
        <div class="row user_info">
            <div class="col-3"></div>
            <div class="col-6 ">
                <form action="../vendor/del_emp_service.php" method="post">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Название</th>
                            <th scope="col">Стоимость</th>
                            <th scope="col">Оборудование</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($res_added_serv as $res){
                            echo'<tr>
                            <td><input name="del_serv[]" type="checkbox" value='.$res['id'].'></td>
                            <td>'.$res['name'].'</td>
                            <td>'.$res['cost'].'</td>
                            <td>';
                            foreach ($res['ename'] as $eq){
                                echo'<p>'.$eq.'</p>';
                            }
                            '</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    if ($count_added>0){
                        echo'<div class="text-end"><button type="submit" class="btn btn-warning mt-2"> Удалить выбранные</button></div>';
                    }
                    ?>
                </form>
            </div>
        </div>
        <h1 class="mt-5">Возможные услуги</h1>
        <div class="row user_info">
            <div class="col-3"></div>
            <div class="col-6 ">
                <form action="../vendor/add_emp_service.php" method="post">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Название</th>
                            <th scope="col">Стоимость</th>
                            <th scope="col">Оборудование</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($res_not_added_serv as $res){
                            echo'<tr>
                            <td><input name="add_serv[]" type="checkbox" value='.$res['id'].'></td>
                            <td>'.$res['name'].'</td>
                            <td>'.$res['cost'].'</td>
                            <td>';
                            foreach ($res['ename'] as $eq){
                                echo'<p>'.$eq.'</p>';
                            }
                            '</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    if ($count_not_added>0){
                        echo'<div class="text-end"><button type="submit" class="btn btn-warning"> Добавить выбранные</button></div>';
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>
</main>
<footer class="footer mt-auto py-3 bg-light">
    <?php require_once ('../templates/footer.php')?>
</footer>
</body>
</html>
