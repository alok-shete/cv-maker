<?php
    $client = new MongoDB\Client(getenv("DATABASE_URL"));
    $db           = $client->cv;
    $collection   = $db->data;
?>
