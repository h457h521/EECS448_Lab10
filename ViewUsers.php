<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "haoshehuang", "weej4Tah", "haoshehuang");

    if($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
    } else {
        $getUsers = "SELECT User_id FROM Users";

        $result = $mysqli->query($getUsers);

        if($result->num_rows > 0) {
            echo "<table><tr><th>Users</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["User_id"] . "</td></tr>";
            }
            echo "</table>";
        }

    }

    $mysqli->close();

?>