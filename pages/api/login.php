<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $sqlitePath = $_SERVER["DOCUMENT_ROOT"] . "/donato";
    $handler = new PDO("sqlite:$sqlitePath");
    $res = ($handler->query("SELECT * FROM users;")->fetchAll(PDO::FETCH_ASSOC));
    $username = $_POST["username"];
    $password = $_POST["password"];
    foreach ($res as $user) { //foreach element in $arr
        var_dump($user);
        if ($user["nome"] == $username && $user["password"] == $password && $user["role"] == 0) {
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