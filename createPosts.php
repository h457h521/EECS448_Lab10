<?php
    $userName = $_POST["userName"];
    $post = $_POST["post"];
    $post_id = 0;

    $mysqli = new mysqli("mysql.eecs.ku.edu", "haoshehuang", "weej4Tah", "haoshehuang");

    if($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
    } else {
        $checkUser = "SELECT 1 FROM Users WHERE User_id = '$userName'";
        $getPosts = "SELECT * FROM Posts";
        $userEx = $mysqli->query($checkUser);
        $result = $mysqli->query($getPosts);
        $new_id = $result->num_rows + 1;
        $createPost = "INSERT INTO Posts (post_id, content, author_id) VALUES ('$new_id', '$post', '$userName')";

        if($userEx->num_rows > 0) {
            $mysqli->query($createPost);
            echo "<script> alert('Post successed');";
            echo "window.history.back(); </script>";
        } else {
            echo "<script> alert('User does not exist.');";
            echo "window.history.back(); </script>";
        }


    }



    $mysqli->close();
?>