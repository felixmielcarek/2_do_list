<?php
try {
    $pblistgw = new PbListGateway(new Connection('mysql:host=localhost;dbname=2dolist', 'root', ''));
    $taskgw = new TaskGateway(new Connection('mysql:host=localhost;dbname=2dolist', 'root', ''));
    $tabpblistsgw = $pblistgw->getPbLists();
    foreach ($tabpblistsgw as $row) {
        $tabpblists[] = new PbList($row['id'], $row['name']);
    }
} catch (PDOException $e) {
    echo 'Connection error';
}