<?php
require_once ('../vendor/order_cont.php');
?>
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
        <div class="row user_info">
            <div class="col-3"></div>
            <div class="col-6 ">
                <form method='post' action='../vendor/save_order.php'>
                        <?php
                        if (empty($emp))
                        {
                            echo '<div class="text-center"><p>Упс! На эту дату нет свободных работников</p></div>';
                        }else
                        {
                            echo "<select class='form-control' name='pos'>";
                            foreach ($emp as $e)
                            {
                                print "<option value=" . $e['id'] . ">";
                                print $e['emp'];
                                echo("</option>");
                            }
                            echo "</select>";
                            echo "<select class='form-control mt-2' name='address'>";
                            foreach ($addresses as $a) {
                                print "<option value=" . $a['add_id'] . ">";
                                print $a['address'];
                                echo("</option>");
                            }
                            echo "</select>
                            <input type = 'hidden' name='service' value=".$serv.">
                            <input type = 'hidden' name='date' value=".$date.">
                            <div class='text-end'><button type='submit' class='btn btn-warning mt-2' name='order'>Продолжить</button></div>";
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

