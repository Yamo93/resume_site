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
    <div class="modal fade" id="update-education-modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Uppdatera utbildning</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" class="update-education-form">
        <div class="modal-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-form-label" for="updateeducationname">Namn på utbildning</label>
                        <input type="text" class="form-control" placeholder="Utbildning" id="updateeducationname">
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label" for="updateeducationschool">Lärosäte</label>
                        <input type="text" class="form-control" placeholder="Lärosäte" id="updateeducationschool">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                    <label class="col-form-label" for="updateeducationstartyear">Från år</label>
                    <select class="custom-select" id="updateeducationstartyear">
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label class="col-form-label" for="updateeducationstartmonth">Månad</label>
                    <select class="custom-select" id="updateeducationstartmonth">
                        <option value="januari">januari</option>
                        <option value="februari">februari</option>
                        <option value="mars">mars</option>
                        <option value="april">april</option>
                        <option value="maj">maj</option>
                        <option value="juni">juni</option>
                        <option value="juli">juli</option>
                        <option value="augusti">augusti</option>
                        <option value="september">september</option>
                        <option value="oktober">oktober</option>
                        <option value="november">november</option>
                        <option value="december">december</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="updateeducationongoing">
                    <label class="custom-control-label" for="updateeducationongoing">Pågående</label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class="col-form-label" for="updateeducationendyear">Till år</label>
                    <select class="custom-select" id="updateeducationendyear">
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label class="col-form-label" for="updateeducationendmonth">Månad</label>
                    <select class="custom-select" id="updateeducationendmonth">
                        <option value="januari">januari</option>
                        <option value="februari">februari</option>
                        <option value="mars">mars</option>
                        <option value="april">april</option>
                        <option value="maj">maj</option>
                        <option value="juni">juni</option>
                        <option value="juli">juli</option>
                        <option value="augusti">augusti</option>
                        <option value="september">september</option>
                        <option value="oktober">oktober</option>
                        <option value="november">november</option>
                        <option value="december">december</option>
                    </select>
                    </div>
                </div>
            </div>

            <div class="update-education-alert-danger alert alert-dismissible alert-danger mt-3" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>And try submitting again.
            </div>
            <div class="update-education-alert-success alert alert-dismissible alert-success mt-3" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully read.
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Uppdatera</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Stäng</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    <div class="modal fade" id="delete-education-modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Vill du radera följande utbildning:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="deleted-education-name"><strong>Namn:</strong>Modal body text goes here.</p>
            <p class="deleted-education-school"><strong>Lärosäte:</strong>Modal body text goes here.</p>
            <p class="deleted-education-date"><strong>Tid:</strong>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger education-delete-btn">Radera</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Stäng</button>
        </div>
        </div>
    </div>
    </div>
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
    <a class="nav-link" data-toggle="tab" href="#work" id="work-tab" role="tab" aria-controls="work" aria-selected="false">Arbete</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#projects" id="projects-tab" role="tab" aria-controls="projects" aria-selected="false">Projekt</a>
  </li>
</ul>
<div id="myTabContent" class="tab-content">

<!-- Education Tab -->
<?php include('includes/education-tab.php'); ?>

<!-- Work tab -->
<?php include('includes/work-tab.php'); ?>

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