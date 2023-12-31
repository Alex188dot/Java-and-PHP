
    <?php 

    session_start();
    if((!$_SESSION["loggedIn"] == "ok")) {
        header("Location: login.php");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Employee</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- end Navbar -->
    <!-- Body -->
    <div class="container">
        <h1 class="text-center mt-2">Insert a new Employee</h1>
        <form action="insertIntoDB.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="City">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Age">
            </div>
            <div class="mb-3">
                <label for="profile_img" class="form-label">Profile Picture</label>
                <input accept="image/*" type="file" class="form-control" id="profile_img" name="profile_img" placeholder="Profile Picture">
            </div>
            <div class="mb-3">
                <label for="office" class="form-label">Office:</label>
                <br>
                <select class="form-select" name="office" id="office">
                    <?php
                        $conn = new mysqli("localhost", "root", "root", "javaDB");

                        if ($conn->connect_error) {
                            error_log("Connection failed: " . $conn->connect_error);
                        } 
                        $usersResult = $conn->query("SELECT id, name FROM offices");
                        foreach ($usersResult as $row) {
                            echo "<option value='" . $row["id"] . "'>" . ucwords($row["name"]) . "</option>";
                        }
                    
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> 
    <!-- End Body -->
    <!-- Footer -->
    <?php include("footer.php");?>
    <!-- End Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>