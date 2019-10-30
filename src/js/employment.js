// Variabler
const localEmploymentURL = 'http://localhost/resume_site/pub/api/employment';
let employments = [];
let deletedEmploymentId = null;
let updatedEmploymentId = null;

// Eventlyssnare
document.getElementById('employmentongoing').addEventListener('change', changeEmploymentEndState);
document.getElementById('updateemploymentongoing').addEventListener('change', changeUpdatedEmploymentEndState);
window.addEventListener('load', fetchEmployment);
document.querySelector('.employment-form').addEventListener('submit', addEmployment);
document.querySelector('.employment-delete-btn').addEventListener('click', deleteEmployment);
document.querySelector('.update-employment-form').addEventListener('submit', updateEmployment);

// Funktioner
function changeEmploymentEndState() {
    if (this.checked) {
        document.getElementById('employmentendyear').setAttribute('disabled', true);
        document.getElementById('employmentendmonth').setAttribute('disabled', true);
    } else {
        document.getElementById('employmentendyear').removeAttribute('disabled');
        document.getElementById('employmentendmonth').removeAttribute('disabled');
    }
}
function changeUpdatedEmploymentEndState() {
    if (this.checked) {
        document.getElementById('updateemploymentendyear').setAttribute('disabled', true);
        document.getElementById('updateemploymentendmonth').setAttribute('disabled', true);
    } else {
        document.getElementById('updateemploymentendyear').removeAttribute('disabled');
        document.getElementById('updateemploymentendmonth').removeAttribute('disabled');
    }
}


// Funktioner
function fetchEmployment() {
    // Rensa tabellen först
    document.querySelector('#employment tbody').innerHTML = '';

    // Göm kortet om det har synts förut
    document.querySelector('.employment-card').style.display = 'none';

    // Hämta kurser via API:et
    fetch(localEmploymentURL, {
        method: 'get'
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data instanceof Array) {
            // Klonar arrayen
            employments = [...data];

            // Visa tabellen om den är dold sen tidigare
            document.querySelector('#employment table').style.display = 'table';

            employments.forEach(employment => {
                document.querySelector('#employment tbody').innerHTML += `
                <tr>
                    <th scope="row">${employment.title}</th>
                    <td>${employment.place}</td>
                    <td>${employment.startmonth} ${employment.startyear} - ${employment.ongoing == 1 ? 'pågående' : employment.endmonth + ' ' + employment.endyear}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" onClick="openEmploymentUpdateModal(${employment.id})">Uppdatera</button>
                        <button type="button" class="btn btn-danger btn-sm" onClick="openEmploymentDeleteModal(${employment.id})">Radera</button>
                    </td>
                </tr>
                `;
            });
        } else {
            document.querySelector('#employment table').style.display = 'none';
            document.querySelector('.employment-card').style.display = 'block';
            document.querySelector('.employment-card .card-title').textContent = data.message;
            document.querySelector('.employment-card .card-text').textContent = 'Lägg till ny anställning.';
        }
    })
    .catch(err => {
        // Visa felmeddelande
        document.querySelector('#employment table').style.display = 'none';
        document.querySelector('.employment-card').style.display = 'block';
        document.querySelector('.employment-card .card-title').textContent = err;
        document.querySelector('.employment-card .card-text').textContent = 'Något gick fel med inladdningen av anställningar.';

    });
}

function addEmployment(e) {
    e.preventDefault();
    let addedEmployment = {};

    const title = document.querySelector('#employmenttitle').value;
    const place = document.querySelector('#employmentplace').value;
    const startyear = document.querySelector('#employmentstartyear').value;
    const startmonth = document.querySelector('#employmentstartmonth').value;
    const endyear = document.querySelector('#employmentendyear').value;
    const endmonth = document.querySelector('#employmentendmonth').value;

    if (title.trim().length === 0 || place.trim().length === 0 || startyear.trim().length === 0 || startmonth.trim().length === 0) {
        // Visa meddelande
        showEmploymentMessage('employment-alert-danger', 'Fyll i samtliga fält.');

        return;
    }

    if (document.querySelector('#employmentongoing').checked) {
        addedEmployment = {
            title,
            place,
            startyear,
            startmonth,
            ongoing: 1,
            endyear: null,
            endmonth: null
        };
    } else {
        addedEmployment = {
            title,
            place,
            startyear,
            startmonth,
            ongoing: 0,
            endyear,
            endmonth
        };
    }


    fetch(localEmploymentURL, {
        method: 'post',
        body: JSON.stringify(addedEmployment)
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showEmploymentMessage(data.class, data.message);

        // Rensa fälten
        clearEmploymentFields();

        // Ladda om kurserna på nytt
        fetchEmployment();
    })
    .catch(err => {
        // Visa felmeddelande
        showEmploymentMessage('employment-alert-danger', err);
    });
}

function deleteEmployment() {

    fetch(localEmploymentURL, {
        method: 'delete',
        body: JSON.stringify({ id: deletedEmploymentId })
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showEmploymentMessage(data.class, data.message);

        // Rensa fälten
        clearEmploymentFields();

        // Stäng modalen
        $('#delete-employment-modal').modal('hide');

        // Ladda om kurserna på nytt
        fetchEmployment();
    })
    .catch(err => {
        // Visa felmeddelande
        showEmploymentMessage('employment-alert-danger', err);
    });
}


