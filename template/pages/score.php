<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'rodrigojrdev_memorygamebd');
define('PORT', '3306');


print_r($_POST);

//Criar a conexão com banco de dados usando o PDO e a porta do banco de dados
//Utilizar o Try/Catch para verificar a conexão.


// try {
//   $pdo = new PDO('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME, USER, PASS);
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   $stmt = $pdo->prepare('INSERT INTO rodrigojrdev_memorygamebd.player_score (name_player) VALUES(:nome)');
//   $stmt->execute(array(':nome' => 'Rodrigo'));

//   echo $stmt->rowCount();
// } catch (PDOException $e) {
//   echo 'Error: ' . $e->getMessage();
// }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/game.css" />

  <title>Memory Game | Score </title>
</head>

<body>

</body>

</html>