<?php

    $conn = new mysqli("localhost", "root", "root", "javaDB");

    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
    } else {
        error_log("Connection successful!");
    }

    $usersResult = $conn->query("SELECT users.id, users.name, users.lastname, offices.name as offices FROM users INNER JOIN offices ON users.office_id = offices.id;");

    if ($usersResult->num_rows > 0) {
        echo "<h1 class='text-center mt-2 mb-2'>All Employees</h1>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='text-center' scope='col'>First name</th>";
        echo "<th class='text-center' scope='col'>Last name</th>";
        echo "<th class='text-center' scope='col'>Office</th>";
        echo "<th class='text-center' scope='col'>Actions</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $usersResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='text-center'>" . ucwords($row["name"]) . "</td>";
            echo "<td class='text-center'>" . ucwords($row["lastname"]) . "</td>";
            echo "<td class='text-center'>" . ucwords($row["offices"]) . "</td>";
            echo "<td class='text-center'><a href='userDetails.php?id=" . $row["id"] . "'><i class='bi bi-person'></i></a> | <a href='addContacts.php?id=" . $row["id"] . "'><i class='bi bi-person-lines-fill' style='cursor: pointer; color: green;'></i></a> | <a class='orangeIcon' href='updateUser.php?id=" . $row["id"] . "'><i class='bi bi-pencil-square'></i></a> | <i data-bs-toggle='modal' data-bs-target='#exampleModal" . $row["id"] . "' class='bi bi-trash-fill' style='cursor: pointer; color: red'></i></td>";
            echo "</tr>";
            echo "<input type='hidden' id='user_id' value='" . $row["id"] . "'>";
            echo "<div class='modal fade' id='exampleModal" . $row["id"] . "' tabindex='-1' aria-labelledby='exampleModalLabel" . $row["id"] . "' aria-hidden='true'>";
            echo "<div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
              <h1 class='modal-title fs-5' id='exampleModalLabel" . $row["id"] . "'>Delete user " . ucwords($row["name"]) . " " . ucwords($row["lastname"]) . "</h1>
                <button
                  type='button'
                  class='btn-close'
                  data-bs-dismiss='modal'
                  aria-label='Close'
                ></button>
              </div>
              <div class='modal-body'>Are you sure you want to delete this user?</div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>
                  Cancel
                </button>
                <button type='button' class='btn btn-primary'><a style='color: white; text-decoration: none' href='deleteUser.php?id=" . $row["id"] . "'>Delete</a></button>
              </div>
            </div>
          </div>
        </div>";
        }
    } else {
        echo "<tr><td colspan='4'>No results found.</td></tr>";
    }
    

    $conn->close();
?>