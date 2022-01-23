<?php
include "db.php";

if(!(isset($_POST["nome"]) && isset($_POST["end"]) && isset($_POST["desc"]) && isset($_POST["preco"]) && isset($_FILES["file"]))){
    exit(header("Location: ../../index.php"));
}

$files = array_filter($_FILES['file']['name']);
$total_count = count($_FILES['file']['name']);
$rootPath = $_SERVER['DOCUMENT_ROOT'] . "\/obras/";
$fi = new FilesystemIterator($rootPath, FilesystemIterator::SKIP_DOTS);
$remaining = $total_count;
$count = iterator_count($fi) - 1;

$obraPath = $rootPath . ($count + 1) . "/";
$imagePath = $obraPath .  "/";

@mkdir($obraPath);
@mkdir($imagePath);

$jsonToEncode = array(
    'nome' => $_POST["nome"], 
    'end' => $_POST["end"], 
    'desc' => $_POST["desc"], 
    'preco' => intval($_POST["preco"])
);

addObra($jsonToEncode["nome"],$jsonToEncode["end"],$jsonToEncode["desc"],$jsonToEncode["preco"] );

file_put_contents("debug.json", json_encode(($_FILES["file"])), FILE_APPEND);

// echo json_encode(($_FILES["file"]));
for ($i = 1; $i < $total_count; $i++) {
    //The temp file path is obtained
    $tmpFilePath = $_FILES['file']['tmp_name'][$i];
    // echo "$i -> $tmpFilePath";
    //A file path needs to be present
    if ($tmpFilePath != "" && $_FILES["file"]["error"][$i] == 0) {
        //Setup our new file path
        $newFilePath = $imagePath . $_FILES['file']['name'][$i];
        //File is uploaded to temp dir
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            echo "File $i:" . $_FILES['file']['name'][$i] . " Uploaded! \r\n";
            $remaining--;
        }
    }
}
if($remaining == 0){
    echo "\n No more files to upload!";
}
// echo $_SERVER['DOCUMENT_ROOT'];
exit(header("Location: ../../index.php"));
?>
