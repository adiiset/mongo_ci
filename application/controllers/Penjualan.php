<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author: https://roytuts.com
 */

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_customers');
    }

    function index()
    {
        $data['customers'] = $this->m_customers->semua_customers();
        $this->load->view('content', $data);
    }

    public function create()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('ttl', 'Email Address', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {
                $result = $this->m_customers->create_user($this->input->post('name'), $this->input->post('email'));
                if ($result === TRUE) {
                    redirect('/');
                } else {
                    $data['error'] = 'Error occurred during saving data';
                    $this->load->view('user_create', $data);
                }
            } else {
                $data['error'] = 'Error occurred during saving data: all fields are required';
                $this->load->view('user_create', $data);
            }
        } else {
            $this->load->view('user_create');
        }
    }

    function update($_id)
    {
        if ($this->input->post('submit')) {
            if ($this->input->post('employee_name')) {
                $result = $this->m_customers->update_user($_id, $this->input->post('employee_name'), $this->input->post('tempat_tanggal_lahir'));
                if ($result === TRUE) {
                    redirect('/');
                } else {
                    $data['error'] = 'Error occurred during updating data';
                    $this->load->view('user_update', $data);
                }
            } else {
                $data['error'] = 'error occurred during saving data: all fields are mandatory';
                $this->load->view('user_update', $data);
            }
        } else {
            $data['user'] = $this->m_customers->get_user($_id);
            $this->load->view('user_update', $data);
        }
    }

    function delete($_id)
    {
        if ($_id) {
            $this->m_customers->delete_user($_id);
        }
        redirect('/');
    }
}
