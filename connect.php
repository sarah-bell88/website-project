<?php
    $name = $_POST['name'];
    $robin = $_POST['robin'];
    $comment = $_POST['comment'];

    //database connection

    $dbhost = 'oniddb.cws.oregonstate.edu';
    $dbname = 'bellsar-db';
    $dbuser = 'bellsar-db';
    $dbpass = 'CFmzSBN8s5dvCl5x';

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        $stmt = $conn->prepare("insert into robin-select(name, robin, comment)
        values(?,?,?)");
        $stmt->bind_param("sss", $name, $robin, $comment);
        $stmt->execute();

        echo 'Submission successful.';

        $stmt->close();
        $mysqli->close();
    }
?>