<?php
class Backend_model extends MY_MODEL
{
    private function getSqlQuery()
    {
        echo  $this->db->last_query();
        exit;
    }
    public function rowDataWithWhere(string $tableName = null, string $select, array $where = []): array
    {
        $query = $this->db->select($select)->where($where)->get($tableName);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return [];
        }
    }
    public function rowsData(string $tableName = null, string $select = null, string $orderby = null, $sortby = 'ASC'): array
    {
        $query = $this->db->select($select)->order_by($orderby, $sortby)->get($tableName);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }

    public function updateWithWhere(string $tableName = null, array $values = [], array $where = []): bool
    {
        $this->db->trans_begin();
        $this->db->where($where)->update($tableName, $values);

        if ($this->db->affected_rows()) {
            $this->db->trans_commit();
            return TRUE;
        } else {
            $this->db->trans_rollback();
            return FALSE;
        }
    }
    public function insertData(string $tableName = null, array $values = []): bool
    {
        $this->db->trans_begin();
        $this->db->insert($tableName, $values);

        if ($this->db->affected_rows()) {
            $this->db->trans_commit();
            return TRUE;
        } else {
            $this->db->trans_rollback();
            return FALSE;
        }
    }
    public function rowDataWithSingleInnerJoin(string $select = null, string $fromTable = null, string $joinTable = null, string $relationOn = null, array $where = [], string $orderby = null, $sortby = 'ASC', bool $rowStatus = false, $limitData = []): array
    {
        $this->db->cache_on();
        $query = $this->db->select($select)->from($fromTable)->join($joinTable, $relationOn)->where($where)->order_by($orderby, $sortby);

        if ($limitData['limitStatus'] == true) {
            if ($limitData['limit'] === 'ALL') {
                $query = $query->get();
            } else {
                $query = $query->limit($limitData['limit'], $limitData['offset'])->get();
            }
        } else if ($limitData['limitStatus'] == false) {
            $query = $query->get();
        }
        
         // echo $this->db->last_query();
        // exit;
        $this->db->cache_off();
        if ($rowStatus == true) {
            return !empty($query->row_array()) ? $query->row_array() : [];
        } else if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }
    public function deleteWithWhere(string $tableName = null, array $where = []): bool
    {
        $this->db->trans_begin();
        $this->db->where($where)->delete($tableName);

        if ($this->db->affected_rows()) {
            $this->db->trans_commit();
            return TRUE;
        } else {
            $this->db->trans_rollback();
            return FALSE;
        }
    }
    public function getCount(string $table = '')
    {
        return $this->db->get($table)->num_rows();
    }
}
