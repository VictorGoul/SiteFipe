<?php 
    $marcaId = $_POST['marca'];
    $modeloId = $_POST['modelo'];
    $anoId = $_POST['ano'];
    include 'dbconnect.php';
    $sql = $pdo->prepare("SELECT * FROM `marca` WHERE id_marca = :marcaId");
    $sql->bindParam(':marcaId', $marcaId, PDO::PARAM_INT);
    $sql->execute();
    $marcaId = $sql->fetchAll(PDO::FETCH_OBJ);
    
    $sql = $pdo->prepare("SELECT * FROM `ano` WHERE id_ano = :anoId");
    $sql->bindParam(':anoId', $anoId, PDO::PARAM_INT);
    $sql->execute();
    $anoId = $sql->fetchAll(PDO::FETCH_OBJ);
    
    $sql = $pdo->prepare("SELECT * FROM `modelo` WHERE id_modelo = :modeloId");
    $sql->bindParam(':modeloId', $modeloId, PDO::PARAM_INT);
    $sql->execute();
    $modeloId = $sql->fetchAll(PDO::FETCH_OBJ);

    $url = "https://parallelum.com.br/fipe/api/v2/cars/brands/" . $marcaId[0]->id_marca . "/" . "models/" . $modeloId[0]->id_modelo .
    "/" . "years/" . $anoId[0]->ano;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $dado_carro = json_decode(curl_exec($ch));

    $url = "https://parallelum.com.br/fipe/api/v2/cars/" . $dado_carro->codeFipe . "/years" . "/" . $anoId[0]->ano . "/history";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $preco = json_decode(curl_exec($ch));
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Teste1</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="assets/css/Hero-Clean-Reverse-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Brand-Dark-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-body py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg></span><span>FIPE</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2"><a href="https://github.com/deividfortuna/fipe" style="color: rgb(122,122,122);font-size: 18px;">API</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><a class="btn btn-primary ms-md-2" role="button" href="#" style="border-style: none;background: rgb(10,73,123);">Registrar</a><a class="btn btn-primary ms-md-2" role="button" href="Login.html" style="border-style: none;background: rgb(10,73,123);">Entrar</a>
            </div>
        </div>
    </nav>
    <section>
        <div style="height: 600px;background: url(&quot;https://barrettjacksoncdn.azureedge.net/staging/carlist/items/Fullsize/Cars/201293/201293_Front_3-4_Web.jpg&quot;) center / cover;"></div>
        <div class="container h-100 position-relative" style="top: -50px;">
            <div class="row gy-5 gy-lg-0 row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body pt-5 p-4">
                            <h4 class="card-title"><?php echo $marcaId[0]->marca;?></h4>
                            <p class="card-text"><?php echo $marcaId[0]->dados_marca?></p>
                        </div>
                        <div class="card-footer p-4 py-3"><a href= <?php echo "https://pt.wikipedia.org/wiki/" . $marcaId[0]->marca;?>>Lear more&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg></a></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body pt-5 p-4">
                            <h4 class="card-title"><?php echo "Informações do modelo"?></h4>
                            <p class="card-text"><?php echo "O modelo " . $modeloId[0]->modelo . " da marca " . $marcaId[0]->marca . "
                             foi criado em " . $dado_carro->modelYear . ". O automóvel utiliza o tipo de combustivel " . $dado_carro->fuel . ". O seu código FIPE é: " . $dado_carro->codeFipe?></p>
                        </div>
                        <div class="card-footer p-4 py-3"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body pt-5 p-4">
                            <h4 class="card-title">Preços</h4>
                            <p class="card-text"><?php echo "O modelo " . $modeloId[0]->modelo . " teve o seu preço variado nos ultimos 3 meses:" . "<br>" . "Em novembro de: " . $preco->priceHistory[0]->price . "<br>" .
                            "Em outubro: " . $preco->priceHistory[1]->price . "<br>" . "Em setembro: " . $preco->priceHistory[2]->price;?></p>
                        </div>
                        <div class="card-footer p-4 py-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center">
        <div class="container text-muted py-4 py-lg-5" style="text-align: center;margin-top: 0px;">
            <ul class="list-inline">
                <li class="list-inline-item me-4" style="padding-right: 0px;margin-right: 24px;"><a class="link-secondary" href="https://github.com/VictorGoul/TrabalhoCrud" style="margin-left: 1px;">GitHub</a></li>
            </ul>
            <p class="mb-0">Copyright © 2023 Brand</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>