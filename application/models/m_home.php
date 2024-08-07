<?php
class M_home extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    private function is_super_user() {
        return $this->session->userdata('user_level') == 1;
    }

    public function get_total_sampah($user_id)
    {
        $this->db->select_sum('berat_total');
        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_daur_ulang.user_id', $user_id);
        }
        $query = $this->db->get('t_daur_ulang');
        $result = $query->row_array();
        return $result['berat_total'];
    }

    public function get_total_daur_ulang($user_id)
    {
       $this->db->select_sum('berat_daur_ulang');
       if (!$this->is_super_user()) {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('t_daur_ulang.user_id', $user_id);
        }
       $query = $this->db->get('t_daur_ulang');
       $result = $query->row_array();
       return $result['berat_daur_ulang'];
    }

    public function get_total_residu($user_id)
    {
        $this->db->select_sum('residu');
        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_daur_ulang.user_id', $user_id);
        }
        $query = $this->db->get('t_daur_ulang');
        $result = $query->row_array();
        return $result['residu'];
    }
    
        public function get_data_harian($user_id, $kategori_id = null, $tps_id = null) {
            $this->db->select('SUM(berat_total) as total, SUM(berat_daur_ulang) as daur_ulang, SUM(residu) as residu');
            $this->db->from('t_daur_ulang');
            if (!$this->is_super_user()) {
                $user_id = $this->session->userdata('user_id');
                $this->db->where('user_id', $user_id);
            }
            if ($kategori_id) {
                $this->db->where('kategori_id', $kategori_id);
            }
            if ($tps_id) {
                $this->db->where('tps_id', $tps_id);
            }
            $this->db->where('tanggal', date('Y-m-d')); 
            $query = $this->db->get();
            return $query->row_array();
        }
        
        public function get_data_mingguan($user_id, $kategori_id = null, $tps_id = null) {
            $this->db->select('SUM(berat_total) as total, SUM(berat_daur_ulang) as daur_ulang, SUM(residu) as residu');
            $this->db->from('t_mingguan');
            if (!$this->is_super_user()) {
                $user_id = $this->session->userdata('user_id');
                $this->db->where('user_id', $user_id);
            }
            if ($kategori_id) {
                $this->db->where('kategori_id', $kategori_id);
            }
            if ($tps_id) {
                $this->db->where('tps_id', $tps_id);
            }
            $this->db->where('tahun', date('Y'));
            $this->db->where('minggu_ke', date('W'));
            $query = $this->db->get();
            return $query->row_array();
        }
    
        public function get_data_bulanan($user_id, $kategori_id = null, $tps_id = null) {
            $this->db->select('SUM(berat_total) as total, SUM(berat_daur_ulang) as daur_ulang, SUM(residu) as residu');
            $this->db->from('t_bulanan');
            if (!$this->is_super_user()) {
                $user_id = $this->session->userdata('user_id');
                $this->db->where('user_id', $user_id);
            }
            if ($kategori_id) {
                $this->db->where('kategori_id', $kategori_id);
            }
            if ($tps_id) {
                $this->db->where('tps_id', $tps_id);
            }
            $this->db->where('tahun', date('Y'));
            $this->db->where('bulan', date('m'));
            $query = $this->db->get();
            return $query->row_array();
        }
    
        public function get_data_per_bulan_by_kategori_and_tps($user_id, $kategori_id, $tps_id) {
            $this->db->select('MONTH(tanggal) as bulan, SUM(berat_total) as total_sampah, SUM(berat_daur_ulang) as total_daur_ulang, SUM(residu) as total_residu');
            $this->db->from('t_daur_ulang');
            if (!$this->is_super_user()) {
                $user_id = $this->session->userdata('user_id');
                $this->db->where('user_id', $user_id);
            }
            if ($kategori_id) {
                $this->db->where('kategori_id', $kategori_id);
            }
            if ($tps_id) {
                $this->db->where('tps_id', $tps_id);
            }
            $this->db->group_by('bulan');
            $query = $this->db->get();
            return $query->result_array();
        }
    }
