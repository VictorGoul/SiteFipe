<?php
    include("dbconnect.php");
    $flag = 0;
    $marcainicial = 0;
    $modeloinicial = 0;
    $anoinicial = 0;
    $url = "https://parallelum.com.br/fipe/api/v2/cars/brands";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $marca = json_decode(curl_exec($ch));
    for($c = $marcainicial; $c < (sizeof($marca)); $c++){ //array marcas
        $url = "https://parallelum.com.br/fipe/api/v2/cars/brands/" . $marca[$c]->code . "/models";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $modelo = json_decode(curl_exec($ch));
        if($flag == 1)
            $modeloinicial = 0;
        for($i = $modeloinicial; $i < (sizeof($modelo)); $i++){
            set_time_limit(0);
            $url = "https://parallelum.com.br/fipe/api/v2/cars/brands/" . $marca[$c]->code . "/models" . "/" . $modelo[$i]->code . "/years";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $ano = json_decode(curl_exec($ch));
            $ano = (array) $ano;
            if((sizeof($ano)) == 0){
                echo "Marca: " . $marca[$c]->name . " Codigo: " . $modelo[$i]->code . " Modelo: " . $modelo[$i]->name;
            }else{
                if($flag = 1)
                    $anoinicial = 0;
                for($a = $anoinicial; $a < (sizeof($ano)); $a++){
                    $flag = 1;
                    $url = "https://parallelum.com.br/fipe/api/v2/cars/brands/" . $marca[$c]->code . "/models" . "/" . $modelo[$i]->code . "/years" . "/" . $ano[$a]->code;
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $preco = json_decode(curl_exec($ch));
                    //echo "Marca: " . $marca[$c]->name . " Codigo Marca" . $marca[$c]->code . " Codigo: " . $modelo[$i]->code . " Modelo: " . $modelo[$i]->name . " Ano: " . $ano[$a]->code . " Valor: " . $preco->price . " CodeFipe: " . $preco->codeFipe ."<br>";
                    //$sql = $pdo->prepare("INSERT INTO dados2 VALUES (?, ?, ?, ?, ?, ?, ?, NULL)");
                    //$sql->execute(array($marca[$c]->name, $marca[$c]->code, $modelo[$i]->code, $modelo[$i]->name, $ano[$a]->code, $preco->price, $preco->codeFipe));
                    $url = "https://parallelum.com.br/fipe/api/v2/cars/" . $preco->codeFipe . "/years" . "/" . $ano[$a]->code . "/history";
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $preco = json_decode(curl_exec($ch));
                    if(sizeof($preco->priceHistory) == 1){
                        echo "Marca: " . $marca[$c]->name . " Codigo: " . $modelo[$i]->code . " Modelo: " . $modelo[$i]->name . " Codigo FIPE: " . $preco->codeFipe . " Ano: " . $ano[$a]->code . " Preco Unico: " . $preco->priceHistory[0]->price . "<br>";
                        //$sql = $pdo->prepare("INSERT INTO dados1 VALUES (null, ?, ?, ?, ?, ?, null, null, ?)");
                        //$sql->execute(array($marca[$c]->name, $modelo[$i]->code, $modelo[$i]->name, $ano[$a]->code, $preco->priceHistory[0]->price, $marca[$c]->code));
                    }else{
                        echo "Marca: " . $marca[$c]->name . " Codigo: " . $modelo[$i]->code . " Modelo: " . $modelo[$i]->name . " Codigo FIPE: " . $preco->codeFipe . " Ano: " . $ano[$a]->code . " Historico: " . $preco->priceHistory[0]->price . "   Historico2: " . $preco->priceHistory[1]->price . "   Historico3: " . $preco->priceHistory[2]->price. "<br>";
                        //$sql = $pdo->prepare("INSERT INTO dados1 VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)");
                        //$sql->execute(array($marca[$c]->name, $modelo[$i]->code, $modelo[$i]->name, $ano[$a]->code, $preco->priceHistory[0]->price, $preco->priceHistory[1]->price, $preco->priceHistory[2]->price, $marca[$c]->code));
                    }
                }
            }
        }
    }
    //$sql = $pdo->prepare("INSERT INTO `modelo` (id_modelo, nome_modelo, id_ano) SELECT modelo_codigo, modelo_nome, ano FROM `dados` GROUP BY modelo_nome;");
    //$sql->execute();
?>