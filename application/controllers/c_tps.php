<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_tps extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_tps');
        $this->load->model('m_users');
        $this->load->library('form_validation');
    }

    // Fungsi untuk menampilkan semua data TPS
    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);
        $data['tps'] = $this->m_tps->get_all_tps($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/index', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi untuk menampilkan form tambah TPS
    public function create() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/create', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi untuk menyimpan data TPS baru
    public function store() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);

        $this->form_validation->set_rules('nama_tps', 'Nama TPS', 'required');
        $this->form_validation->set_rules('alamat_tps', 'Alamat TPS', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|integer');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_tps/create', $data);
            $this->load->view('templates/footer');
        } else {
            $tps_data = array(
                'nama_tps' => $this->input->post('nama_tps'),
                'alamat_tps' => $this->input->post('alamat_tps'),
                'kapasitas' => $this->input->post('kapasitas'),
                'keterangan' => $this->input->post('keterangan'),
                'user_id' => $user_id
            );

            $this->m_tps->insert_tps($tps_data);
            redirect('c_tps');
        }
    }

    // Fungsi untuk menampilkan form edit TPS
    public function edit($id_tps) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);
        $data['tps'] = $this->m_tps->get_tps($id_tps);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/edit', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi untuk mengupdate data TPS
    public function update($id_tps) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);

        $this->form_validation->set_rules('nama_tps', 'Nama TPS', 'required');
        $this->form_validation->set_rules('alamat_tps', 'Alamat TPS', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|integer');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['tps'] = $this->m_tps->get_tps($id_tps);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_tps/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $tps_data = array(
                'nama_tps' => $this->input->post('nama_tps'),
                'alamat_tps' => $this->input->post('alamat_tps'),
                'kapasitas' => $this->input->post('kapasitas'),
                'keterangan' => $this->input->post('keterangan')
            );

            $this->m_tps->update_tps($id_tps, $tps_data);
            redirect('c_tps');
        }
    }

    // Fungsi untuk menghapus data TPS
    public function delete($id_tps) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $this->m_tps->delete_tps($id_tps);
        redirect('c_tps');
    }
}
?>
