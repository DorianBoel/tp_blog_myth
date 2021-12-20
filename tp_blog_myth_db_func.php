<?php
include_once "tp_blog_myth_db.php";

function selectUser($username) {
    $sql = "SELECT * FROM user WHERE pseudo_user = :name";
    $req = $GLOBALS["db"]->prepare($sql);
    $req->execute([
        "name" => $username
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}

function addUser($username, $password) {
    $sql = "INSERT INTO user (pseudo_user, password_user) VALUES (:name, :pw)";
    $req =  $GLOBALS["db"]->prepare($sql);
    $result = $req->execute([
        "name" => $username,
        "pw" => $password
    ]);
    return $result;
}

function selectAllArticles() {
    $sql = "SELECT * FROM article INNER JOIN user ON user.id_user = article.id_user_article ORDER BY date_article DESC";
    $req = $GLOBALS["db"]->query($sql);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function selectArticle($value, $column = "id_article") {
    $sql = "SELECT * FROM article INNER JOIN user ON user.id_user = article.id_user_article WHERE $column = :value";
    $req = $GLOBALS["db"]->prepare($sql);
    $req->execute([
        "value" => $value
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}

function addArticle($title, $summary, $image, $content, $author) {
    $sql = "INSERT INTO article (titre_article, resume_article, image_article, contenu_article, id_user_article) VALUES (:title, :summary, :image, :content, :author)";
    $req = $GLOBALS["db"]->prepare($sql);
    $result = $req->execute([
        "title" => ucfirst(trim($title)),
        "summary" => ucfirst(trim($summary)),
        "image" => $image,
        "content" => ucfirst(trim($content)),
        "author" => $author
    ]);
    return $result;
}

function deleteArticle($id) {
    $sql = "DELETE FROM article WHERE id_article = :id";
    $req = $GLOBALS["db"]->prepare($sql);
    $result = $req->execute([
        "id" => $id
    ]);
    return $result;
}
?>
