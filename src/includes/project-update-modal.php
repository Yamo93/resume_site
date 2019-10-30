<div class="modal fade" id="update-project-modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Uppdatera projekt</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" class="update-project-form">
        <div class="modal-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="col-form-label" for="updateprojecttitle">Titel</label>
                    <input type="text" class="form-control" placeholder="Titel" id="updateprojecttitle">
                </div>
                <div class="col-md-6">
                    <label class="col-form-label" for="updateprojectlink">Länk</label>
                    <input type="text" class="form-control" placeholder="Länk" id="updateprojectlink">
                </div>
            </div>
            <label class="col-form-label" for="updateprojectdescription">Beskrivning</label>
            <input type="text" class="form-control" placeholder="Beskrivning" id="updateprojectdescription">
        </div>

            <div class="update-project-alert-danger alert alert-dismissible alert-danger mt-3" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>And try submitting again.
            </div>
            <div class="update-project-alert-success alert alert-dismissible alert-success mt-3" style="display: none;">
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