<div class="modal fade" id="update-employment-modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Uppdatera anställning</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" class="update-employment-form">
        <div class="modal-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-form-label" for="updateemploymenttitle">Namn på anställning</label>
                        <input type="text" class="form-control" placeholder="Utbildning" id="updateemploymenttitle">
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label" for="updateemploymentplace">Lärosäte</label>
                        <input type="text" class="form-control" placeholder="Lärosäte" id="updateemploymentplace">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                    <label class="col-form-label" for="updateemploymentstartyear">Från år</label>
                    <select class="custom-select" id="updateemploymentstartyear">
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
                    <label class="col-form-label" for="updateemploymentstartmonth">Månad</label>
                    <select class="custom-select" id="updateemploymentstartmonth">
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
                    <input type="checkbox" class="custom-control-input" id="updateemploymentongoing">
                    <label class="custom-control-label" for="updateemploymentongoing">Pågående</label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class="col-form-label" for="updateemploymentendyear">Till år</label>
                    <select class="custom-select" id="updateemploymentendyear">
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
                    <label class="col-form-label" for="updateemploymentendmonth">Månad</label>
                    <select class="custom-select" id="updateemploymentendmonth">
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

            <div class="update-employment-alert-danger alert alert-dismissible alert-danger mt-3" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>And try submitting again.
            </div>
            <div class="update-employment-alert-success alert alert-dismissible alert-success mt-3" style="display: none;">
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