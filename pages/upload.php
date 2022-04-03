<html lang="en">

<?php
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
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donato Construtora - Upload System</title>

    <link rel="stylesheet" href="../css/upload.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <main>
        <form method="POST" action="api/upload.php" class="uploadForm border border-secondary" enctype="multipart/form-data">
            <h1>Upload System</h1>
            <p class="alert-danger">Máximo de 5 arquivos!</p>
            <input class="border border-primary" name="nome" type="text" placeholder="Nome:">
            <input class="border border-primary" name="preco" type="number" placeholder="Preco:">
            <input class="border border-primary" name="end" type="text" placeholder="Endereço:">
            <div class="venda">
                <label for="sold">Vendida: </label>
                <input class="border border-primary" name="sold" type="checkbox" id="sold">
            </div>
            <textarea class="border border-primary" name="desc" placeholder="Descrição:"></textarea>
            <input name="file[]" type="file" multiple="multiple">
            <input type="submit" name="submit" value="Upload" class="btn btn-secondary">
        </form>
    </main>
</body>

</html>