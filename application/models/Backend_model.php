<?php
class Backend_model extends MY_MODEL
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

    public function updateWithWhere(string $tableName = null, array $values = [], array $where = []): bool
    {
        $this->db->trans_begin();
        $query = $this->db->where($where)->update($tableName, $values);

        if ($this->db->affected_rows()) {
            $this->db->trans_commit();
            return TRUE;
        } else {
            $this->db->trans_rollback();
            return FALSE;
        }
    }
}
