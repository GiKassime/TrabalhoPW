<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador de Filmes Ghibli</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    $json = file_get_contents("https://ghibliapi.vercel.app/films/");
    $filmes = json_decode($json);
    $quantidadeFilmesApi = count($filmes) - 1;
    ?>

    <h1>🎥 Sorteio de Filmes Ghibli</h1>
    <p class="limites">Número mínimo: 2 | Número máximo: <?= $quantidadeFilmesApi ?></p>

    <form action="sorteio.php" method="get" id="formSorteio" name="formSorteio">
        <label for="quantFilmes">Quantos filmes deseja sortear?</label>
        <input type="number" name="quantFilmes" id="quantFilmes" placeholder="Digite um número" min="2"
            max="<?= $quantidadeFilmesApi ?>" required>
        <button type="submit">Sortear 🎲</button>
    </form>
</body>

</html>
