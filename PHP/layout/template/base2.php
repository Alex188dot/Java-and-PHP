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
    <title>Admins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        table {
            margin-top: 1rem;
        }
        h1 {
            text-align: center;
            margin: 1rem 0;
        }
    </style>

</head>
<body>
<?php include("navbar.php"); ?>
<!-- body -->
<div class="container">
    <h1>Admins</h1>
    <?php 
        $outcome = $_GET["outcome"];

        if ($outcome == 1) {
            echo "<div class='alert alert-success' role='alert' id='success'>
            Admin successfully added/updated!
            </div>";
        } else if ($outcome == 0) {
            echo "<div class='alert alert-danger' role='alert' id=failure>There was an error with your request
            </div>";
        } 
    ?>

    <?php include("selectAdminsFromDB.php"); ?>
        

</div>
<!-- end body  -->
<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    const success = document.getElementById("success");
    const failure = document.getElementById("failure");
    function hideNotice() {
        success.style.display = "none";
        failure.style.display = "none";
    }
    setTimeout(hideNotice, 3000);
</script>
</body>
</html>