<?php
    $client = new MongoDB\Client(getenv("DATABASE_URL"));
    $db           = $client->cv;
    $collection   = $db->data;
    $ip_server = $_SERVER['SERVER_ADDR'];
    debug_to_console($ip_server);
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
?>
