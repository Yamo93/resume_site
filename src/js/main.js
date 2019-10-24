// Variabler
const localURL = 'http://localhost/courses_api/api.php';
const publicURL = 'http://studenter.miun.se/~yage1800/dt173g/course_api/api.php';

let courses = [];

// Eventlyssnare
window.addEventListener('load', fetchCourses);
document.querySelector('.form').addEventListener('submit', addCourse);
document.querySelector('.update-form').addEventListener('submit', updateCourse);

document.querySelector('.backdrop').addEventListener('click', closeUpdateModal);
document.querySelector('.close').addEventListener('click', closeUpdateModal);

function addCourse(e) {
    e.preventDefault();

    const code = document.querySelector('#code').value;
    const name = document.querySelector('#name').value;
    const progression = document.querySelector('#progression').value;
    const syllabus = document.querySelector('#syllabus').value;

    if (code.trim().length === 0 || name.trim().length === 0 || progression.trim().length === 0 || syllabus.trim().length === 0) {
        // Visa meddelande
        document.querySelector('.message').classList.add('error-message');
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').textContent = 'Alla fälten måste fyllas i.';

        document.querySelector('.message').classList.add('show');

        return;
    }

    const course = {
        code,
        name,
        progression,
        syllabus
    };

    fetch(publicURL, {
        method: 'post',
        body: JSON.stringify(course)
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        document.querySelector('.message').classList.remove('error-message');
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').classList.add(data.class);
        document.querySelector('.message').textContent = data.message;

        document.querySelector('.message').classList.add('show');

        // Ta bort den efter 4 sek
        setTimeout(() => {
            document.querySelector('.message').classList.remove('show');
        }, 4000);

        // Rensa fälten
        clearFields();

        // Ladda om kurserna på nytt
        fetchCourses();
    })
    .catch(err => {
        // Visa felmeddelande
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').classList.add('error-message');
        document.querySelector('.message').textContent = err;

        document.querySelector('.message').classList.add('show');

        // Ta bort den efter 4 sek
        setTimeout(() => {
            document.querySelector('.message').classList.remove('show');
        }, 4000);
    });
}

// Funktioner
function fetchCourses() {
    // Rensa tabellen först
    document.querySelector('tbody').innerHTML = '';

    // Hämta kurser via API:et
    fetch(publicURL, {
        method: 'get'
    })
    .then(res => res.json())
    .then(data => {
        if (data instanceof Array) {
            // Klonar arrayen
            courses = [...data];

            // Visa tabellen om den är dold sen tidigare
            document.querySelector('table').style.display = 'table';

            courses.forEach(course => {
                document.querySelector('tbody').innerHTML += `
                <td>${course.code}</td>
                <td>${course.name}</td>
                <td>${course.progression}</td>
                <td><a href="${course.syllabus}" target="_blank">Länk</a></td>
                <td>
                <i class="fas fa-edit edit-icon" onClick="openUpdateModal(${course.id})"></i>
                <i class="fas fa-trash-alt delete-icon" onClick="deleteCourse(${course.id})"></i>
                </td>
                `;
    
            });
        } else {
            document.querySelector('table').style.display = 'none';
            document.querySelector('.output').textContent = data.message;
        }
    })
    .catch(err => {
        // Visa felmeddelande
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').classList.add('error-message');
        document.querySelector('.message').textContent = err;

        document.querySelector('.message').classList.add('show');

        // Ta bort den efter 4 sek
        setTimeout(() => {
            document.querySelector('.message').classList.remove('show');
        }, 4000);

    });
}

function updateCourse(e) {
    e.preventDefault();

    const code = document.querySelector('#update-code').value;
    const name = document.querySelector('#update-name').value;
    const progression = document.querySelector('#update-progression').value;
    const syllabus = document.querySelector('#update-syllabus').value;
    const updateId = document.querySelector('#update-btn').dataset.id;

    if (code.trim().length === 0 || name.trim().length === 0 || progression.trim().length === 0 || syllabus.trim().length === 0) {
        // Visa meddelande
        document.querySelector('.message').classList.add('error-message');
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').textContent = 'Alla fälten måste fyllas i.';

        document.querySelector('.message').classList.add('show');

        return;
    }

    const course = {
        code,
        name,
        progression,
        syllabus,
        id: updateId
    };

    fetch(publicURL, {
        method: 'put',
        body: JSON.stringify(course)
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        document.querySelector('.message').classList.remove('error-message');
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').classList.add(data.class);
        document.querySelector('.message').textContent = data.message;

        document.querySelector('.message').classList.add('show');

        // Ta bort den efter 4 sek
        setTimeout(() => {
            document.querySelector('.message').classList.remove('show');
        }, 4000);

        // Rensa fälten
        clearFields();

        // Stäng modalen
        closeUpdateModal();

        // Ladda om kurserna på nytt
        fetchCourses();
    })
    .catch(err => {
        // Visa felmeddelande
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').classList.add('error-message');
        document.querySelector('.message').textContent = err;

        document.querySelector('.message').classList.add('show');

        // Ta bort den efter 4 sek
        setTimeout(() => {
            document.querySelector('.message').classList.remove('show');
        }, 4000);
    });
}

function deleteCourse(id) {
    fetch(publicURL, {
        method: 'delete',
        body: JSON.stringify({ id })
    })
    .then(res => res.json())
    .then(data => {
        // Visa meddelande
        document.querySelector('.message').classList.remove('error-message');
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').classList.add(data.class);
        document.querySelector('.message').textContent = data.message;

        document.querySelector('.message').classList.add('show');

        // Ta bort den efter 4 sek
        setTimeout(() => {
            document.querySelector('.message').classList.remove('show');
        }, 4000);

        // Rensa fälten
        clearFields();

        // Stäng modalen
        closeUpdateModal();

        // Ladda om kurserna på nytt
        fetchCourses();
    })
    .catch(err => {
        // Visa felmeddelande
        document.querySelector('.message').classList.remove('success-message');
        document.querySelector('.message').classList.add('error-message');
        document.querySelector('.message').textContent = err;

        document.querySelector('.message').classList.add('show');

        // Ta bort den efter 4 sek
        setTimeout(() => {
            document.querySelector('.message').classList.remove('show');
        }, 4000);
    });
}

function clearFields() {
    document.querySelector('#code').value = '';
    document.querySelector('#name').value = '';
    // document.querySelector('#progression').value = '';
    document.querySelector('#syllabus').value = '';

    document.querySelector('#update-code').value = '';
    document.querySelector('#update-name').value = '';
    document.querySelector('#update-progression').value = '';
    document.querySelector('#update-syllabus').value = '';
}

function openUpdateModal(id) {
    // Visa modalen
    document.querySelector('.backdrop').style.display = 'block';
    document.querySelector('.modal').style.transform = 'translate(-50%, -50%)';

    // Hitta kursen
    const foundCourse = courses.find(course => course.id == id);

    // Spara id:et i update-knappen
    document.querySelector('#update-btn').dataset.id = id;

    // Populera fälten
    document.querySelector('#update-code').value = foundCourse.code;
    document.querySelector('#update-name').value = foundCourse.name;
    document.querySelector('#update-progression').value = foundCourse.progression;
    document.querySelector('#update-syllabus').value = foundCourse.syllabus;
}

function closeUpdateModal() {
        // Göm modalen
        document.querySelector('.backdrop').style.display = 'none';
        document.querySelector('.modal').style.transform = 'translate(-50%, -150vh)';
}