<?php
    session_start();
    include 'dbconnect.php';
    $flag = 1;
    if(!isset($_SESSION['user_id'])){
        $flag = 0;
    }
    $sql = $pdo->prepare("SELECT * FROM `marca` ORDER BY `marca`.`marca` ASC");
    $sql->execute();
    $marcas = $sql->fetchAll(PDO::FETCH_OBJ);
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
        <div class="container"><a class="navbar-brand d-flex align-items-center"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg></span><span>FIPE</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2"><a href="https://github.com/deividfortuna/fipe" style="color: rgb(122,122,122);font-size: 18px; text-decoration: none;">API</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <?php if ($flag == 0): ?>
                    <a class="btn btn-primary ms-md-2" role="button" href="Login.html" style="border-style: none;background: rgb(10,73,123);">Entrar</a>
                    <?php endif; ?>
                <?php if ($flag == 1): ?>
                    <a class="btn btn-primary ms-md-2" role="button" href="logout.php" style="border-style: none;background: rgb(10,73,123);">Sair</a>
                    <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container py-4 py-xl-5" style="margin-bottom: -25px;">
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div style="max-width: 350px;">
                    <h2 class="text-uppercase fw-bold">VOCÊ MERECE MAIS CONFORTO E TRANQUILIDADE PARA A SUA VIDA</h2>
                    <p class="my-3" style="color: rgb(122,122,122);">Escolha o carro dos seus sonhos, sem preocupação e sem mágoas.<br>Aqui encontrará o todas as informações necessárias, FACÍL e RÁPIDO</p><?php if ($flag == 1): ?>
                        <a class="btn btn-primary btn-lg me-2" role="button" href="atualizarfipe.php" style="background: rgb(10,73,123);border-style: none;">Atualizar FIPE</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-xl-5 m-xl-5"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" src="assets/img/40d6769aa57032c76b7d2e36e9d3f2ff%20(2).jpg"></div>
            </div>
        </div>
    </div>
    <div class="container" style="height: 120px;margin-right: 0px;margin-left: 0px;">
        <form action="pagina_veiculo.php" method="post">
            <label class="form-label" style="margin-left: 135px;font-weight: bold;">Marca<br><br></label>
            <select class="marca-select" name="marca">
                <option></option>
                <?php foreach($marcas as $marca):?>
                    <option value="<?php echo $marca->id_marca?>"><?php echo $marca->marca?></option>
                <?php endforeach; ?>
            </select>

            <label class="form-label" style="margin-left: 30px;font-weight: bold;">Modelo<br><br></label>
            <select class="modelo-select" name="modelo">
            </select>

            <label class="form-label" style="margin-left: 30px;font-weight: bold;">Ano<br><br></label>
            <select class="ano-select" name="ano">
            </select>

            <button type="submit" class="btn btn-primary" style="margin-left: 30px;margin-bottom: 20px;background: rgb(10,73,123);">Enviar</button>
        </form>
    </div>

    <footer>
        <footer class="text-center">
            <div class="container text-muted py-4 py-lg-5" style="text-align: center;margin-top: 0px;">
                <ul class="list-inline">
                    <li class="list-inline-item me-4" style="padding-right: 0px;margin-right: 24px;"><a class="link-secondary" href="https://github.com/VictorGoul/TrabalhoCrud" style="margin-left: 1px;">GitHub</a></li>
                </ul>
                <p class="mb-0">Copyright © 2023 Brand</p>
            </div>
        </footer>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.marca-select').change(function(){
                var marcaId = $(this).val();
                $.ajax({
                    url: 'get_modelos.php',
                    method: 'POST',
                    data: {marca_id: marcaId},
                    success: function(data){
                        $('.modelo-select').html(data);
                        $('.ano-select').html('');
                    }
                });
            });

            $('.modelo-select').change(function(){
                var modeloId = $(this).val();
                $.ajax({
                    url: 'get_anos.php',
                    method: 'POST',
                    data: {modelo_id: modeloId},
                    success: function(data){
                        $('.ano-select').html(data);
                    }
                });
            });
        });
    </script>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>