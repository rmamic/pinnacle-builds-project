<?php
    if (isset($_GET["action"])) {
        require_once "./includes/connect.inc.php";

        switch ($_GET["action"]) {
            case "info":
                getInfo($db_connection);
                break;
            case "add":
                getAddInfo($db_connection);
                break;
        }
        
        
    }

    function getInfo($db_connection) {
        $component = $_GET["component"];
        $model = $_GET["model"];

        $query = "SELECT * FROM component AS c JOIN $component AS cmp ON c.id = cmp.id WHERE c.model = '$model';";
        $result = pg_query($db_connection, $query);

        if ($row = pg_fetch_assoc($result)) {
            echo json_encode($row);
        }
        else {
            echo 0;
        }
    }

    function getAddInfo($db_connection) {
        $component = $_GET["component"];
        $model = $_GET["model"];

        switch ($component) {
            case "cpu":
                $query = "SELECT cpu.socket FROM component AS c JOIN cpu ON c.id = cpu.id WHERE c.model = '$model'";
                $result = pg_query($db_connection, $query);
                if ($row = pg_fetch_assoc($result)) {
                    echo trim($row["socket"]);
                }
                else {
                    echo 0;
                }
                break;
            case "motherboard":
                $query = "SELECT m.socket FROM component AS c JOIN motherboard AS m ON c.id = m.id WHERE c.model = '$model'";
                $result = pg_query($db_connection, $query);
                if ($row = pg_fetch_assoc($result)) {
                    echo trim($row["socket"]);
                }
                else {
                    echo 0;
                }
                break;
            case "ram":
                $query = "SELECT ram.ddr FROM component AS c JOIN ram ON c.id = ram.id WHERE c.model = '$model'";
                $result = pg_query($db_connection, $query);
                if ($row = pg_fetch_assoc($result)) {
                    echo trim($row["ddr"]);
                }
                else {
                    echo 0;
                }
                break;
            case "pc_case":
                $query = "SELECT pc.gpu_length, pc.cooler_height FROM component AS c JOIN pc_case AS pc ON c.id = pc.id WHERE c.model = '$model'";
                $result = pg_query($db_connection, $query);
                if ($row = pg_fetch_assoc($result)) {
                    echo json_encode(array(trim($row["gpu_length"]), trim($row["cooler_height"])));
                }
                else {
                    echo 0;
                }
                break;
            case "gpu":
                $query = "SELECT gpu.length FROM component AS c JOIN gpu ON c.id = gpu.id WHERE c.model = '$model'";
                $result = pg_query($db_connection, $query);
                if ($row = pg_fetch_assoc($result)) {
                    echo trim($row["length"]);
                }
                else {
                    echo 0;
                }
                break;
            case "cpu_fan":
                $query = "SELECT cf.length FROM component AS c JOIN cpu_fan AS cf ON c.id = cf.id WHERE c.model = '$model'";
                $result = pg_query($db_connection, $query);
                if ($row = pg_fetch_assoc($result)) {
                    echo trim($row["length"]);
                }
                else {
                    echo 0;
                }
                break;
        }
    }
?>