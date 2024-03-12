<!DOCTYPE html>
<html>
<head>
   
    <title>
        <?php echo $name; ?>
    </title>

<?= $this->Html->css("bootstrap.min.css") ?>
<link href="<?= $this->url->css("cake.css") ?>" rel="stylesheet"/> 
<script src="<?php echo $this->url->script("bootstrap.min.js") ?>"></script>

  </head>
<body>

 <?= $this->element("header")?>
<br>
<h1 style="color:white; background-color:darkblue;">Oh Hi! How are you today, Upasana?</h1>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
  <br>
    <?= $this->element("footer")?>

</body>
</html>
