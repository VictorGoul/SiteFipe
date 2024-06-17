<?php
include 'dbconnect.php';

if(isset($_POST['marca_id'])){
    $marcaId = $_POST['marca_id'];
    
    $sql = $pdo->prepare("SELECT * FROM modelo WHERE id_marca = :marcaId");
    $sql->bindParam(':marcaId', $marcaId, PDO::PARAM_INT);
    $sql->execute();
    $modelos = $sql->fetchAll(PDO::FETCH_OBJ);
    echo '<option value="">'.'</option>';
    foreach($modelos as $modelo){
        echo '<option value="' . $modelo->id_modelo . '">' . $modelo->modelo . '</option>';
    }
}
?>
