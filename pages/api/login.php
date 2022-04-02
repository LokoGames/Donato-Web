<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $sqlitePath = $_SERVER["DOCUMENT_ROOT"] . "/donato";
    $handler = new PDO("sqlite:$sqlitePath");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT nome,role FROM users WHERE nome like '%$username' and password like '%$password'";
    $res = ($handler->query($sql)->fetch(PDO::FETCH_ASSOC));
    if (count($res) > 0) {
        $jsonToEncode = array(
            'username' => $username,
            'role' => $res["role"]
        );
        $json = json_encode($jsonToEncode);
        header("Set-cookie: user=" . base64_encode($json) . "; expires=0; path=/; HttpOnly; secure=true; SameSite=Strict;");
        header("Location: ../../admin/");
        exit;
    } else {
        die(header("Location: ../login.html"));
    }
} else {
    die(header("Location: ../login.html"));
}
?>