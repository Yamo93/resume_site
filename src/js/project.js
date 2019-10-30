// Variabler
const localProjectURL = 'http://localhost/resume_site/pub/api/project';
let projects = [];
let deletedProjectId = null;
let updatedProjectId = null;

// Eventlyssnare
window.addEventListener('load', fetchProjects);
document.querySelector('.project-form').addEventListener('submit', addProject);
document.querySelector('.project-delete-btn').addEventListener('click', deleteProject);
document.querySelector('.update-project-form').addEventListener('submit', updateProject);

// Funktioner
function fetchProjects() {
    // Rensa tabellen först
    document.querySelector('#projects tbody').innerHTML = '';

    // Göm kortet om det har synts
    document.querySelector('.project-card').style.display = 'none';

    // Hämta kurser via API:et
    fetch(localProjectURL, {
        method: 'get'
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data instanceof Array) {
            // Klonar arrayen
            projects = [...data];

            // Visa tabellen om den är dold sen tidigare
            document.querySelector('#projects table').style.display = 'table';

            projects.forEach(project => {
                document.querySelector('#projects tbody').innerHTML += `
                <tr>
                <th scope="row">${project.title}</th>
                <td><a href="${project.link}" target="_blank">${project.link}</a></td>
                <td>${project.description}</td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" onClick="openProjectUpdateModal(${project.id})">Uppdatera</button>
                    <button type="button" class="btn btn-danger btn-sm" onClick="openProjectDeleteModal(${project.id})">Radera</button>
                </td>
            </tr>`;
            });
        } else {
            document.querySelector('#projects table').style.display = 'none';
            document.querySelector('.project-card').style.display = 'block';
            document.querySelector('.project-card .card-title').textContent = data.message;
            document.querySelector('.project-card .card-text').textContent = 'Lägg till nytt projekt.';
        }
    })
    .catch(err => {
        // Visa felmeddelande
        document.querySelector('#projects table').style.display = 'none';
        document.querySelector('.project-card').style.display = 'block';
        document.querySelector('.project-card .card-title').textContent = err;
        document.querySelector('.project-card .card-text').textContent = 'Något gick fel med inladdningen av projekt.';

    });
}

function addProject(e) {
    e.preventDefault();
    console.log("Adding project...");

    const title = document.querySelector('#projecttitle').value;
    const link = document.querySelector('#projectlink').value;
    const description = document.querySelector('#projectdescription').value;

    if (title.trim().length === 0 || link.trim().length === 0 || description.trim().length === 0) {
        // Visa meddelande
        showProjectMessage('project-alert-danger', 'Fyll i samtliga fält.');

        return;
    }

    let addedProject = {
        title,
        link,
        description
    };

    fetch(localProjectURL, {
        method: 'post',
        body: JSON.stringify(addedProject)
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showProjectMessage(data.class, data.message);

        // Rensa fälten
        clearProjectFields();

        // Ladda om kurserna på nytt
        fetchProjects();
    })
    .catch(err => {
        // Visa felmeddelande
        showProjectMessage('project-alert-danger', err);
    });
}

function deleteProject() {

    fetch(localProjectURL, {
        method: 'delete',
        body: JSON.stringify({ id: deletedProjectId })
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showProjectMessage(data.class, data.message);

        // Rensa fälten
        clearProjectFields();

        // Stäng modalen
        $('#delete-project-modal').modal('hide');

        // Ladda om kurserna på nytt
        fetchProjects();
    })
    .catch(err => {
        // Visa felmeddelande
        showProjectMessage('project-alert-danger', err);
    });
}


function updateProject(e) {
    e.preventDefault();

    const title = document.querySelector('#updateprojecttitle').value;
    const link = document.querySelector('#updateprojectlink').value;
    const description = document.querySelector('#updateprojectdescription').value;

    if (title.trim().length === 0 || link.trim().length === 0 || description.trim().length === 0) {
        // Visa meddelande
        showProjectMessage('update-project-alert-danger', 'Alla fält måste fyllas i.');

        return;
    }

    let project = {
        title,
        link,
        description,
        id: updatedProjectId
    };

    fetch(localProjectURL, {
        method: 'put',
        body: JSON.stringify(project)
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        showProjectMessage(data.class, data.message);

        // Rensa fälten
        clearProjectFields();

        // Stäng modalen
        $('#update-project-modal').modal('hide');

        // Ladda om kurserna på nytt
        fetchProjects();
    })
    .catch(err => {
        // Visa felmeddelande
        showProjectMessage('update-project-alert-danger', err);
    });
}

function clearProjectFields() {
    document.querySelector('#projecttitle').value = '';
    document.querySelector('#projectlink').value = '';
    document.querySelector('#projectdescription').selectedIndex = 0;
}

function openProjectUpdateModal(id) {
    // Open modal
    $('#update-project-modal').modal({
        backdrop: true,
        keyboard: true,
        focus: true,
        show: true
    });

    // Save update ID in global variable
    updatedProjectId = id;

    // Find project
    const foundProject = projects.find(project => project.id == id);

    // Populate
    document.querySelector('#updateprojecttitle').value = foundProject.title;
    document.querySelector('#updateprojectlink').value = foundProject.link;
    document.querySelector('#updateprojectdescription').value = foundProject.description;
}

function openProjectDeleteModal(id) {
    // Open modal
    $('#delete-project-modal').modal({
        backdrop: true,
        keyboard: true,
        focus: true,
        show: true
    });

    // Save delete ID in global variable
    deletedProjectId = id;

    // Find project
    const foundProject = projects.find(project => project.id == id);
    
    // Populate
    document.querySelector('#delete-project-modal .deleted-project-title').innerHTML = `<strong>Titel: </strong>${foundProject.title}`;
    document.querySelector('#delete-project-modal .deleted-project-link').innerHTML = `<strong>Länk: </strong><a href="${foundProject.link}" target="_blank">${foundProject.link}</a>`;
    document.querySelector('#delete-project-modal .deleted-project-description').innerHTML = `<strong>Beskrivning: </strong>${foundProject.description}`;
}

function showProjectMessage(className, message) {
    // Visa meddelande
    document.querySelector('.' + className).style.display = 'block';
    document.querySelector('.' + className).innerHTML = `<button type="button" class="close" data-dismiss="alert">&times;</button>${message}`;
    setTimeout(function() {
        document.querySelector('.' + className).style.display = 'none';
    }, 4000);
}
