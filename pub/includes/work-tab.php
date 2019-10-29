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