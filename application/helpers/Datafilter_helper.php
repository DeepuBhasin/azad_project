<?php
function postDataFilter($data)
{
    $CI = &get_instance();
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($CI->db->conn_id, $data);
    return $data;
}
