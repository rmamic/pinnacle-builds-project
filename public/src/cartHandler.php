<?php
    if (isset($_GET["action"])) {
        require_once "./includes/connect.inc.php";

        switch ($_GET["action"]){
            case "delete":
                deleteFromCart($db_connection);
                break;
            case "add":
                addToCart($db_connection);
                break;
            case "save":
                saveCart($db_connection);
                break;
            case "load":
                loadCart($db_connection);
                break;
        }
    }

    function createConfiguration($db_connection) {
        $price = $_GET["price"];

        $query = "INSERT INTO pc_configuration(total_price, ismadebyuser, name) VALUES ($price, TRUE, '');";
        $result = pg_query($db_connection, $query);

        if ($result) {
            $query2 = "SELECT id FROM pc_configuration ORDER BY id DESC LIMIT 1";
            $result2 = pg_query($db_connection, $query2);

            if ($row = pg_fetch_assoc($result2)) {
                $confID = $row["id"];
                echo $confID . " ";
            }
            else {
                $confID = 0;
            }
        }
        else {
            $confID = 0;
        }

        if ($confID) {
            for ($i = 0; $i < 9; $i++) {
                $model = $_GET["comp_$i"];
                $query = "SELECT id FROM component WHERE model = '$model';";
                $result = pg_query($db_connection, $query);
                if ($row = pg_fetch_assoc($result)) {
                    $id = $row['id'];

                    $query3 = "INSERT INTO configuration_component(component_id, configuration_id) VALUES ($id, $confID);";
                    $result3 = pg_query($db_connection, $query3);

                    if (!$result3) {
                        echo 0;
                        exit();
                    }
                }
            }
        }
        return $confID;
    }

    function saveCart($db_connection) {
        $confID = createConfiguration($db_connection);
        $user_id = $_GET["user_id"];
        
        $query = "INSERT INTO cart(user_id, pc_configuration) VALUES ($user_id, $confID);";
        $result = pg_query($db_connection, $query);

        if ($result) {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    function loadCart($db_connection) {
        $user_id = $_GET["user_id"];
        $echoArray = array();

        $getIdsQuery = "SELECT c.pc_configuration, pc.name, pc.total_price FROM cart AS c 
                        JOIN pc_configuration AS pc ON c.pc_configuration = pc.id
                        WHERE user_id = '$user_id';";
        
        $idsResult = pg_query($db_connection, $getIdsQuery);

        if ($idsResult) {
            while ($row = pg_fetch_assoc($idsResult)) {
                $echoArray[intval($row["pc_configuration"])] = array(trim($row["name"]), $row["total_price"]);
            }
        }
        $counter = 0;

        foreach (array_keys($echoArray) as $configId) {
            $counter += 1;
            $query = "SELECT c.model FROM pc_configuration AS pc JOIN configuration_component AS cc ON pc.id = cc.configuration_id
                    JOIN component AS c ON cc.component_id = c.id
                    WHERE pc.id = $configId;";

            $result = pg_query($db_connection, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    array_push($echoArray[$configId], trim($row["model"]));
                }
            }
            else {
                echo 0;
                exit();
            }
        }
        if ($counter) {
            echo json_encode($echoArray);
        }
        else {
            echo 0;
        }
    }

    function addToCart($db_connection) {
        $confID = getConfiguration($db_connection, $_GET["name"]);
        $user_id = $_GET["user_id"];

        $query = "INSERT INTO cart(user_id, pc_configuration) VALUES ($user_id, $confID);";
        $result = pg_query($db_connection, $query);

        if ($result) {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    function getConfiguration($db_connection, $confName) {
        $query = "SELECT id FROM pc_configuration WHERE name='$confName'";
        $result = pg_query($db_connection, $query);

        if ($row = pg_fetch_assoc($result)) {
            return $row["id"];
        }
        else {
            return 0;
        }
    }

    function deleteFromCart($db_connection) {
        $user_id = $_GET["user_id"];
        $conf = $_GET["conf"];
        $flag = intval($_GET["flag"]);

        if ($flag) {
            $id = $conf;
        }
        else {
            $query = "SELECT id FROM pc_configuration WHERE name = '$conf'";
            $result = pg_query($db_connection, $query);

            if ($row = pg_fetch_assoc($result)) {
                $id = $row["id"];
            }
        }

        $delQuery = "DELETE FROM cart WHERE user_id = $user_id AND pc_configuration = $id";
        $delResult = pg_query($db_connection, $delQuery);

        if ($delResult) {
            echo 1;
        }
        else {
            echo 0;
        }
    }
?>