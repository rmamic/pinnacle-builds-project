<?php
    if (isset($_GET["model"])) {
        require_once "./includes/connect.inc.php";

        $model = $_GET["model"];

        $query = "SELECT unit_price FROM component AS c WHERE c.model = '$model';";
        $result = pg_query($db_connection, $query);

        if ($row = pg_fetch_assoc($result)) {
            echo ($row["unit_price"]);
        }
        else {
            echo 0;
        }
    }
?>