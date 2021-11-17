<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Tokosepatu extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('Tokosepatu_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama Pembeli', 'required', [
            'required' => 'Nama Pembeli harus di isi'
        ]);
        $this->form_validation->set_rules('nohp', 'Nomor HP', 'required', [
            'required' => 'Nomor HP harus di isi'
        ]);
        if ($this->form_validation->run() === false) {
            $data['merk'] = ['Nike', 'Adidas', 'Kickers', 'Eiger', 'Bucherri'];
            $this->load->view('tokosepatu/v_input', $data);
        } else {
            $data = [
            'nama' => $this->input->post('nama'),
            'nohp' => $this->input->post('nohp'),
            'merk' => $this->input->post('merk'),
            'ukuran' => $this->input->post('ukuran'),
            'harga' => $this->Tokosepatu_model->proses($this->input->post('merk'))
            ];

            $this->load->view('tokosepatu/v_output', $data);
        }
    }
}