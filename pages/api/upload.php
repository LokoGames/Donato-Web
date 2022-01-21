<?php
include "db.php";
header("Location: ../../index.php");
$files = array_filter($_FILES['file']['name']);
$total_count = count($_FILES['file']['name']);
$rootPath = $_SERVER['DOCUMENT_ROOT'] . "\/obras/";
$fi = new FilesystemIterator($rootPath, FilesystemIterator::SKIP_DOTS);

$count = iterator_count($fi) - 1;

$obraPath = $rootPath . ($count + 1) . "/";
$imagePath = $obraPath .  "images/";

mkdir($obraPath);
mkdir($imagePath);

$jsonToEncode = array(
    'nome' => $_POST["nome"], 
    'end' => $_POST["end"], 
    'desc' => $_POST["desc"], 
    'preco' => "R$" . $_POST["preco"]
);

addObra($jsonToEncode["nome"],$jsonToEncode["enc"],$jsonToEncode["desc"],$jsonToEncode["preco"] );

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
exit;
?>
