
//   // Import the functions you need from the SDKs you need
//   import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
//   import { getDatabase,ref,set,get,child } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
//   import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-analytics.js";
  
//   const firebaseConfig = {
//     apiKey: "AIzaSyAg3druEb0E3Q_hUV5343tBuErKdh8lY94",
//     authDomain: "blessings-7ca1c.firebaseapp.com",
//     projectId: "blessings-7ca1c",
//     storageBucket: "blessings-7ca1c.appspot.com",
//     messagingSenderId: "634684550847",
//     appId: "1:634684550847:web:df57bd2af5c7d61e3f600a",
//     measurementId: "G-87Q0PQMWRX"
//   };

//   // Initialize Firebase
//   const app = initializeApp(firebaseConfig);
//   const analytics = getAnalytics(app);

//   //get ref to Database services
//    const db=getDatabase(app);
//    document.getElementById("payButton").addEventListener('click',function(e){
//     e.preventDefault();
//     set(ref(db,'Name/'+document.getElementById("Name").value),{
//         Name:document.getElementById("Name").value,
//         Amount:document.getElementById("Amt").value,
//         Email:document.getElementById("Email").value,
//         PhoneNumber:document.getElementById("Phone").value

//     });
//     alert("Blessing on it's way  !");
//    })
// <script>
      
      
      var amountInput = document.getElementById('Amt');
    var payButton = document.getElementById('payButton');

    // Add an event listener to the amount input
    amountInput.addEventListener('input', function() {
      // Update the pay button text with the amount from the input
      payButton.innerText = 'Pay ₹' + amountInput.value+'.00';
    });
    
    function submitForm() {
      // Get values from textboxes
      var NameValue = document.getElementById("Name").value;
      var amountValue = document.getElementById("Amt").value;
      var emailValue = document.getElementById("Email").value;
      var phoneValue = document.getElementById("phone").value;

      // Validate if values are not empty
      if (NameValue ==="" || amountValue === "" || emailValue === "" || phoneValue === "" ) {
        alert("Please fill in all fields.");
        return;
      }
      
      // Submit the form (you can replace this with your actual form submission logic)
      alert("Form submitted!\nName:" + NameValue + "\nAmt:"+ amountValue +"\nEmail: " + emailValue + "\nphone: " + phoneValue);
      window.location.href='/Blessing/qr.html';
     
    }

              
              