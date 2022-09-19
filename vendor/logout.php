<?php

setcookie('login', '', time() - 3600, '/');
setcookie('pass', '', time() - 3600, '/');
setcookie('role', '', time() - 3600, '/');
setcookie('user_id', '', time() - 3600, '/');
header('Location: ../index.php');
