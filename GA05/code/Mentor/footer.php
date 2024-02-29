<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f0f0f0; /* Set your desired background color */
    }

    .footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.8); /* Set your desired background color and transparency */
      padding: 10px;
      text-align: center;
      box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow for better visibility */
    }
  </style>
</head>
<body>

  <!-- Content goes here -->
  <h5>&copy; 2023 MentorU</h5>

  <div class="footer" id="footer">
    <script>
      function updateTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('footer').innerText = `Current Time: ${hours}:${minutes}:${seconds}`;
      }

      // Update time every second
      setInterval(updateTime, 1000);

      // Initial call to display time immediately
      updateTime();
    </script>
  </div>
  

</body>
</html>
