
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
           
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
    <?php 
include "nav.php";
?>
        <br>
        
        <h2>ADD MENTEE DETAILS</h2>
        <form id="studentForm" action="addstudent.php" method="post">
            <label for="id">LAB ID:</label>
            <input type="text" id="id" name="id" class="form-control" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>

            <label for="rollNumber">Roll Number:</label>
            <input type="text" id="rollNumber" name="rollNumber" class="form-control" required>

            <label for="universityRollNo">University Roll Number:</label>
            <input type="text" id="universityRollNo" name="universityRollNo" class="form-control" required>

            <label for="section">Section:</label>
            <input type="text" id="section" name="section" class="form-control" required>

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" class="form-control" required>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" class="form-control" required>

            <label for="attendance">Attendance:</label>
            <input type="text" id="attendance" name="attendance" class="form-control" required>

            
            <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" class="form-control-file" required>

            

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>

            <button type="submit" class="btn btn-success">Add Student</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
