<?php

$conf['db'] = [
    "hostname" => "localhost",
    "username" => "test",
    "password" => "",
    "database" => "database"
];

$conn = mysqli_connect(
    $conf['db']['hostname'],
    $conf['db']['username'],
    $conf['db']['password'],
    $conf['db']['database']
);

if (!$conn) {
    die("MySQL Not Connected!");
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null) {
    $sql = "SELECT * FROM tables WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        echo $row['name'];
    } else {
        echo "Data tidak ditemukan.";
    }
}

mysqli_close($conn);
