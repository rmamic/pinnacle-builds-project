<?php
    if (isset($_GET["component"]) && isset($_GET["model"])) {
        require_once "./includes/connect.inc.php";
        
        $component = $_GET["component"];
        $model = $_GET["model"];

        if ($component === "psu")  {
            $query = "SELECT cmp.power FROM component AS c JOIN psu AS cmp ON c.id = cmp.id WHERE c.model = '$model';";
            
        }
        else {
            $query = "SELECT cmp.tdp FROM component AS c JOIN $component AS cmp ON c.id = cmp.id WHERE c.model = '$model';";
        }
        
        $result = pg_query($db_connection, $query);

        if ($row = pg_fetch_assoc($result)) {
            if ($component == "psu") {
                echo $row["power"];
            }
            else {
                echo $row["tdp"];
            }
        }
        else {
            echo '01';
        }
    }
    else {
        echo -1;
    }
?>