<?php

namespace Controllers;

require_once("models/Game.php");

class Game
{
  public function index()
  {
    $model = new \Models\Game();
    $games = $model->getAll(); 
    /**
     * Show view
     */
    require("view/homePage.php");
  }

  public function show()
  {
    $model = new \Models\Game();
    $game = $model->get();
    $title = $game['name']; // title of current page
    require("view/showPage.php");
  }

  public function create()
  {
    $title = "Add Game"; //title for current page
    $model = new \Models\Game();

    $error = [];
    $errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";

    if (!empty($_POST["submited"])) {
      require_once("utils/secure-form/include.php");
      if (count($error) == 0) {
        $model->create($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img);
      }
    }
    require("view/createPage.php");
  }

  public function update()
  {
    $model = new \Models\Game();
    $game = $model->get();
    $title = $game['name'];

    $error = [];
    $errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";

    if (!empty($_POST["submited"])) {
      require_once("utils/secure-form/include.php");
      if (count($error) == 0) {
        $model->update($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img);
      }
    }

    require("view/updatePage.php");
  }

  public function delete()
  {
    $model = new \Models\Game;

    $model->delete();
  }

}