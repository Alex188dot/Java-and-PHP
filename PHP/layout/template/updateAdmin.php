<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        table {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
<?php include("navbar.php"); ?>
<!-- body -->
<div class="container">
    <?php 
    $user = $_GET["id"];
    $conn = new mysqli("localhost", "root", "root", "javaDB");
    $query = "SELECT * FROM admins WHERE id = $user";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2 class='text-center mt-2 mb-2'>Update User: " . ucwords($row["name"]) . " " . ucwords($row["lastname"]) . "</h2>";
            echo "<form method='POST' action='updateAdminAction.php'>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>First name</th>";
            echo "<th scope='col'>Last name</th>";
            echo "<th scope='col'>Email</th>";
            echo "<th scope='col'>Password</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td><input type='text' name='name' value='" . $row["name"] . "'></td>";
            echo "<td><input type='text' name='lastname' value='" . $row["lastname"] . "'></td>";
            echo "<td><input type='text' name='email' value='" . $row["email"] . "'></td>";
            echo "<td><input type='text' name='password' value='" . $row["pwd"] . "'></td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<input type=hidden name='id' value='" . $row["id"] . "'>";
            echo "<button type='submit' class='btn btn-primary'>Update</button>";
            echo "</form>";
        }
    } else {
        echo "No records found.";    
    }
    ?>

</div>
<!-- end body  -->
<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>