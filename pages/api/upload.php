<?php
header("Location: ../../index.php");
echo "Uploading... \n";
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

$encoded = json_encode($jsonToEncode);
file_put_contents($obraPath .  "info.json" ,$encoded, FILE_APPEND);

for ($i = 0; $i < $total_count; $i++) {
    //The temp file path is obtained
    $tmpFilePath = $_FILES['file']['tmp_name'][$i];
    echo $tmpFilePath;
    //A file path needs to be present
    if ($tmpFilePath != "") {
        //Setup our new file path
        $newFilePath = $imagePath . $_FILES['file']['name'][$i];
        //File is uploaded to temp dir
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            echo "File uploaded";
        }
    }
}

?>
