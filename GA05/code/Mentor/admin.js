
function assignMentor() {
    const studentId = document.getElementById("student-list").value;
    const teacherId = document.getElementById("teacher-list").value;

    // Send an AJAX request to update the database
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "assign_mentor.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            alert(response);
            if (response === "Assignment successful!") {
                // Update the list on the page or perform any other desired actions.
                const mentorMenteeList = document.getElementById("mentor-mentee-list");
                const listItem = document.createElement("li");
                listItem.textContent = `Mentor: ${teacherId} - Mentee: ${studentId}`;
                mentorMenteeList.appendChild(listItem);
            }
        }
    };

    const data = "student_id=" + studentId + "&teacher_id=" + teacherId;
    xhr.send(data);
}

if ('WebSocket' in window) {
    (function () {
        function refreshCSS() {
            var sheets = [].slice.call(document.getElementsByTagName("link"));
            var head = document.getElementsByTagName("head")[0];
            for (var i = 0; i < sheets.length; ++i) {
                var elem = sheets[i];
                var parent = elem.parentElement || head;
                parent.removeChild(elem);
                var rel = elem.rel;
                if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                    var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                    elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                }
                parent.appendChild(elem);
            }
        }
        var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
        var address = protocol + window.location.host + window.location.pathname + '/ws';
        var socket = new WebSocket(address);
        socket.onmessage = function (msg) {
            if (msg.data == 'reload') window.location.reload();
            else if (msg.data == 'refreshcss') refreshCSS();
        };
        if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
            console.log('Live reload enabled.');
            sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
        }
    })();
}
else {
    console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
}


document.getElementById("sign-out-btn").addEventListener("click", function () {

window.location.href = "sign-in.php"; // Replace "sign-in.php" with your sign-in page URL.
});

function assignMentor() {
const studentId = document.getElementById("student-list").value;
const teacherId = document.getElementById("teacher-list").value;

// Send an AJAX request to update the database
const xhr = new XMLHttpRequest();
xhr.open("POST", "assign_mentor.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const response = xhr.responseText;
        alert(response);
        if (response === "Assignment successful!") {
            // Update the list on the page or perform any other desired actions.
            const mentorMenteeList = document.getElementById("mentor-mentee-list");
            const listItem = document.createElement("li");
            listItem.textContent = `Mentor: ${teacherId} - Mentee: ${studentId}`;
            mentorMenteeList.appendChild(listItem);
        }
    }
};

const data = "student_id=" + studentId + "&teacher_id=" + teacherId;
xhr.send(data);
}

function addNewStudent() {
const studentName = document.getElementById("student-name").value;

// Send an AJAX request to add a new student to the database
const xhr = new XMLHttpRequest();
xhr.open("POST", "add_student.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const response = xhr.responseText;
        alert(response);
        if (response === "Student added successfully!") {
            // You can update the student list here if needed.
        }
    }
};

const data = "student-name=" + studentName;
xhr.send(data);
}

function addNewTeacher() {
const teacherName = document.getElementById("teacher-name").value;

// Send an AJAX request to add a new teacher to the database
const xhr = new XMLHttpRequest();
xhr.open("POST", "add_teacher.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const response = xhr.responseText;
        alert(response);
        if (response === "Teacher added successfully!") {
            // You can update the teacher list here if needed.
        }
    }
};

const data = "teacher-name=" + teacherName;
xhr.send(data);
}


