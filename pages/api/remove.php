<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $rootPath = "../../obras/";

    if(checkId($id)){
        deleteDirectory($rootPath . $id);
        exit(header("Location: ../../admin/"));
    }else{
        exit(header("Location: ../../admin/"));
    }
}
function checkId(int $id = 0)
{
    $rootPath = "../../obras/";
    $fi = new FilesystemIterator($rootPath, FilesystemIterator::SKIP_DOTS);
    $count = iterator_count($fi);
    return (glob($rootPath . $id) != false);
}

function deleteDirectory($dir) {
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
