<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionário</title>
</head>
<body>
<?php 
    if(isset($_POST['acao'])){
        $respostas = array('20','victor','programação');
        $pontuacao = 0;
        $index = 0;
        foreach ($_POST as $key => $value) {
            if($key != 'acao'){
                if($respostas[$index] == $value){
                    $pontuacao++;
                }
                $index++;
            }
        }
        echo '<h2>O seu resultado final foi: </h2>'.$pontuacao.'/'.($index);
    }
?>
    <form action="" method="post">
        <p>Quantos anos você tem?</p>
        <span>20</span> <input type="radio" name="pergunta1" value="20">
        <br>
        <span>30</span> <input type="radio" name="pergunta1" value="30">
        <br>
        <span>40</span> <input type="radio" name="pergunta1" value="40">
        <hr>

        <p>Qual o seu nome?</p>
        <span>Victor</span> <input type="radio" name="pergunta2" value="victor">
        <br>
        <span>João</span> <input type="radio" name="pergunta2" value="joao">
        <br>
        <span>José</span> <input type="radio" name="pergunta2" value="jose">
        <hr>

        <p>Oque você gosta de fazer?</p>
        <span>Esportes</span> <input type="radio" name="pergunta3" value="esportes">
        <br>
        <span>Programação</span> <input type="radio" name="pergunta3" value="programação">
        <br>
        <span>Assistir</span> <input type="radio" name="pergunta3" value="assistir">
        <hr>
        <input type="submit" name="acao" value="Enviar!">
    </form>
</body>
</html>