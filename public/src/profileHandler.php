<?php
    if (isset($_GET["action"])) {
        require_once "./includes/connect.inc.php";

        switch ($_GET["action"]) {
            case ("load"):
                showProfile($db_connection);
                break;
        }
    }   

    function showProfile($db_connection) {
        $uid = $_GET["user_id"];

        $query = "SELECT date_created FROM registered_user WHERE id=$uid";
        $result = pg_query($db_connection, $query);

        if ($result) {
            if ($row = pg_fetch_assoc($result)) {
                echo $row["date_created"];
            }
            else {
                echo 0;
            }
        }
        else {
            echo 0;
        }
    }

?>