<?php

class Form
{
  private array $error;
  private string $errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";

  // public function __construct($data)
  // {
  //   $this->data = $data;
  // }

  /**
   * Method for show the user value set
   *
   * @param string $nameValue
   * @return void
   */
  private function showValue($nameValue)
  {
    if (!empty($_POST["$nameValue"])) {
      echo $_POST["$nameValue"];
    }
  }

  /**
   * Method for show an error message
   *
   * @param array $error
   * @return void
   */
  public function errorMsg($error, $errorName)
  { ?>
    <p>
      <?php
      if (!empty($error[$errorName])) {
        echo $error[$errorName];
      }
      ?>
    </p>
  <?php
  }

  /**
   * Method for create à new input
   *
   * @param string $label
   * @param string $name
   * @param string $type
   * @param array $error
   * @return void
   */
  public function input($label, $name, $error, $class = "input input-bordered w-full max-w-xs block")
  { ?>
    <label for="<?= $name ?>" class="font-semibold text-blue-500"><?= ucfirst($label) ?></label>
    <input type="text" name='<?= $name ?>' class='<?= $class ?>' value='<?php $this->showValue($name) ?>' />
    <?php $this->errorMsg($error, $name) ?>
  <?php
  }

  /**
   * Method for create à new input with attribue step
   *
   * @param string $label
   * @param string $name
   * @param array $error
   * @return void
   */
  public function inputNumberWithStep($label, $name, $error)
  { ?>
    <label for=" <?= $name ?>" class="font-semibold text-blue-500"><?= ucfirst($label) ?></label>
    <input type='number' name='<?= $name ?>' step="0.01" class='input input-bordered w-full max-w-xs block' value='<?php $this->showValue($name) ?>' />
    <?php $this->errorMsg($error, $name) ?>
  <?php
  }

  /**
   * Method to verify if item is in array
   *
   * @param string $verifyItem
   * @return void
   */
  public function verifyCheck(string $verifyItem)
  {

    if (!empty($_POST["genre"])) {
      $isInArray = in_array($verifyItem, $_POST["genre"]);
      if ($isInArray) echo "checked";
    }
  }

  /**
   * Method for create à new checkbox input
   *
   * @param string $label
   * @param string $name
   * @param string $type
   * @param array $error
   * @return void
   */
  public function checkbox($label, $name, $verifyItem)
  {
  ?>
    <label for="<?= $name ?>"><?= ucfirst($label) ?></label>
    <input type="checkbox" class="checkbox checkbox-primary bg-white" name="<?= $name ?>" value="<?php $this->showValue($name) ?>" <?php $this->verifyCheck($verifyItem); ?> />
  <?php
  }
  /**
   * Method for create à new textarea input
   *
   * @param string $label
   * @param string $name
   * @param string $type
   * @param array $error
   * @return void
   */
  public function textarea(string $label, string $name, array $error): void
  {
  ?>
    <label for="<?= $name ?>" class="font-semibold text-blue-500"><?= ucfirst($label) ?></label>
    <textarea name='<?= $name ?>' step="0.01" class='input input-bordered w-full max-w-xs block'><?php $this->showValue($name) ?></textarea>
    <?php $this->errorMsg($error, $name) ?>
  <?php
  }

  /**
   * Methiod for save in memory what user choose in select
   *
   * @param string $name
   * @return void
   */
  public function saveChooseSelect($name, $item)
  {
    if (!empty($_POST["$name"])) {
      if ($_POST["$name"] == $item["name"]) echo 'selected= "selected" ';
    }
  }

  /**
   * Method to create a new select
   *
   * @param string $name
   * @param array $items
   * @return void
   */
  public function select(string $name, array $items)
  {
  ?>
    <select name="<?= $name ?>" class="select select-bordered w-full max-w-xs">
      <option disabled selected>choisi un <?= $name ?></option>
      <?php foreach ($items as $item) : ?>
        <option value="<?= $item["name"] ?>" <?php $this->saveChooseSelect("$name", $item) ?>>
          <?= $item["name"] ?>
        </option>
      <?php endforeach ?>
    </select>
  <?php
  }

  public function uploadFIle($name, $label, $error)
  {
  ?>
    <div class="">
      <label for="<?= $name ?>" class="text-blue-500 font-semibold "><?= $label ?></label>
      <input type="file" class="block pt-3" id="<?= $name ?>" name="<?= $name ?>">
      <?php $this->errorMsg($error, "url_img") ?>
    </div>
  <?php
  }

  /**
   * Method for submit button
   * 
   * @param string $error
   * @return void
   */
  public function submit($value = "Ajouter")
  {
  ?>
    <input type="submit" name="submited" value="<?= $value ?>" class="btn btn-active btn-primary">
<?php
  }
}
