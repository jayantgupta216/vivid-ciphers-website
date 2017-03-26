<?php
/* @var $this Klein\ServiceProvider */

// Template specific variables you can use:
// pageTitle
// styles
// scripts
// bodyClass
// mainContent
// If mainContent is not defined, the data captured by the output buffer will be used as mainContent.

require 'layout-logic.php';

//-----------------------------

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?= $this->escape($this->Template->pageTitle); ?> - Vivid Ciphers</title>

  <script src="data:application/octet-stream;base64,dWEgcXVlcnkgcGFyYW0gcmVxdWlyZWQ=" ></script>

  <link rel="stylesheet" href="grid/flexboxgrid.css">
  <link rel="stylesheet" href="css/styles.css">

  <?= $this->Template->styles; ?>
</head>
<body class="<?=$this->Template->bodyClass?>">

<?= $this->partial('../app/partials/header.php'); ?>

<?= $mainContent ?>

<?= $this->partial('../app/partials/footer.php'); ?>


<?= $this->Template->scripts; ?>

</body>
</html>