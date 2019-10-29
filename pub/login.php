<?php
    include_once('php/config.php');

    $user = new User();
    if(isset($_SESSION['username'])) {
        header("Location: admin.php");
    }

    if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        if($user->loginUser($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $user->getUserID($_POST['username']);
            header("Location: admin.php");
        } else {
            $message = '<div class="alert alert-danger" role="alert">
            Användarnamnet eller lösenordet är felaktigt. Vänligen försök igen.
          </div>';
        }
    } else if (isset($_POST['submit']) && (empty($_POST['username']) || empty($_POST['password']))) {
        $message = '<div class="alert alert-danger" role="alert">
            Vänligen fyll i båda fälten.
          </div>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inloggning till adminsidan</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
</head>
<body>
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
          <a class="nav-link" href="#">Logga in</a>
        </li>
      </ul>
    </div>
  </nav>

<div class="container w-50 mt-4 mb-4">
<?php if(isset($message)) { echo $message; } ?>
  <form method="POST">
  <fieldset>
    <legend>Logga in till adminsidan</legend>
    <div class="form-group">
      <label for="username">Användarnamn</label>
      <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Ange användarnamn" autocomplete="username">
    </div>
    <div class="form-group">
      <label for="password">Lösenord</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Ange lösenord" autocomplete="current-password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Logga in</button>
  </fieldset>
</form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper.min.js" integrity="sha256-3Iu0zFU6cPS92RSC3Pe4DBwjIV/9XKyzYTqKZzly6A8=" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>