<?php
function postDataFilterhtml($data)
{
    $CI = &get_instance();
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($CI->db->conn_id, $data);
    return $data;
}

function postDataFilterInvertedComma($data)
{
    $CI = &get_instance();
    $data = trim($data);
    $data = mysqli_real_escape_string($CI->db->conn_id, $data);
    return $data;
}
