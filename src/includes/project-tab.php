<div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
  <h3 class="mt-3 mb-3">Lägg till projekt</h3>
        <form method="POST" class="project-form">
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

        <button type="submit" class="btn btn-success">Spara</button>
        <div class="project-alert-danger alert alert-dismissible alert-danger mt-3" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>And try submitting again.
        </div>
        <div class="project-alert-success alert alert-dismissible alert-success mt-3" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully read.
        </div>
        </form>


        <div class="project-card card border-primary mb-3 mt-5" style="max-width: 20rem; display: none;">
            <div class="card-header">Meddelande</div>
            <div class="card-body">
            <h4 class="card-title">Primary card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>

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