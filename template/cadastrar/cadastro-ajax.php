<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../conexao-mysql/conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);




try {
  // $stmt = $pdo->prepare('INSERT INTO minhaTabela (nome) VALUES(:nome)');
  // $stmt->execute(array(
  //   ':nome' => 'Ricardo Arrigoni'
  // ));
  
  $temp = $dados['time'];
  $query = "INSERT INTO player_score (name, time) VALUES (:name, $temp)";
  $cad_servico = $pdo->prepare($query);
  $cad_servico->bindParam(':name', $dados['name'], PDO::PARAM_STR);


  if ($cad_servico->execute()) {
    try {
      $msg_sucesso = "<div class=\"alert alert-success txt-center\" role=\"alert\">Cadastro realizado com sucesso!</div>";
      echo json_encode(array(
        "status" => true,
        "mensagem" => $msg_sucesso
      ));
    } catch (Exception $e) {
      echo json_encode(array(
        "status" => false,
        "mensagem" => $e->getMessage()
      ));
    }
  }
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
