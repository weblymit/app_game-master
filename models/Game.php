<?php

require("database.php");

class Game
{
  /**
   * This function return all games in array
   *
   * @return array
   */
  function getAllGames(): array
  {
    $pdo = getPDO();
    $sql = "SELECT * FROM jeux ORDER BY name";
    $query = $pdo->prepare($sql);
    $query->execute();
    $games = $query->fetchAll();

    return $games;
  }

  /**
   * This function return current id of item
   * @return int
   */

  function getId(): int
  {
    if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
      $id = clear_xss($_GET['id']);
    } else {
      $_SESSION["error"] = "URL invalide";
      header("location: index.php");
    }
    return $id;
  }

  /**
   * This function return à single game
   * @return array
   */
  function getGame(): array
  {
    $pdo = getPDO();
    $id = $this->getId();
    $sql = "SELECT * FROM jeux WHERE id=:id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $game = $query->fetch();

    if (!$game) {
      $_SESSION["error"] = "Ce jeu n'est pas disponible.";
      header("location: index.php");
    }

    return $game;
  }
}