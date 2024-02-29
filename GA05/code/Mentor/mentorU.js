function updateTime() {
    const dateTime = new Date();
    const formattedDateTime = dateTime.toLocaleString();
    document.getElementById("date-time").textContent = formattedDateTime;
}

updateTime(); // Initial call
setInterval(updateTime, 1000); // Update every 1 second

        // JavaScript to handle showing login forms when clicked
        const adminLoginSection = document.getElementById("admin");
        const mentorLoginSection = document.getElementById("mentor");
        const menteeLoginSection = document.getElementById("mentee");
        
        const adminLoginForm = document.getElementById("admin-form");
        const mentorLoginForm = document.getElementById("mentor-form");
        const menteeLoginForm = document.getElementById("mentee-form");
        
        adminLoginForm.style.display = "none";
        mentorLoginForm.style.display = "none";
        menteeLoginForm.style.display = "none";
        
        adminLoginSection.addEventListener("click", function () {
            adminLoginForm.style.display = "block";
            mentorLoginForm.style.display = "none";
            menteeLoginForm.style.display = "none";
        });
        
        mentorLoginSection.addEventListener("click", function () {
            adminLoginForm.style.display = "none";
            mentorLoginForm.style.display = "block";
            menteeLoginForm.style.display = "none";
        });
        
        menteeLoginSection.addEventListener("click", function () {
            adminLoginForm.style.display = "none";
            mentorLoginForm.style.display = "none";
            menteeLoginForm.style.display = "block";
        });

        // Sample user credentials (insecure for demonstration purposes)
const adminCredentials = { username: "admin", password: "adminpass" };
const mentorCredentials = { username: "mentor", password: "mentorpass" };
const menteeCredentials = { username: "mentee", password: "menteepass" };

// Login button event listeners
document.getElementById("admin-login-button").addEventListener("click", function() {
    const username = document.getElementById("admin-username").value;
    const password = document.getElementById("admin-password").value;
    if (username === adminCredentials.username && password === adminCredentials.password) {
        // Authentication successful, redirect to admin page 
        window.location.href = "admin.php";
    } else {
        alert("Admin login failed. Please check your credentials.");
    }
});

document.getElementById("mentor-login-button").addEventListener("click", function() {
    const username = document.getElementById("mentor-username").value;
    const password = document.getElementById("mentor-password").value;
    if (username === mentorCredentials.username && password === mentorCredentials.password) {
        // Authentication successful, redirect to mentor page 
        window.location.href = "mentorhome.html";
    } else {
        alert("Mentor login failed. Please check your credentials.");
    }
});

document.getElementById("mentee-login-button").addEventListener("click", function() {
    const username = document.getElementById("mentee-username").value;
    const password = document.getElementById("mentee-password").value;
    if (username === menteeCredentials.username && password === menteeCredentials.password) {
        // Authentication successful, redirect to mentee page 
        window.location.href = "menteehome.html";
    } else {
        alert("Mentee login failed. Please check your credentials.");
    }
});
