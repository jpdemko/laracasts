<?php

$config = require 'config.php';
$db = new Database($config['database']);


$note = $db->query(
    "select * from notes where id = :id",
    ['id' => $_GET['id']]
)->findOrFail();

$cur_user_id = 9;

authorize($note['author'] === $cur_user_id);

$heading = $note['title'];


// dd($notes);

require "views/note.view.php";
