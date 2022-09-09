<div class="">
  <a href="index.php" class="text-blue-500 text-sm">
    retour
  </a>
  <div class="text-center mb-16">
    <h1 class="text-blue-500 text-5xl  text-uppercase font-black pb-10 pt-16 "><?= $user["pseudo"] ?></h1>
    <div class="">
      <p>Pseudo : <?= $user["pseudo"] ?></p>
      <p>Email : <?= $user["email"] ?>€</p>
    </div>
    <div class="pt-10">
      <a href="update.php?id=<?= $user["id"] ?>&name=<?= $user["pseudo"] ?>" class="btn btn-success text-white">Modifier</a>
      <?php include("_modal.php") ?>
    </div>
  </div>
</div>