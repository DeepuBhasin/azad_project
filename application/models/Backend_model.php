<?php
class Backend_model extends CI_Model
{
    public function rowDataWithWhere(string $tableName = null, array $where = []): array
    {
        $query = $this->db->where($where)->get($tableName);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return [];
        }
    }
}
