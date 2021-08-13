<?php
ob_start();
session_start();
error_reporting(0);

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "garage");



// define("HOST", "remotemysql.com");
// define("USER", "D6xC6ccP7n");
// define("PASSWORD", "JZfTTNZlyW");
// define("DB", "D6xC6ccP7n");


global $conn;
$conn = mysqli_connect(HOST, USER, PASSWORD, DB);

function current_page($page)
{
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page == $page) {
        echo "active";
    }
}

function check_status($status)
{
    if ($status == 0) {
        $status = "<span class='badge bg-success'>Active</span>";
    } else {
        $status = "<span class='badge bg-danger'>Blocked</span>";
    }
    return $status;
}

function numberOfRecords($conn, $table)
{
    $query = "SELECT * FROM " . $table;
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);
    echo $num_rows;
}
