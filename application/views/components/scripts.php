<?=  script("assets/libs/jquery/jquery-3.5.1.min.js")?>
<?=  script("assets/libs/bootstrap/js/bootstrap.min.js")?>
<?=  script("assets/libs/fontawesome/fa.js")?>
<?=  script("assets/scripts/common.js")?>
<?php
  if (isset($this->data['scripts'])) {
      foreach ($this->data['scripts'] as $script) {
          echo script($script);
      }
  }
