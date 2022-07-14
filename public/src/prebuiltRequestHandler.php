<?php
    if (isset($_GET["action"])) {
        require_once "./includes/connect.inc.php";

        switch ($_GET["action"]) {
            case "load":
                loadPrebuilts($db_connection);
                break;
        }
    }

    function loadPrebuilts($db_connection) {
        $echoArray = array();

        $cIDq = "SELECT id, name, total_price FROM pc_configuration WHERE ismadebyuser = 'f';";
        $cIDresult = pg_query($db_connection, $cIDq);

        if ($cIDresult) {
            while ($row = pg_fetch_assoc($cIDresult)) {
                $echoArray[intval($row["id"])] = array(trim($row["name"]), $row["total_price"]);
            }
        }

        foreach (array_keys($echoArray) as $configId) {
            $compQuery = "SELECT c.model FROM pc_configuration AS pc 
            JOIN configuration_component AS cc ON pc.id = cc.configuration_id
            JOIN component AS c ON cc.component_id = c.id
            WHERE pc.id = $configId;";

            $compResult = pg_query($db_connection, $compQuery);

            if ($compResult) {
                while ($row = pg_fetch_assoc($compResult)) {
                    array_push($echoArray[$configId], trim($row["model"]));
                }
            }
            else {
                echo 0;
                exit();
            }
        }

        echo json_encode($echoArray);
    }
?>