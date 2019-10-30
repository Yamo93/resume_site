<?php
    include_once('php/config.php');

    if(!isset($_SESSION['username'])) {
        header('Location: login.php');
    }

    $user = new User();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adminsidan</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
</head>
<body>
    <!-- Education update modal -->
    <?php include('includes/education-update-modal.php'); ?>

    <!-- Education delete modal -->
    <?php include('includes/education-delete-modal.php'); ?>

    <!-- Employment update modal -->
    <?php include('includes/employment-update-modal.php'); ?>

    <!-- Employment delete modal -->
    <?php include('includes/employment-delete-modal.php'); ?>

    <!-- Project update modal -->
    <?php include('includes/project-update-modal.php'); ?>

    <!-- Project delete modal -->
    <?php include('includes/project-delete-modal.php'); ?>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html" target="_blank">Besök sidan <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <?php if(isset($_SESSION['username'])) { ?>
          <a class="nav-link" href="logout.php">Logga ut</a>
        <?php } else { ?>
          <a class="nav-link" href="#">Logga in</a>
        <?php } ?>
        </li>
      </ul>
    </div>
  </nav>

<div class="container mt-4 mb-4">
    <h1 class="mb-4">Välkommen, <?= $_SESSION['username']; ?>!</h1>

    <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#education" id="education-tab" role="tab" aria-controls="education" aria-selected="true">Utbildning</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#employment" id="employment-tab" role="tab" aria-controls="employment" aria-selected="false">Arbete</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#projects" id="projects-tab" role="tab" aria-controls="projects" aria-selected="false">Projekt</a>
  </li>
</ul>
<div id="myTabContent" class="tab-content">

<!-- Education Tab -->
<?php include('includes/education-tab.php'); ?>

<!-- Employment tab -->
<?php include('includes/employment-tab.php'); ?>

<!-- Projects tab -->
<?php include('includes/project-tab.php'); ?>
  
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>