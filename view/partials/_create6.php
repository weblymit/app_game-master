<section class="py-16 ">
  <a href="index.php" class="text-blue-500 text-sm">
    retour
  </a>
  <?php $main_title = "Ajouter un jeu";
  include("_h1.php")
  ?>
  <form action="" method="POST" class="grid place-items-center bg-gray-100 mx-96 py-10 my-16 gap-y-4 rounded-xl" enctype="multipart/form-data">
    <!--input name  -->
    <div class="mb-4">
      <?php $form->input("nom", "name", $error) ?>
    </div>
    <!--input price  -->
    <div class="mb-4">
      <?php $form->inputNumberWithStep("prix", "price", $error) ?>
    </div>
    <!--input note  -->
    <div class="mb-4">
      <?php $form->inputNumberWithStep("note", "note", $error) ?>
    </div>
    <!--input description  -->
    <div class="mb-4 ">
      <?php $form->textarea("description", "description", $error) ?>
    </div>
    <!-- checkbox genre -->
    <?php
    $genreArray = [
      ["name" => "Aventure"],
      ["name" => "Fantasy"],
      ["name" => "RPG"],
      ["name" => "FPS"],
    ]
    ?>
    <div class="mb-4">
      <h2 class="font-semibold text-blue-500 text-center pb-2">Genre</h2>
      <div class="flex space-x-6">
        <?php foreach ($genreArray as $genre) : ?>
          <div class="flex item-center space-x-3">
            <?php $form->checkbox($genre["name"], "genre[]", $genre["name"]) ?>
          </div>
        <?php endforeach ?>
      </div>
      <?php $form->errorMsg($error, "genre") ?>
    </div>
    <!-- checkbox Plateform -->
    <?php
    $plateformArray = [
      ["name" => "Switch", "checked" => "checked"],
      ["name" => "PS3"],
      ["name" => "PS4"],
      ["name" => "Xbox"],
    ]
    ?>
    <div class="mb-4">
      <h2 class="font-semibold text-blue-500 ">Plateform</h2>
      <div class="flex space-x-6">
        <?php foreach ($plateformArray as $plateform) : ?>
          <div class="flex item-center space-x-3">
            <?php $form->checkbox($plateform["name"], "plateforms[]", $plateform["name"]) ?>
          </div>
        <?php endforeach ?>
      </div>
      <?php $form->errorMsg($error, "genre") ?>
    </div>
    <!-- select PEGI -->
    <?php
    $pegiArray = [
      ["name" => 3],
      ["name" => 7],
      ["name" => 12],
      ["name" => 16],
      ["name" => 18],
    ]
    ?>
    <h2 class="font-semibold text-blue-500 ">PEGI</h2>
    <div class="mb-4">
      <?php $form->select("PEGI", $pegiArray) ?>
      <p>
        <?php
        if (!empty($error["PEGI"])) {
          echo $error["PEGI"];
        }
        ?>
      </p>
      <!-- <select name="PEGI" class="select select-bordered w-full max-w-xs">
        <option disabled selected>choisi un PEGI</option>
        <?php foreach ($pegiArray as $pegi) : ?>
          <option value="<?= $pegi["name"] ?>" <?php
                                                //je save en memoire ce que le user a choisi
                                                if (!empty($_POST["PEGI"])) {
                                                  if ($_POST["PEGI"] == $pegi["name"]) echo 'selected= "selected" ';
                                                }
                                                ?>><?= $pegi["name"] ?></option>
        <?php endforeach ?>
      </select> -->
    </div>

    <!-- upload image -->
    <div class="py-3 text-center">
      <?php $form->uploadFIle("url_img", "Votre image", $error) ?>
    </div>

    <!-- submit btn -->
    <div class="py-5">
      <input type="submit" name="submited" value="Ajouter" class="btn btn-active btn-primary">
    </div>
  </form>
</section>