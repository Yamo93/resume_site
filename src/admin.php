<?php
    include_once('php/config.php');

    $user = new User();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inloggning till adminssidan</title>
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
  <div class="tab-pane fade active show" id="education" role="tabpanel" aria-labelledby="education-tab">
        <h3 class="mt-3 mb-3">Lägg till utbildning</h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="col-form-label" for="educationname">Namn på utbildning</label>
                    <input type="text" class="form-control" placeholder="Utbildning" id="educationname">
                </div>
                <div class="col-md-6">
                    <label class="col-form-label" for="educationschool">Lärosäte</label>
                    <input type="text" class="form-control" placeholder="Lärosäte" id="educationschool">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <label class="col-form-label" for="educationstartyear">Från år</label>
                <select class="custom-select" id="educationstartyear">
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
                <label class="col-form-label" for="educationstartmonth">Månad</label>
                <select class="custom-select" id="educationstartmonth">
                    <option value="jan">januari</option>
                    <option value="feb">februari</option>
                    <option value="mar">mars</option>
                    <option value="apr">april</option>
                    <option value="may">maj</option>
                    <option value="jun">juni</option>
                    <option value="jul">juli</option>
                    <option value="aug">augusti</option>
                    <option value="sep">september</option>
                    <option value="oct">oktober</option>
                    <option value="nov">november</option>
                    <option value="dec">december</option>
                </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="workongoing">
                <label class="custom-control-label" for="workongoing">Pågående</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                <label class="col-form-label" for="educationendyear">Till år</label>
                <select class="custom-select" id="educationendyear">
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
                <label class="col-form-label" for="educationendmonth">Månad</label>
                <select class="custom-select" id="educationendmonth">
                    <option value="jan">januari</option>
                    <option value="feb">februari</option>
                    <option value="mar">mars</option>
                    <option value="apr">april</option>
                    <option value="may">maj</option>
                    <option value="jun">juni</option>
                    <option value="jul">juli</option>
                    <option value="aug">augusti</option>
                    <option value="sep">september</option>
                    <option value="oct">oktober</option>
                    <option value="nov">november</option>
                    <option value="dec">december</option>
                </select>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success">Spara</button>

        <table class="table mt-5 mb-5">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Utbildning</th>
                <th scope="col">Lärosäte</th>
                <th scope="col">Tid</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Webbutveckling</th>
                    <td>Mittuniversitetet</td>
                    <td>augusti 2018 - juni 2020</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                        <button type="button" class="btn btn-danger btn-sm">Radera</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Webbutveckling</th>
                    <td>Mittuniversitetet</td>
                    <td>augusti 2018 - juni 2020</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                        <button type="button" class="btn btn-danger btn-sm">Radera</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Webbutveckling</th>
                    <td>Mittuniversitetet</td>
                    <td>augusti 2018 - juni 2020</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                        <button type="button" class="btn btn-danger btn-sm">Radera</button>
                    </td>
                </tr>

            </tbody>
            </table>
  </div>

  <!-- Work tab -->
  <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="work-tab">
  <h3 class="mt-3 mb-3">Lägg till arbete</h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="col-form-label" for="workname">Arbetsplats</label>
                    <input type="text" class="form-control" placeholder="Arbetsplats" id="workname">
                </div>
                <div class="col-md-6">
                    <label class="col-form-label" for="worktitle">Titel</label>
                    <input type="text" class="form-control" placeholder="Titel" id="worktitle">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <label class="col-form-label" for="workstartyear">Från år</label>
                <select class="custom-select" id="workstartyear">
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
                <label class="col-form-label" for="workstartmonth">Månad</label>
                <select class="custom-select" id="workstartmonth">
                    <option value="jan">januari</option>
                    <option value="feb">februari</option>
                    <option value="mar">mars</option>
                    <option value="apr">april</option>
                    <option value="may">maj</option>
                    <option value="jun">juni</option>
                    <option value="jul">juli</option>
                    <option value="aug">augusti</option>
                    <option value="sep">september</option>
                    <option value="oct">oktober</option>
                    <option value="nov">november</option>
                    <option value="dec">december</option>
                </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="workongoing">
                <label class="custom-control-label" for="workongoing">Pågående</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                <label class="col-form-label" for="workendyear">Till år</label>
                <select class="custom-select" id="workendyear">
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
                <label class="col-form-label" for="workendmonth">Månad</label>
                <select class="custom-select" id="workendmonth">
                    <option value="jan">januari</option>
                    <option value="feb">februari</option>
                    <option value="mar">mars</option>
                    <option value="apr">april</option>
                    <option value="may">maj</option>
                    <option value="jun">juni</option>
                    <option value="jul">juli</option>
                    <option value="aug">augusti</option>
                    <option value="sep">september</option>
                    <option value="oct">oktober</option>
                    <option value="nov">november</option>
                    <option value="dec">december</option>
                </select>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-success">Spara</button>

