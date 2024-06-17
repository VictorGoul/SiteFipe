<?php
include 'dbconnect.php';

if(isset($_POST['modelo_id'])){
    $modeloId = $_POST['modelo_id'];
    $sql = $pdo->prepare("SELECT `modelo`.`id_modelo`, `veiculo`.`id_ano`, `ano`.`ano`
    FROM `modelo` 
        LEFT JOIN `veiculo` ON `veiculo`.`id_modelo` = `modelo`.`id_modelo` 
        LEFT JOIN `ano` ON `veiculo`.`id_ano` = `ano`.`id_ano`
    WHERE `modelo`.`id_modelo` = :modeloId;");
    $sql->bindParam(':modeloId', $modeloId, PDO::PARAM_INT);
    $sql->execute();
    $anos = $sql->fetchAll(PDO::FETCH_OBJ);
    echo '<option value="">'.'</option>';
    foreach($anos as $ano){
        echo '<option value="' . $ano->id_ano . '">' . ($ano->ano == "32000-1" || $ano->ano == "32000-3" ? "0km" : $ano->ano) . '</option>';
    }
}
?>
