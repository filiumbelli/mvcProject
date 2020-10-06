<?php
session_start();

function success_message($name)
{
    switch ($name) {
        case 'register':
            $msg = '<div class="alert alert-success">You have succesfully registered.</div>';
            break;
        default:
            $msg = '';
            break;
    }
    return $msg;
}

function createUserSession($user){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['credit'] = $user['credit'];
}
