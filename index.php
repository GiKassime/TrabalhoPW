<!DOCTYPE html>
<html lang="pt-BR">

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
    function exibeMensagem($tipo, $mensagem)
    {
        echo "<p class='$tipo'>$mensagem</p>";
    }

    // Pega todos os filmes da  API do Studio Ghibli que não precisa de chave nem nada
    $json = file_get_contents("https://ghibliapi.vercel.app/films/");
    if ($json === false) {
        exibeMensagem('erro conteudo', "Não foi possível acessar a API .");
        exit;
    } else {
        $filmes = json_decode($json);
        $filmesSorteados = [];
        $quantidadeFilmesApi = count($filmes);
        $filmeSorteado = null;
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    //vou mostrar os filmes mesmo sem um palpite

    ?>

    <div class="conteudo">
        <h1>Adivinhe o Filme sorteado</h1>
        <p>Lembre-se que ao fazer muitas requisições a API pode bloquer por um tempo!</p>

        <?php
        if (isset($_GET['quantFilmes'])) {
            $quantidadeFilmes = $_GET['quantFilmes'];
            if ($quantidadeFilmes < 2 || $quantidadeFilmes > $quantidadeFilmesApi) {
                exibeMensagem('erro', "Número de filmes inválido! O número deve ser entre 2 e $quantidadeFilmesApi");
            } else {
                //Vou mostrar os filmes disponiveis mesmo sem um palpite
                for ($i = 0; $i < $quantidadeFilmes; $i++) {
                    $filme = $filmes[$i];
                    array_push($filmesSorteados, new Palpite($filme->title, $filme->description, $filme->release_date, $filme->director, $filme->image));
                }
            }
        }
        if (isset($_GET['quantFilmes']) && isset($_GET['palpite'])) {
            $quantidadeFilmes = $_GET['quantFilmes'];
            $palpite = $_GET['palpite'];

            if ($palpite <= 0 || $palpite > $quantidadeFilmes || $quantidadeFilmes < 2 || $quantidadeFilmes > $quantidadeFilmesApi) {
                exibeMensagem('erro', "Palpite inválido! O número deve ser entre 1 e $quantidadeFilmes");
            } else {
                // Sorteia o FILME
                $filmeSorteado = $filmesSorteados[rand(0, count($filmesSorteados) - 1)];
                if ($filmesSorteados[$palpite - 1] == $filmeSorteado) {
                    exibeMensagem('acertou', "Você acertou! O filme sorteado é..." . (array_search($filmeSorteado, $filmesSorteados) + 1) . " - " . $filmeSorteado->getTitulo());
                } else {

                    exibeMensagem('errou', "Você errou! O filme sorteado é..." . (array_search($filmeSorteado, $filmesSorteados) + 1) . " - " . $filmeSorteado->getTitulo());
                }
            }
        } else {
            exibeMensagem('limites',"Número mínimo: 2 | Número máximo: ". $quantidadeFilmesApi);
            exibeMensagem('',"Na URL digite exemplo: <strong>http://localhost/TrabalhoPW/sorteio.php?quantFilmes=2&palpite=1</strong>");
            exibeMensagem('',"Caso queira ver somente os filmes sem dar o seu palpite digite exemplo: <strong>http://localhost/TrabalhoPW/sorteio.php?quantFilmes=2</strong>");
            exibeMensagem('erro', "Você precisa informar quantFilmes e palpite na URL!");

        }
        ?>


    </div>
    <div class="filmesSorteados">
        <?php
        if ($filmeSorteado) {
            $filmePalpite = $filmesSorteados[$_GET['palpite'] - 1];
            if ($filmeSorteado != $filmePalpite) {
                echo $filmePalpite->escreveFilme(array_search($filmePalpite, $filmesSorteados) + 1,  'palpite');
            }
            echo $filmeSorteado->escreveFilme(array_search($filmeSorteado, $filmesSorteados) + 1,  'sorteado');
        } else {
            foreach ($filmesSorteados as $key => $filme) {
                if ($filmeSorteado && $filme->getTitulo() == $filmeSorteado->getTitulo()) {
                    echo $filme->escreveFilme(($key + 1), 'sorteado'); // filme sorteado
                } else {
                    echo $filme->escreveFilme(($key + 1), ''); // demais filmes
                }
            }
        }
        ?>



    </div>
</body>

</html>