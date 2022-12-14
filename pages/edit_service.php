<?php require_once ('../vendor/get_all_equip.php');
require_once ('../vendor/get_all_services.php');
if($_COOKIE['role'] != 2) {
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
    <title>Редактирование услуг</title>
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../assets/css/edit_serv_css.css" rel="stylesheet">
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
            <div class="col-6 ">
                <form action="../vendor/add_service.php" method="post">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Название" required>
                    <input type="number" class="form-control mt-2" id="cost" name="cost" placeholder="Стоимость" required>
                    <div class="checkboxcontainer mt-2">
                        <?php
                        foreach ($res_all_equip as $res){
                            echo'<input name="eqp[]" type="checkbox" value='.$res['id'].'> '.$res['name'].'<br />';
                        }
                        ?>
                    </div>
                    <div class="text-end"><button type="submit" class="btn btn-warning mt-2"> Добавить</button></div>

                </form>
                <form action="../vendor/delete_service.php" method="post">
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
                        foreach ($res_all_serv as $res){
                            echo'<tr>
                            <td><input name="serv[]" type="checkbox" value='.$res['id'].'></td>
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
                    <div class="text-end"><button type="submit" class="btn btn-warning"> Удалить выбранные</button></div>
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

