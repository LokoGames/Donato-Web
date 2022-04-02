<?php
include "db.php";
if (isset($_COOKIE["user"])) {
    $user = json_decode(base64_decode($_COOKIE["user"]), true);
    if (empty($user)) {
        exit(header("Location: ../pages/login.html"));
    }
    if ($user["role"] != 0) {
        exit(header("Location: ../pages/login.html"));
    }
} else {
    exit(header("Location: ../pages/login.html"));
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (checkId($id)) {
        removeObra($id);
        exit(header("Location: ../../admin/"));
    } else {
        exit(header("Location: ../../admin/"));
    }
}
?>