<?php

require_once '../conexao-mysql/conexao.php';

try {

  $query = $pdo->prepare('SELECT * FROM rodrigojrdev_memorygamebd.player_score ORDER BY time ASC LIMIT 10');
  $query->execute();

  $result = $query->fetchAll();
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/game.css" />
  <link rel="stylesheet" href="../css/score.css" />

  <title>Memory Game | Score </title>
</head>

<body>
  <main>
    <div class="ranking-game">
      <h2>Top 10 Ranking</h2>
      <table>
        <thead>
          <tr>
            <th>Top</th>
            <th>Usuário</th>
            <th>Tempo</th>
          </tr>
        </thead>
        <?php $i = 0;
        foreach ($result as $key => $value) { ?>
          <?php $i++; ?>
          <tr>
            <th><?php echo $i; ?></th>
            <th><?php echo $value['name'] ?></th>
            <th><?php echo $value['time'] ?></th>
          </tr>
        <?php } ?>
      </table>
    </div>
  </main>
</body>

</html>