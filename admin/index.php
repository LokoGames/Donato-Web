<?php
include $_SERVER["DOCUMENT_ROOT"] . "/pages/api/db.php";
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

$GLOBALS['user'] = json_decode(base64_decode($_COOKIE["user"]), true);
$GLOBALS['username'] = $GLOBALS['user']["username"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/dynamic/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src="../images/dnt.png" alt="Logo" draggable="False">
                <h1>Painel De Controle</h1>
            </a>
        </div>
    </header>
    <main>
        <div class="left-side">
            <h1>
                <?php echo $GLOBALS["username"]; ?>
            </h1>
            <div class="dropdown">
                <a href="../pages/upload.php">Upload</a>
                <a href="../admin/logout.php">Logoff</a>
            </div>
        </div>
        <div class="right-side">
            <table class="obras">
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>End</td>
                    <td>Images</td>
                    <td>Desc</td>
                    <td>Preço</td>
                    <td>Vendida</td>
                    <td>Options</td>
                </tr>
                <?php
                $rows = array(getAll());
                // var_dump($rows);
                if ($rows && count($rows) > 0) {
                    $sem = $rows[0];
                    for ($i = 0; $i < count($sem); $i++) {
                        $row = $sem[$i];
                        $id = intval($row["id"]);
                        $nome = $row["nome"];
                        $end = $row["end"];
                        $desc = $row["desc"];
                        $preco = $row["preco"];
                        $sold = ($row["sold"]) ? "Vendida" : "Disponivel";
                        $results = getImages($id);
                        // var_dump($results);
                        $imgs = "";
                        if ($results != false) {
                            for ($j = 0; $j < 2; $j++) {
                                if (array_key_exists($j, $results)) {
                                    $file = $results[$j];
                                    $imgs .= "<img src='data:image/png;base64, $file' draggable='false'/>";
                                }
                            }
                        }
                        echo "
                        <tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$end</td>
                    <td>$imgs</td>
                    <td>
                        <textarea readonly>$desc</textarea>
                    </td>
                    <td>$preco</td>
                    <td> $sold</td>
                    <td>
                        <a href='../pages/api/edit.php?id=$id'>Edit</a>
                        <a href='../pages/api/remove.php?id=$id'>Remove</a>
                    </td>
                </tr>";
                    }
                } else {
                    echo "<tr><td><h1> Nenhuma obra encontrada!</h1></td></tr>";
                }
                ?>
            </table>
        </div>
    </main>
    <script src="../js/dashboard.js"></script>
</body>

</html>