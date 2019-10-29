<div class="tab-pane fade active show" id="education" role="tabpanel" aria-labelledby="education-tab">
        <h3 class="mt-3 mb-3">Lägg till utbildning</h3>
        <form method="POST" class="education-form">
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
                <input type="checkbox" class="custom-control-input" id="educationongoing">
                <label class="custom-control-label" for="educationongoing">Pågående</label>
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
        <button type="submit" class="btn btn-success">Spara</button>
        <div class="education-alert-danger alert alert-dismissible alert-danger mt-3" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>And try submitting again.
        </div>
        <div class="education-alert-success alert alert-dismissible alert-success mt-3" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>You successfully read.
        </div>
        </form>

        <div class="education-card card border-primary mb-3" style="max-width: 20rem; display: none;">
            <div class="card-header">Meddelande</div>
            <div class="card-body">
            <h4 class="card-title">Primary card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
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