<table class="table mt-5 mb-5">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Arbetsplats</th>
        <th scope="col">Titel</th>
        <th scope="col">Tid</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">GESHDO Now AB</th>
            <td>Webbutvecklare</td>
            <td>augusti 2019 - pågående</td>
            <td>
                <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                <button type="button" class="btn btn-danger btn-sm">Radera</button>
            </td>
        </tr>
        <tr>
            <th scope="row">Webbutveckling</th>
            <td>Mittuniversitetet</td>
            <td>augusti 2018 - juni 2020</td>
            <td>
                <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                <button type="button" class="btn btn-danger btn-sm">Radera</button>
            </td>
        </tr>
        <tr>
            <th scope="row">Webbutveckling</th>
            <td>Mittuniversitetet</td>
            <td>augusti 2018 - juni 2020</td>
            <td>
                <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                <button type="button" class="btn btn-danger btn-sm">Radera</button>
            </td>
        </tr>

    </tbody>
    </table>
  </div>

  <!-- Projects tab -->
  <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
  <h3 class="mt-3 mb-3">Lägg till projekt</h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="col-form-label" for="projecttitle">Titel</label>
                    <input type="text" class="form-control" placeholder="Titel" id="projecttitle">
                </div>
                <div class="col-md-6">
                    <label class="col-form-label" for="projectlink">Länk</label>
                    <input type="text" class="form-control" placeholder="Länk" id="projectlink">
                </div>
            </div>
            <label class="col-form-label" for="projectdescription">Beskrivning</label>
            <input type="text" class="form-control" placeholder="Beskrivning" id="projectdescription">
        </div>

        <button type="button" class="btn btn-success">Spara</button>

<table class="table mt-5 mb-5">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Titel</th>
        <th scope="col">Länk</th>
        <th scope="col">Beskrivning</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Opinion-bloggportalen</th>
            <td><a href="www.opinion.se" target="_blank">www.opinion.se</a></td>
            <td>En interaktiv bloggportal skapad med PHP och MySQL.</td>
            <td>
                <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                <button type="button" class="btn btn-danger btn-sm">Radera</button>
            </td>
        </tr>
        <tr>
            <th scope="row">Webbutveckling</th>
            <td>Mittuniversitetet</td>
            <td>augusti 2018 - juni 2020</td>
            <td>
                <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                <button type="button" class="btn btn-danger btn-sm">Radera</button>
            </td>
        </tr>
        <tr>
            <th scope="row">Webbutveckling</th>
            <td>Mittuniversitetet</td>
            <td>augusti 2018 - juni 2020</td>
            <td>
                <button type="button" class="btn btn-info btn-sm">Uppdatera</button>
                <button type="button" class="btn btn-danger btn-sm">Radera</button>
            </td>
        </tr>

    </tbody>
    </table>
  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper.min.js" integrity="sha256-3Iu0zFU6cPS92RSC3Pe4DBwjIV/9XKyzYTqKZzly6A8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>