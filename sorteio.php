<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes Ghibli Sorteados</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
require_once './models/Palpite.php';
//Fiz essa função somente para verificar se existe o filme na lista de filmes sorteados, caso exista ele não sorteia dnv

function FilmeExiste($filme, $filmesSorteados) {
    foreach ($filmesSorteados as $f) {
        if ($f->getTitulo() == $filme->title) {
            return true;
        }
    }
    return false;
}

// Pega todos os filmes de uma API do Studio Ghibli na qual não precisa de autenticação nem nada
$json = file_get_contents("https://ghibliapi.vercel.app/films/");
$filmes = json_decode($json);
$filmesSorteados = [];
$escolhaUsuario= $_GET['quantFilmes'];

//Sorteia n filmes conforme o escolhido pelo usuario

for ($i = 0; $i <= $escolhaUsuario; $i++) {
    do {
        $filme = $filmes[rand(0, count($filmes) - 1)];
    } while (FilmeExiste($filme,$filmesSorteados));

    array_push($filmesSorteados, new Palpite($filme->title,$filme->description,$filme->release_date,$filme->director,$filme->image));
}
?>
<div class="filmesSorteados">
    <h1>Filmes Sorteador</h1>
    <?php foreach ($filmesSorteados as $key => $filme) {
        echo $filme->escreveFilme(($key+1));
    }
    ?>
</div>
</body>
</html>