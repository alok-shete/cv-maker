<?php
    $client         = new MongoDB\Client;
    $db           = $client->cv;
    $collection   = $db->data;
?>