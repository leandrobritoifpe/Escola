<?php
    include("mpdf60/mpdf.php");
    include_once 'conectaBanco.php';
    $con = abrirConexao();
    mysql_set_charset('UTF8', $con);
    
                
    $professor = $_POST['professor'];
    $disciplina = $_POST['disciplina'];
                
    if(isset($_POST["dataInicial"]) && isset($_POS["dataFinal"]) && !isset($_POST["disciplina"]) && !isset($_POST["professor"])){
        header("location");
		
    }
    elseif(isset ($_POST["dataInicial"]) && isset($_POS["dataFinal"])&& isset($_POST["disciplina"]) && !isset($_POST["professor"])){
    
    }
    elseif(isset ($_POST["dataInicial"]) && isset($_POS["dataFinal"])&& !isset($_POST["disciplina"]) && isset($_POST["professor"])){
    
    }
    elseif(isset ($_POST["dataInicial"]) && isset($_POS["dataFinal"])&& isset($_POST["disciplina"]) && isset($_POST["professor"])){
    
    }
    elseif(!isset ($_POST["dataInicial"]) && !isset($_POS["dataFinal"])&& !isset($_POST["disciplina"]) && !isset($_POST["professor"])){
    
    }
?>

