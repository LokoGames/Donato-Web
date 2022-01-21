<?php
include "db.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $rootPath = "../../obras/";

    if (checkId($id)) {
        removeObra($id);
        deleteDirectory($rootPath . $id);
        exit(header("Location: ../../admin/"));
    } else {
        exit(header("Location: ../../admin/"));
    }
}

function deleteDirectory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}
?>