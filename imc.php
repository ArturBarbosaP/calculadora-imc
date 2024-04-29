<?php
header("Content-type: text/html; charset=utf8");

    //variaveis
    $peso = 0;
    $altura = 0;
    $imc = 0;
    $nome = "";
    $msg = "";
    $img = "";

    //calculo
    if (isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["peso"])&& !empty($_POST["peso"])&& isset($_POST["altura"])&& !empty($_POST["altura"])){
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];
        $nome = $_POST["nome"];

        $imc = $peso / pow($altura, 2);

        if ($imc < 16){
            $msg = "<label style='color: dimgrey'>Peso Deficitário</label>";
            $img = "<img src='pesoD.PNG'>";
        }
        elseif ($imc >= 16 && $imc < 18.5){
            $msg = "<label style='color: deepskyblue'>Abaixo do Peso</label>";
            $img = "<img src='abaixoP.PNG'>";
        }
        elseif ($imc >= 18.5 && $imc < 24){
            $msg = "<label style='color: green'>Normal</label>";
            $img = "<img src='normal.PNG'>";
        }
        elseif ($imc >= 25 && $imc <30 ){
            $msg = "<label style='color: darkolivegreen'>Acima do Peso</label>";
            $img = "<img src='acimaP.PNG'>";
        }
        elseif ($imc >= 30 && $imc < 35){
            $msg = "<label style='color: orange'>Obesidade Nível 1</label>";
            $img = "<img src='ob1.PNG'>";
        }
        elseif ($imc >= 35 && $imc < 40){
            $msg = "<label style='color: coral'>Obesidade Nível 2</label>";
            $img = "<img src='ob2.PNG'>";
        }
        elseif ($imc >= 40) {
            $msg = "<label style='color: red'>Obesidade Nível 3</label>";
            $img = "<img src='ob3.PNG'>";
        }
    }
    else {
        header("location:index.html");
    }

    //saida
    echo "<h1>Calculadora IMC</h1>";
    echo "<b>Nome:</b> {$nome} <br>";
    echo "<b>Peso:</b> {$peso} Kg <br>";
    echo "<b>Altura:</b> {$altura} M <br>";
    echo "<b>IMC: </b>".number_format($imc, 2);
    echo "<h2><b>{$msg}</b></h2>";
    echo "{$img} <br><br>";
    echo "<a href='index.html'> Voltar </a>";

?>
