<?php require_once ('../vendor/get_all_equip.php');
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
    <title>Учёт оборудования</title>
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
        <h1 class="mt-5">Учёт оборудования</h1>
        <div class="row user_info">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="../vendor/add_equipment.php" method="post">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Название">
                    <input type="number" class="form-control mt-2" id="numb" name="numb" placeholder="Количество">
                    <div class="text-end"><button type="submit" class="btn btn-warning mt-2"> Добавить</button></div>
                </form>
                <form action="../vendor/delete_equipment.php" method="post">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Название</th>
                            <th scope="col">Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($res_all_equip as $res){
                            echo'<tr>
                            <td><input name="equip[]" type="checkbox" value='.$res['id'].'></td>
                            <td>'.$res['name'].'</td>
                            <td>'.$res['total'].'</td>
                            </tr>';
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