function updateEmployment(e) {
    e.preventDefault();

    const title = document.querySelector('#updateemploymenttitle').value;
    const place = document.querySelector('#updateemploymentplace').value;
    const startyear = document.querySelector('#updateemploymentstartyear').value;
    const startmonth = document.querySelector('#updateemploymentstartmonth').value;
    const endyear = document.querySelector('#updateemploymentendyear').value;
    const endmonth = document.querySelector('#updateemploymentendmonth').value;
    const ongoing = document.querySelector('#updateemploymentongoing').checked;

    if (title.trim().length === 0 || place.trim().length === 0 || startyear.trim().length === 0 || startmonth.trim().length === 0) {
        // Visa meddelande
        showEmploymentMessage('update-employment-alert-danger', 'Alla fält måste fyllas i.');

        return;
    }

    if (!ongoing && endyear.trim().length === 0 && endmonth.trim().length === 0 || endyear.trim().length > 0 && endmonth.trim().length === 0 || endmonth.trim().length > 0 && endyear.trim().length === 0) {
        // Visa meddelande
        showEmploymentMessage('update-employment-alert-danger', 'Både slutår och månad måste anges om utbildningen inte är pågående.');
        return;
    }

    let employment = {};

    if (ongoing) {
        employment = {
            title,
            place,
            startyear,
            startmonth,
            ongoing: 1,
            endyear: null,
            endmonth: null,
            id: updatedEmploymentId
        };
    } else {
        employment = {
            title,
            place,
            startyear,
            startmonth,
            ongoing: 0,
            endyear,
            endmonth,
            id: updatedEmploymentId
        };
    }

    fetch(localEmploymentURL, {
        method: 'put',
        body: JSON.stringify(employment)
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showEmploymentMessage(data.class, data.message);

        // Rensa fälten
        clearEmploymentFields();

        // Stäng modalen
        $('#update-employment-modal').modal('hide');

        // Ladda om kurserna på nytt
        fetchEmployment();
    })
    .catch(err => {
        // Visa felmeddelande
        showEmploymentMessage('update-employment-alert-danger', err);
    });
}

function clearEmploymentFields() {
    document.querySelector('#employmenttitle').value = '';
    document.querySelector('#employmentplace').value = '';
    document.querySelector('#employmentstartyear').selectedIndex = 0;
    document.querySelector('#employmentstartmonth').selectedIndex = 0;
    document.querySelector('#employmentongoing').checked = false;
    document.querySelector('#employmentendyear').selectedIndex = 0;
    document.querySelector('#employmentendmonth').selectedIndex = 0;
}

function openEmploymentUpdateModal(id) {
    // Open modal
    $('#update-employment-modal').modal({
        backdrop: true,
        keyboard: true,
        focus: true,
        show: true
    });

    // Save update ID in global variable
    updatedEmploymentId = id;

    // Find employment
    const foundEmployment = employments.find(employment => employment.id == id);
    console.log(foundEmployment);

    // Populate
    document.querySelector('#updateemploymenttitle').value = foundEmployment.title;
    document.querySelector('#updateemploymentplace').value = foundEmployment.place;
    document.querySelector('#updateemploymentstartyear').value = foundEmployment.startyear;
    document.querySelector('#updateemploymentstartmonth').value = foundEmployment.startmonth;
    document.querySelector('#updateemploymentendyear').value = foundEmployment.endyear;
    document.querySelector('#updateemploymentendmonth').value = foundEmployment.endmonth;
    document.querySelector('#updateemploymentongoing').checked = foundEmployment.ongoing == 1 ? true : false;

    if (foundEmployment.ongoing == 1) {
        document.getElementById('updateemploymentendyear').setAttribute('disabled', true);
        document.getElementById('updateemploymentendmonth').setAttribute('disabled', true);
    } else {
        document.getElementById('updateemploymentendyear').removeAttribute('disabled');
        document.getElementById('updateemploymentendmonth').removeAttribute('disabled');
    }

}

function openEmploymentDeleteModal(id) {
    // Open modal
    $('#delete-employment-modal').modal({
        backdrop: true,
        keyboard: true,
        focus: true,
        show: true
    });

    // Save delete ID in global variable
    deletedEmploymentId = id;

    // Find employment
    const foundEmployment = employments.find(employment => employment.id == id);
    
    // Populate
    document.querySelector('#delete-employment-modal .deleted-employment-title').innerHTML = `<strong>Titel: </strong>${foundEmployment.title}`;
    document.querySelector('#delete-employment-modal .deleted-employment-place').innerHTML = `<strong>Arbetsplats: </strong>${foundEmployment.place}`;
    document.querySelector('#delete-employment-modal .deleted-employment-date').innerHTML = `<strong>Tid: </strong>${foundEmployment.startmonth} ${foundEmployment.startyear} - ${foundEmployment.ongoing == 1 ? 'pågående' : foundEmployment.endmonth + ' ' + foundEmployment.endyear}`;
}

function showEmploymentMessage(className, message) {
    // Visa meddelande
    document.querySelector('.' + className).style.display = 'block';
    document.querySelector('.' + className).innerHTML = `<button type="button" class="close" data-dismiss="alert">&times;</button>${message}`;
    setTimeout(function() {
        document.querySelector('.' + className).style.display = 'none';
    }, 4000);
}
