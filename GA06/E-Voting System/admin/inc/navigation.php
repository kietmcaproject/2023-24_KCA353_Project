<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Navbar</title>
  <!-- Bootstrap CSS (assuming you're using Bootstrap) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS for navbar */
    .bg-green {
      background-color: #28a745 !important; /* Change to your desired green color */
    }
    .text-black {
      color: #000000 !important; /* Black font color */
    }
  </style>
</head>
<body>
  <div class="row bg-green">
    <div class="col-12 bg-green">
      <nav class="navbar navbar-expand-lg navbar-light bg-green">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-black"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link text-black mr-3" href="index.php?homepage=1">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-black mr-3" href="index.php?addElectionPage=1">Add Election</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-black mr-3" href="index.php?addCandidatePage=1">Add Candidate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-black mr-3" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <!-- Bootstrap JS (assuming you're using Bootstrap) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
