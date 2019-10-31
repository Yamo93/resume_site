// Variabler
const localEducationURL = 'http://localhost/resume_admin/pub/api/education';
let education = [];
let deletedEducationId = null;
let updatedEducationId = null;

// Eventlyssnare
document.getElementById('educationongoing').addEventListener('change', changeEducationEndState);
document.getElementById('updateeducationongoing').addEventListener('change', changeUpdatedEducationEndState);
window.addEventListener('load', fetchEducation);
document.querySelector('.education-form').addEventListener('submit', addEducation);
document.querySelector('.education-delete-btn').addEventListener('click', deleteEducation);
document.querySelector('.update-education-form').addEventListener('submit', updateEducation);

// Funktioner
function changeEducationEndState() {
    if (this.checked) {
        document.getElementById('educationendyear').setAttribute('disabled', true);
        document.getElementById('educationendmonth').setAttribute('disabled', true);
    } else {
        document.getElementById('educationendyear').removeAttribute('disabled');
        document.getElementById('educationendmonth').removeAttribute('disabled');
    }
}
function changeUpdatedEducationEndState() {
    if (this.checked) {
        document.getElementById('updateeducationendyear').setAttribute('disabled', true);
        document.getElementById('updateeducationendmonth').setAttribute('disabled', true);
    } else {
        document.getElementById('updateeducationendyear').removeAttribute('disabled');
        document.getElementById('updateeducationendmonth').removeAttribute('disabled');
    }
}


// Funktioner
function fetchEducation() {
    // Rensa tabellen först
    document.querySelector('#education tbody').innerHTML = '';

    // Göm kortet om det har synts förut
    document.querySelector('.education-card').style.display = 'none';

    // Hämta kurser via API:et
    fetch(localEducationURL, {
        method: 'get'
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data instanceof Array) {
            // Klonar arrayen
            education = [...data];

            // Visa tabellen om den är dold sen tidigare
            document.querySelector('#education table').style.display = 'table';

            education.forEach(edu => {
                document.querySelector('#education tbody').innerHTML += `
                <tr>
                    <th scope="row">${edu.name}</th>
                    <td>${edu.school}</td>
                    <td>${edu.startmonth} ${edu.startyear} - ${edu.ongoing == 1 ? 'pågående' : edu.endmonth + ' ' + edu.endyear}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" onClick="openEducationUpdateModal(${edu.id})">Uppdatera</button>
                        <button type="button" class="btn btn-danger btn-sm" onClick="openEducationDeleteModal(${edu.id})">Radera</button>
                    </td>
                </tr>
                `;
            });
        } else {
            document.querySelector('#education table').style.display = 'none';
            document.querySelector('.education-card').style.display = 'block';
            document.querySelector('.education-card .card-title').textContent = data.message;
            document.querySelector('.education-card .card-text').textContent = 'Lägg till ny utbildning.';
        }
    })
    .catch(err => {
        // Visa felmeddelande
        document.querySelector('#education table').style.display = 'none';
        document.querySelector('.education-card').style.display = 'block';
        document.querySelector('.education-card .card-title').textContent = err;
        document.querySelector('.education-card .card-text').textContent = 'Något gick fel med inladdningen av utbildningar.';

    });
}

function addEducation(e) {
    e.preventDefault();
    let addedEducation = {};

    const name = document.querySelector('#educationname').value;
    const school = document.querySelector('#educationschool').value;
    const startyear = document.querySelector('#educationstartyear').value;
    const startmonth = document.querySelector('#educationstartmonth').value;
    const endyear = document.querySelector('#educationendyear').value;
    const endmonth = document.querySelector('#educationendmonth').value;

    if (name.trim().length === 0 || school.trim().length === 0 || startyear.trim().length === 0 || startmonth.trim().length === 0) {
        // Visa meddelande
        showEducationMessage('education-alert-danger', 'Fyll i samtliga fält.');

        return;
    }

    if (document.querySelector('#educationongoing').checked) {
        addedEducation = {
            name,
            school,
            startyear,
            startmonth,
            ongoing: 1,
            endyear: null,
            endmonth: null
        };
    } else {
        addedEducation = {
            name,
            school,
            startyear,
            startmonth,
            ongoing: 0,
            endyear,
            endmonth
        };
    }


    fetch(localEducationURL, {
        method: 'post',
        body: JSON.stringify(addedEducation)
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showEducationMessage(data.class, data.message);

        // Rensa fälten och enabla inputs
        clearEducationFields();
        document.getElementById('educationendyear').removeAttribute('disabled');
        document.getElementById('educationendmonth').removeAttribute('disabled');

        // Ladda om kurserna på nytt
        fetchEducation();
    })
    .catch(err => {
        // Visa felmeddelande
        showEducationMessage('education-alert-danger', err);
    });
}

function deleteEducation() {

    fetch(localEducationURL, {
        method: 'delete',
        body: JSON.stringify({ id: deletedEducationId })
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showEducationMessage(data.class, data.message);

        // Rensa fälten
        clearEducationFields();

        // Stäng modalen
        $('#delete-education-modal').modal('hide');

        // Ladda om kurserna på nytt
        fetchEducation();
    })
    .catch(err => {
        // Visa felmeddelande
        showEducationMessage('education-alert-danger', err);
    });
}


