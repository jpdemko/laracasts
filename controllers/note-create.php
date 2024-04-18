<?php

require 'Validator.php';
$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Create a Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // dd($_SERVER);
    $errors = [];
    $title = $_POST['title'];
    $text = $_POST['text'];

    if (!Validator::string($title, 1, 255)) {
        $errors[] = 'Note Title needs to be between [1-255] characters.';
    }

    if (!Validator::string($text, 1, 2000)) {
        $errors[] = 'Note Body needs to be between [1-2000] characters.';
    }

    if (empty($errors)) {
        $db->query(
            'INSERT INTO notes(author, title, text) VALUES(:author, :title, :text)',
            [
                'author' => 9,
                'title' => $title,
                'text' => $text,
            ]
        );
    }
}



require "views/note-create.view.php";
