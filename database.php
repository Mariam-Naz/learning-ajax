<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = 'practice_db';

// Create connection
$connection = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("Query Failed!!!" . mysqli_error($connection));
    }
}
function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}
function redirect($location)
{
    header("Location: $location");
}

function allProducts()
{
    $query = query('SELECT * FROM products');
    confirm($query);
    while ($row = mysqli_fetch_array($query)) {

        $show = <<< DELIMETER
            <tr>
                <th scope="row">{$row['id']}</th>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
                 <td><button class='btn btn-success btn-add' id="btn-add-{$row['id']}" data-id={$row['id']}>Add</button></td>
            </tr>
        DELIMETER;
        echo $show;
    }
}
