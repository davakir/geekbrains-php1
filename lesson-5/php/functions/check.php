<?php
/**
 * Created by PhpStorm.
 * User: Darya
 * Date: 23.02.2016
 * Time: 11:18
 */
    function is_login($last_page) {
        if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_hash'])) {
            setcookie('last_page', $last_page, time() + 60 * 3);
        }
        else {
            header('Location: ../login.php');
            exit();
        }
    }
?>