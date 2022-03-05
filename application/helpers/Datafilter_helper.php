<?php
$CI = &get_instance();

function postDataFilterhtml($data)
{
    global $CI;
    $data = trim($data);
    $data = htmlentities($data);
    $data = mysqli_real_escape_string($CI->db->conn_id, $data);
    return $data;
}
