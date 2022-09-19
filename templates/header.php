<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="../index.php" class="nav-link px-2 text-secondary">Главная</a></li>
            <?php
            if (isset($_COOKIE['role']) && $_COOKIE['role'] != 2) {
                echo '<li><a href="../pages/my_page.php" class="nav-link px-2 text-white">Личный кабинет</a></li>';
            }
            if (isset($_COOKIE['role']) && $_COOKIE['role'] == 0) {
                echo '<li><a href="../vendor/order" class="nav-link px-2 text-white">Заказ</a></li>';
            }
            ?>
        </ul>
        <?php
        if(!isset($_COOKIE['role'])){
            echo'<form method="post" action="../vendor/log.php">
                <div class="text-end">
                    <input type="submit" name="log" value="Войти" class="btn btn-outline-light me-2"></input>
                    <input type="submit" name="reg" value="Зарегистрироваться" class="btn btn-warning"></input>
                </div>
            </form>';
        }
        else{
            echo'<form method="post" action="../vendor/logout.php">
                <div class="text-end">
                    <input type="submit" name="logout" value="Выйти" class="btn btn-warning"></input>
                </div>
            </form>';
        }
        ?>
    </div>
</div>
