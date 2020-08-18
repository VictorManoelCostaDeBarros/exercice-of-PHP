<?php 
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=exerciciosPHP','root','');
?>

<h2>Enquetes Ativas: </h2>
<hr>
<?php 
    if(isset($_POST['acao'])){
        if(!isset($_COOKIE['voto'])){
            if(!isset($_POST['resposta_id'])){
                header('Location: index.php');
                die();
            }
            setcookie('voto', 'true', time() + 60 * 60 * 24, '/');

            $resposta_id = $_POST['resposta_id'];

            $countRespostas = $pdo->prepare("SELECT votos FROM enquete WHERE id = ?");
            $countRespostas->execute(array($resposta_id));

            $contagemAtual = $countRespostas->fetch()['votos'] + 1;

            $pdo->exec("UPDATE enquete SET votos = $contagemAtual WHERE id = $resposta_id");

            echo '<h2>Sua votação foi computada com sucesso!</h2>';
        }else{
            echo '<h2>Você já votou!</h2>';
        }
    }

    $sql = $pdo->prepare("SELECT * FROM pergunta_enquete");
    $sql->execute();
    $perguntas_enquete = $sql->fetchAll();
    foreach ($perguntas_enquete as $key => $value) {
        echo '<form method="post">';
        echo '<p><b>'.$value['pergunta'].'</b></p>';
        $sql2 = $pdo->prepare("SELECT * FROM enquete WHERE enquete_id = $value[id]"); 
        $sql2->execute();
        $respostas = $sql2->fetchAll();
        foreach ($respostas as $key2 => $resposta) {
            echo $resposta['respostas'].'<input type="radio" name="resposta_id" value="'.$resposta['id'].'" />';
            echo '<br>';
        }
        echo '<input type="submit" name="acao" value="Enviar!" />';
        echo '</form>';
        echo '<hr>';
    }   
?>