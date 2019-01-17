<?php
// Connect to the database
function my_connect()
{
    global $link;

    $link = mysqli_connect('127.0.0.1', 'user', 'pwd', 'db');
    if (!$link) {
        die('Connection Error: ('.mysqli_connect_errno().') '.mysqli_connect_error());
    }
}

// General query
function my_query($query)
{
    global $link;

    $result = mysqli_query($link, $query);

    if (!$result) {
        die('Execution error: ('.mysqli_errno($link).') '.mysqli_error($link));
    }

    return $result;
}
