<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $users = json_decode(file_get_contents("../../users.json"), true);
    foreach ($users as $user) { //foreach element in $arr
        if ($user["username"] == $username && $user["password"] == $password) {
            $jsonToEncode = array(
                'username' => $username,
                'role' => $user["role"]
            );
            $json = json_encode($jsonToEncode);
            header("Set-cookie: user=" . base64_encode($json) . "; expires=0; path=/; HttpOnly; secure=true; SameSite=Strict;");
            header("Location: ../../admin/");
            exit;
        }else {
            die(header("Location: ../login.html"));
        }
    }
} else {
    die(header("Location: ../login.html"));
}
?>