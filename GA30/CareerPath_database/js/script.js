// Get the button:
let mybutton = document.getElementById("myBtn");

// When scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0; 
}

function updateVisitorCount() {
  // Check if local storage is supported
  if (typeof(Storage) !== "undefined") {
      // Get the current count from local storage, default to 0 if not set
      var count = localStorage.getItem("visitorCount") || 0;

      // Increment the count for each visit
      count++;

      // Save the updated count to local storage
      localStorage.setItem("visitorCount", count);

      // Display the count on the page
      document.getElementById("visitorCounter").innerText = "Visitor:- " + count;
  }
}
// Call the function when the page loads
window.onload = updateVisitorCount;



/* for show name */

function passvalues() {
  // It gets the value entered in the HTML element with the id 'userName' and stores it in a variable named fullname
  var fullname = document.getElementById('userName').value;
  var fullmail = document.getElementById('userEmail').value;
  // It uses the localStorage object to store the value of fullname with the key "fullname"
  localStorage.setItem("fullname", fullname);
  localStorage.setItem("fullmail", fullmail);
  return true;
}
// It sets the content of the HTML element with the id 'full' to the value stored in localStorage with the key "fullname"
document.getElementById("full").innerHTML = localStorage.getItem("fullname");
document.getElementById("mail").innerHTML = localStorage.getItem("fullmail");



        
/* result data */

const urlclass = new URLSearchParams(window.location.search);
const urlsubject = new URLSearchParams(window.location.search);
const urlgraduation = new URLSearchParams(window.location.search);
const urlintrest = new URLSearchParams(window.location.search);

const subjectValue = urlsubject.get('subject');
const graduationValue = urlgraduation.get('graduation');
const classValue = urlclass.get('class');
const intrestValue = urlintrest.get('intrest');



/*1*/        if (classValue === 'High School' && intrestValue === 'IT Sector') {
    document.getElementById('courseData').textContent = 'First You need to choose Mathematics Subject In your 12th after that you can visit again on CAREER PATH. ';
    document.getElementById('entranceExamData').textContent = 'No entrance';
    document.getElementById('collegeData').textContent = 'Same college';
/*2*/       } else if (classValue === 'High School' && intrestValue === 'Medical') {
    document.getElementById('courseData').textContent = 'First You need to choose Biology Subject In your 12th after that you can visit again on CAREER Path.';
    document.getElementById('entranceExamData').textContent = 'No entrance';
    document.getElementById('collegeData').textContent = 'Same college';
/*3*/       } else if (classValue === 'Intermediate' && subjectValue === 'Mathematics' && graduationValue === 'Not Applicable' && intrestValue === 'IT Sector') {
    document.getElementById('courseData').textContent = 'BCA\nB.Tech';
    document.getElementById('entranceExamData').textContent = 'JEE Mains\nGate\nCUET\nDirect Private Collage Exam';
    document.getElementById('collegeData').textContent = 'IIT\nNIT\nSome Private';
/*4*/       } else if (classValue === 'Intermediate' && subjectValue === 'Mathematics' && graduationValue === 'BCA' && intrestValue === 'IT Sector') {
    document.getElementById('courseData').textContent = 'MCA';
    document.getElementById('entranceExamData').textContent = 'CUET\nNIMCET\nDirect Private Collage Exam';
    document.getElementById('collegeData').textContent = 'NIT\nIIIT\nSome Private';
/*5*/       } else if (classValue === 'Intermediate' && subjectValue === 'Mathematics' && graduationValue === 'Bsc' && intrestValue === 'IT Sector') {
    document.getElementById('courseData').textContent = 'MCA';
    document.getElementById('entranceExamData').textContent = 'CUET\nNIMCET\nDirect Private Collage Exam';
    document.getElementById('collegeData').textContent = 'NIT\nIIIT\nSome Private';
/*6*/       } else if (classValue === 'Intermediate' && subjectValue === 'Mathematics' && graduationValue === 'BA' && intrestValue === 'IT Sector') {
    document.getElementById('courseData').textContent = 'MCA';
    document.getElementById('entranceExamData').textContent = 'CUET\nNIMCET\nDirect Private Collage Exam';
    document.getElementById('collegeData').textContent = 'NIT\nIIIT\nSome Private';
/*7*/       } else if (classValue === 'Intermediate' && subjectValue === 'Biology' && graduationValue === 'Not Applicable' && intrestValue === 'Medical') {
    document.getElementById('courseData').textContent = 'Bpharma\nMBBS';
    document.getElementById('entranceExamData').textContent = 'NEET\nCUET\nDirect Private Collage Exam';
    document.getElementById('collegeData').textContent = 'AAIMS\nSome Private';
/*8*/       } else if (classValue === 'Intermediate' && subjectValue === 'Biology' && graduationValue === 'B Pharma' && intrestValue === 'Medical') {
    document.getElementById('courseData').textContent = 'MD';
    document.getElementById('entranceExamData').textContent = 'NEET\nCUET\nDirect Private Collage Exam';
    document.getElementById('collegeData').textContent = 'AAIMS\nSome Private';
}



