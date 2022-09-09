<?php

require("database.php");

abstract class Model
{
  private $pdo;
  protected $table;

  public function __construct()
  {
    $this->pdo = getPDO();
  }
  /**
   * This function return all games in array
   *
   * @return array
   */
  function getAll($order=""): array
  {

    $sql = "SELECT * FROM {$this->table}";

    if ($order) {
      $sql .= " ORDER BY " . $order;
    }

    $query = $this->pdo->prepare($sql);
    $query->execute();
    $items = $query->fetchAll();

    return $items;
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
  function get(): array
  {
    // $pdo = getPDO();
    $id = $this->getId();
    $sql = "SELECT * FROM jeux WHERE id=:id";
    $query = $this->pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $item = $query->fetch();

    if (!$item) {
      $_SESSION["error"] = "Ce jeu n'est pas disponible.";
      header("location: index.php");
    }

    return $item;
  }

  /**
   * This function delete an item
   * @return void
   */

  function delete(): void
  {
    $id = $this->getId();
    $sql = "DELETE FROM jeux WHERE id=?";
    $query = $this->pdo->prepare($sql);
    $query->execute([$id]);
    //redirect
    $_SESSION["success"] = "Le jeu es bien supprimer.";
    header("location:index.php");
  }

  /**
   * This function create a new item
   *
   * @return void
   */
  function create($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img): void
  {
    $sql = "INSERT INTO jeux(name, price, genre, note, plateforms, description, PEGI, created_at, url_img) VALUES(:name, :price, :genre, :note, :plateforms, :description, :PEGI, NOW(), :url_img)";
    $query = $this->pdo->prepare($sql);
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':price', $price, PDO::PARAM_STMT);
    $query->bindValue(':note', $note, PDO::PARAM_STMT);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':genre', implode("|", $genre_clear), PDO::PARAM_STR);
    $query->bindValue(':plateforms', implode("|", $plateforms_clear), PDO::PARAM_STR);
    $query->bindValue(':PEGI', $PEGI, PDO::PARAM_STR);
    $query->bindValue(':url_img', $url_img, PDO::PARAM_STR);
    $query->execute();
    // redirect
    $_SESSION["success"] = "le jeu a bien été ajouté";
    header("Location: index.php");
    die;
  }

  function update($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img): void
  {
    $id = $this->getId();
    $sql = "UPDATE jeux SET name = :name, price = :price, genre = :genre, note = :note, plateforms = :plateforms, description = :description, PEGI = :PEGI, url_img = :url_img, updated_at = NOW() WHERE id= :id";
    $query = $this->pdo->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':price', $price, PDO::PARAM_STMT);
    $query->bindValue(':note', $note, PDO::PARAM_STMT);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':genre', implode("|", $genre_clear), PDO::PARAM_STR);
    $query->bindValue(':plateforms', implode("|", $plateforms_clear), PDO::PARAM_STR);
    $query->bindValue(':PEGI', $PEGI, PDO::PARAM_STR);
    $query->bindValue(':url_img', $url_img, PDO::PARAM_STR);

    $query->execute();

    $_SESSION["success"] = "le jeu a bien été modifié";
    header("Location: index.php");
    die;
  }
}
