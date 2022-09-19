<?php
if(isset($_POST['log'])){
    header("Location: ../pages/auth.php");
}
if(isset($_POST['reg'])){
    header("Location: ../pages/registration.php");
}