<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_app');

        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }

    }


function view()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/profile";


        $id_user = trim($this->session->userdata('id_user'));

				//notification
				//
				$sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 3";
				$row_listticket = $this->db->query($sql_listticket)->row();
				//
				$data['notif_list_ticket'] = $row_listticket->jml_list_ticket;
				//
				// $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A
				// LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
				// LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
				// -- LEFT JOIN karyawan D ON D.nik = A.reported
				// LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
				// $row_approvalticket = $this->db->query($sql_approvalticket)->row();
				//
				// $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;
				//
				$sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3";
				$row_assignmentticket = $this->db->query($sql_assignmentticket)->row();
				//
				$data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

				//end notification

       $id = $this->session->userdata('id_user');


        $sql =
        "SELECT  A.name, A.alamat, A.jk, A.level, A.notlp, A.email
        FROM user A WHERE A.id_user ='$id'";

        $row = $this->db->query($sql)->row();

        //general
      
        $data['name'] = $row->name;
				$data['notlp'] = $row->notlp;
        $data['alamat'] = $row->alamat;
        $data['jk'] = $row->jk;
				$data['email'] = $row->email;


        //info jabatan
        $data['level'] = $row->level;

        $this->load->view('template', $data);
    }


}
