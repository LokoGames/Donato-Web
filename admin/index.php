<?php
include "../pages/api/db.php";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">



    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src="../images/dnt.png" alt="Logo" draggable="False">
                <h1>Painel De Controle</h1>
            </a>
            <div class="theme">
                <button class="theme-button" onclick="toggleDark();">
                    <i class="icon bi bi-brightness-high-fill"></i>
                </button>
            </div>
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
                    <td>Nome</td>
                    <td>End</td>
                    <td>Images</td>
                    <td>Desc</td>
                    <td>Preço</td>
                    <td>Options</td>
                </tr>
                <?php
                
                
                function checkId(int $id = 0)
                {
                    $rootPath = "../obras/";
                    $fi = new FilesystemIterator($rootPath, FilesystemIterator::SKIP_DOTS);
                    $count = iterator_count($fi);
                    return (glob($rootPath . $id) == false);
                }
                $obraPath = "../obras/";
                $fi = new FilesystemIterator($obraPath, FilesystemIterator::SKIP_DOTS);
                $count = iterator_count($fi);
                for ($i = 0; $i < ($count); $i++) {

                    if (!checkId($i)) {

                        $files = glob($obraPath . "$i/images/" . "*");
                        $json = json_decode(file_get_contents($obraPath . "$i/info.json"));
                        if ($files != false) {
                            $nome = $json->{"nome"};
                            $end = $json->{"end"};
                            $img = $files[0];
                            $desc = $json->{"desc"};
                            $preco = $json->{"preco"};

                            $imgs = "";
                            foreach ($files as $img) {
                                $imgs .= "<img src='$img'>";
                            }

                            echo "
                        <tr>
                    <td>$nome</td>
                    <td>$end</td>
                    <td>$imgs</td>
                    <td>
                        <textarea readonly>$desc</textarea>
                    </td>
                    <td>$preco</td>
                    <td>
                        <a href='../pages/api/edit.php?id=$i'>Edit</a>
                        <a href='../pages/api/remove.php?id=$i'>Remove</a>
                    </td>
                </tr>";
                        } else {
                            die("Nenhuma Obra encontrada");
                        }
                    }
                }
                ?>
            </table>
        </div>
    </main>
    <script src="../js/dashboard.js"></script>
</body>

</html>