function updateEducation(e) {
    e.preventDefault();

    const name = document.querySelector('#updateeducationname').value;
    const school = document.querySelector('#updateeducationschool').value;
    const startyear = document.querySelector('#updateeducationstartyear').value;
    const startmonth = document.querySelector('#updateeducationstartmonth').value;
    const endyear = document.querySelector('#updateeducationendyear').value;
    const endmonth = document.querySelector('#updateeducationendmonth').value;
    const ongoing = document.querySelector('#updateeducationongoing').checked;

    if (name.trim().length === 0 || school.trim().length === 0 || startyear.trim().length === 0 || startmonth.trim().length === 0) {
        // Visa meddelande
        showEducationMessage('update-education-alert-danger', 'Alla fält måste fyllas i.');

        return;
    }

    if (!ongoing && endyear.trim().length === 0 && endmonth.trim().length === 0 || endyear.trim().length > 0 && endmonth.trim().length === 0 || endmonth.trim().length > 0 && endyear.trim().length === 0) {
        // Visa meddelande
        showEducationMessage('update-education-alert-danger', 'Både slutår och månad måste anges om utbildningen inte är pågående.');
        return;
    }

    let updatedEdu = {};

    if (ongoing) {
        updatedEdu = {
            name,
            school,
            startyear,
            startmonth,
            ongoing: 1,
            endyear: null,
            endmonth: null,
            id: updatedEducationId
        };
    } else {
        updatedEdu = {
            name,
            school,
            startyear,
            startmonth,
            ongoing: 0,
            endyear,
            endmonth,
            id: updatedEducationId
        };
    }

    fetch(localEducationURL, {
        method: 'put',
        body: JSON.stringify(updatedEdu)
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showEducationMessage(data.class, data.message);

        // Rensa fälten
        clearEducationFields();

        // Stäng modalen
        $('#update-education-modal').modal('hide');

        // Ladda om kurserna på nytt
        fetchEducation();
    })
    .catch(err => {
        // Visa felmeddelande
        showEducationMessage('update-education-alert-danger', err);
    });
}

function clearEducationFields() {
    document.querySelector('#educationname').value = '';
    document.querySelector('#educationschool').value = '';
    document.querySelector('#educationstartyear').selectedIndex = 0;
    document.querySelector('#educationstartmonth').selectedIndex = 0;
    document.querySelector('#educationongoing').checked = false;
    document.querySelector('#educationendyear').selectedIndex = 0;
    document.querySelector('#educationendmonth').selectedIndex = 0;
}

function openEducationUpdateModal(id) {
    // Open modal
    $('#update-education-modal').modal({
        backdrop: true,
        keyboard: true,
        focus: true,
        show: true
    });

    // Save update ID in global variable
    updatedEducationId = id;

    // Find education
    const foundEdu = education.find(edu => edu.id == id);

    // Populate
    document.querySelector('#updateeducationname').value = foundEdu.name;
    document.querySelector('#updateeducationschool').value = foundEdu.school;
    document.querySelector('#updateeducationstartyear').value = foundEdu.startyear;
    document.querySelector('#updateeducationstartmonth').value = foundEdu.startmonth;
    document.querySelector('#updateeducationendyear').value = foundEdu.endyear;
    document.querySelector('#updateeducationendmonth').value = foundEdu.endmonth;
    document.querySelector('#updateeducationongoing').checked = foundEdu.ongoing == 1 ? true : false;

    if (foundEdu.ongoing == 1) {
        document.getElementById('updateeducationendyear').setAttribute('disabled', true);
        document.getElementById('updateeducationendmonth').setAttribute('disabled', true);
    } else {
        document.getElementById('updateeducationendyear').removeAttribute('disabled');
        document.getElementById('updateeducationendmonth').removeAttribute('disabled');
    }

}

function openEducationDeleteModal(id) {
    // Open modal
    $('#delete-education-modal').modal({
        backdrop: true,
        keyboard: true,
        focus: true,
        show: true
    });

    // Save delete ID in global variable
    deletedEducationId = id;

    // Find education
    const foundEdu = education.find(edu => edu.id == id);
    
    // Populate
    document.querySelector('#delete-education-modal .deleted-education-name').innerHTML = `<strong>Namn: </strong>${foundEdu.name}`;
    document.querySelector('#delete-education-modal .deleted-education-school').innerHTML = `<strong>Lärosäte: </strong>${foundEdu.school}`;
    document.querySelector('#delete-education-modal .deleted-education-date').innerHTML = `<strong>Tid: </strong>${foundEdu.startmonth} ${foundEdu.startyear} - ${foundEdu.ongoing == 1 ? 'pågående' : foundEdu.endmonth + ' ' + foundEdu.endyear}`;
}

function showEducationMessage(className, message) {
    // Visa meddelande
    document.querySelector('.' + className).style.display = 'block';
    document.querySelector('.' + className).innerHTML = `<button type="button" class="close" data-dismiss="alert">&times;</button>${message}`;
    setTimeout(function() {
        document.querySelector('.' + className).style.display = 'none';
    }, 4000);
}
