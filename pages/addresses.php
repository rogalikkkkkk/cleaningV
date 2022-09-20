<?php require_once ('../vendor/get_all_address.php');
session_start();
if($_COOKIE['role'] != 0) {
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
        <h1 class="mt-5">Список адресов</h1>
        <div class="row user_info">
            <div class="col-3"></div>
            <div class="col-6 ">
                <?php
                if(isset($_SESSION['message'])) {
                    echo '<div class="text-center"><p style="color: darkred">' . $_SESSION['message'] . '</p></div>';
                }
                unset($_SESSION['message']);
                ?>
                <form action="../vendor/add_address.php" method="post">
                    <input type="text" class="form-control" id="city" name="city" placeholder="Город" required>
                    <input type="text" class="form-control mt-2" id="street" name="street" placeholder="Улица" required>
                    <input type="text" class="form-control mt-2" id="house" name="house" placeholder="Дом" required>
                    <input type="text" class="form-control mt-2" id="apart" name="apart" placeholder="Квартира" required>
                    <input type="number" class="form-control mt-2" id="area" name="area" placeholder="Площадь уборки" required>
                    <input type="number" class="form-control mt-2" id="floor" name="floor" placeholder="Этаж" required>
                    <select name="elevator" class="form-control mt-2" id="elevator">
                        <option value="">Наличие лифта</option>
                        <option value=0>Лифта нет</option>
                        <option value=1>Лифт есть</option>
                    </select>
                    <div class="text-end"><button type="submit" class="btn btn-warning mt-2"> Добавить</button></div>

                </form>
            </div>
        </div>
        <div class="row user_info mt-5">
            <div class="col-2"></div>
            <div class="col-8 ">
                <form action="../vendor/delete_address.php" method="post">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Город</th>
                            <th scope="col">Улица</th>
                            <th scope="col">Дом</th>
                            <th scope="col">Квартира</th>
                            <th scope="col">Площадь уборки</th>
                            <th scope="col">Этаж</th>
                            <th scope="col">Лифт</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($res_all_addreses as $res){
                            echo'<tr>
                            <td><input name="adr[]" type="checkbox" value='.$res['id'].'></td>
                            <td>'.$res['city'].'</td>
                            <td>'.$res['street'].'</td>
                            <td>'.$res['house'].'</td>
                            <td>'.$res['apart'].'</td>
                            <td>'.$res['area'].'</td>
                            <td>'.$res['floor'].'</td>';
                            if($res['elevator']==0){
                                echo'<td>нет</td></tr>';
                            }else{
                                echo'<td>есть</td></tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    if ($count_ad>0){
                        echo'<div class="text-end"><button type="submit" class="btn btn-warning"> Удалить выбранные</button></div>';
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

