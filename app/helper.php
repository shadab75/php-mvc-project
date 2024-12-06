<?php
function redirect($page, $session = []) {
    foreach ($session as $key => $value) {
        $_SESSION[$key] = $value;
    }
    header("Location: " . URL_ROOT . $page);
    exit();
}

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}
