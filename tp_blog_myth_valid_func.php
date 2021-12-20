<?php
function verifyLength($text, $num, $min = null) {
    if ($min == "minimum") {
        return strlen(trim($text)) >= $num;
    } else {
        return strlen(trim($text)) <= $num;
    }
}

function verifyFile($file) {
    $error = "";
    if (!in_array(pathinfo($file["name"])["extension"], ["jpg", "jpeg", "png"])) {
        $error .= "fileExtension";
    }
    if ($file["size"] > 1000000) {
        $error .= "-fileSize";
    }
    return empty($error) ? true : $error;
}
?>
