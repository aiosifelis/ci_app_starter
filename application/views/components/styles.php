<?= style("assets/libs/bootstrap/css/bootstrap.min.css") ?>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700&amp;subset=greek" rel="stylesheet"
    type="text/css" />
<?= style("assets/styles/variables.css") ?>
<?= style("assets/styles/override.css") ?>
<?= style("assets/styles/common.css") ?>
<?php
  if (isset($this->data['styles'])) {
      foreach ($this->data['styles'] as $style) {
          echo style($style);
      }
  }
