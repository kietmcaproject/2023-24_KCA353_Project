// const login = document.getElementById('login');
// const img = document.getElementById('img'); // Add this line
// const form = document.getElementById('form'); // Add this line
// const userTypeSelect = document.getElementById('userTypeSelect');
// const userTypeError = document.getElementById('userTypeError');

// login.addEventListener('click', (e) => {
//     e.preventDefault();
    
//     img.classList.add('move');
//     setTimeout(() => {
//         img.classList.add('size');
//     }, 200);
//     setTimeout(() => {
//         form.classList.remove('hide');
//     }, 1000);
//     const selectedUserType = userTypeSelect.querySelector('.user-option.selected');
//     if (!selectedUserType) {
//         // Display an error message or take the appropriate action
//         userTypeError.innerText = 'Please select a user type first.';
//         return;
//     } else {
//         // Clear any existing error message
//         userTypeError.innerText = '';
//     }
// });

// function selectUserType(userType) {
//     // Remove the 'selected' class from all options
//     const userOptions = document.querySelectorAll('.user-option');
//     userOptions.forEach(option => option.classList.remove('selected'));

//     // Add the 'selected' class to the clicked option
//     const selectedOption = document.querySelector(`.user-option[data-value="${userType}"]`);
//     selectedOption.classList.add('selected');

//     var collegeLogo = document.getElementById("collegeLogo");
//     if (userType === "mentee") {
//         collegeLogo.src = "./images/download.jpeg"; // Replace with the path to mentee logo
//     } else if (userType === "mentor") {
//         collegeLogo.src = "./images/teacherlogo.png"; // Replace with the path to mentor logo
//     }
// }

// function updateDateTime() {
//     const now = new Date();
//     const datetimeSpan = document.getElementById('datetime');
//     datetimeSpan.innerText = now.toLocaleString();
// }

// // Update date and time every second
// setInterval(updateDateTime, 1000);
// updateDateTime();