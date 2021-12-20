<?php
session_start();
include_once "tp_blog_myth_db_func.php";

if (!empty($_POST['username'])&& !empty($_POST['password'])) {
    $user = selectUser($_POST['username']);
    if (!$user) {
        $error = "userNotFound";
        header("Location: tp_blog_myth_login_view.html.php?error=$error");
    } else {
        if(password_verify($_POST['password'], $user->password_user)){
            $_SESSION['id'] = $user->id_user;
            $_SESSION['pseudo'] = $user->pseudo_user;
            $_SESSION['is_admin'] = $user->is_admin_user;
            if (!empty($_POST['remember'])) {
                setcookie('id', $user->id_user, time()+31556926, null, null, true, true);
                setcookie('pseudo', $user->pseudo_user, time()+31556926, null, null, true, true);
                setcookie('is_admin', $user->is_admin_user, time()+31556926, null, null, true, true);
            }
            header("Location: index.php?connexion=ok");
        } else {
            $error = "incorrectPassword";
            header("Location: tp_blog_myth_login_view.html.php?error=$error");
        }
    }
} else {
    $error = "emptyInput";
    header("Location: tp_blog_myth_login_view.html.php?error=$error");
}
?>
