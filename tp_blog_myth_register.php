<?php
session_start();
include_once "tp_blog_myth_db_func.php";
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $user = selectUser($_POST['username']);
    if ($user) {
        $error = "existingUsername";
        header("Location: tp_blog_myth_register_view.html.php?error=$error");
    } else {
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $error = "diffPassword";
            header("Location: tp_blog_myth_register_view.html.php?error=$error");
        } else {
            $pwHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $result = addUser($_POST['username'], $pwHash);
            if ($result) {
                $user = selectUser($_POST['username']);
                $_SESSION['id'] = $user->id_user;
                $_SESSION['pseudo'] = $user->pseudo_user;;
                $_SESSION['is_admin'] = $user->is_admin_user;
                header("Location: index.php?register=success");
            } else {
                $error = "dbError";
                header("Location: tp_blog_myth_register_view.html.php?error=$error");
            }
        }
    }
} else {
    $error = "emptyInput";
    header("Location: tp_blog_myth_register_view.html.php?error=$error");
}
?>
