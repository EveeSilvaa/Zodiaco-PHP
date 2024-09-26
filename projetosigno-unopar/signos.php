<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Horóscopo - Seu Signo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container shadow rounded-3 my-5">
        <div class="row row-cols-1 py-3">
            <div class="col text-center">
                <?php
                $nome = $_POST['nomePess'];
                $data = $_POST['dataNasc'];
                $date = new DateTime($data);
                $dateSig = $date->format('m-d');
                // Transformando arquivo XML em Objeto
                $xml = simplexml_load_file('signos.xml');

                // Exibe as informações do XML
                echo '<h4 class="text-center fw-bold mt-5">' . $xml->titulo . '</h4>';
                echo '<p class="text-center fw-bold"> Horoscopo dia ' . $hoje = date('d/m/Y') . ' para nascidos no mês ' . $mes = date('m') . '.</p>';
                echo '<h1 class="fw-bold">' . $nome .' seu signo é ';
                foreach ($xml->signo as $registro) :
                    if ($dateSig >= $registro->data_signo_ini and $dateSig <= $registro->data_signo_fim) {
                        echo $registro->nome_signo . '</h1>';
                        echo '<p class="my-3">' . $registro->horoscopo . '<p>';
                    }
                endforeach;
                ?>
            </div>
            <div class="col">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a class="btn btn-primary" href="./index.php">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>