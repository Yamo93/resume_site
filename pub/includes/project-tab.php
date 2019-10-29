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