<?php

class Form
{

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
   * Save value input when error msg
   *
   * @param string $userVAlue
   * @return void
   */
  public function saveUserValue($userVAlue)
  {
    if (!empty($_POST[$userVAlue])) {
      echo $_POST[$userVAlue];
    }
  }

  /**
   * Create a new input field
   *
   * @param string $label
   * @param string $name
   * @return void
   */
  public function inputText($label, $name, $error)
  {
  ?>
    <label for="<?= $name ?>" class="font-semibold text-blue-500"><?= $label ?></label>
    <input type="text" name="<?= $name ?>" class="input input-bordered w-full max-w-xs block" value="<?php $this->saveUserValue($name) ?>" />
    <?php $this->errorMsg($error, $name)  ?>
<?php
  }
}
