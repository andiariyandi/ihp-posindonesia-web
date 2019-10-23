<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
        parent::__construct();

        if(!$this->session->userdata('id_user')){
        	$this->session->set_flashdata("msg",
					"<div class='alert alert-info'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
					</div>");
					redirect('login');
        }
    }


function index(){
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/dashboard";

        // $id_dept = trim($this->session->userdata('id_dept'));
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

				 $sql_user = "SELECT COUNT(id_user) AS jml_user FROM user";
				 $row_user = $this->db->query($sql_user)->row();

				//$sql_karyawan = "SELECT COUNT(id_user) AS jml_karyawan FROM user";
			//	$row_karyawan = $this->db->query($sql_karyawan)->row();

				// $sql_teknisi = "SELECT COUNT(level = "TEKNISI") AS jml_teknisi FROM user";
				// $row_teknisi = $this->db->query($sql_teknisi)->row();

//General
$sql_ticket = "SELECT COUNT(id_ticket) AS jml_ticket FROM ticket";
$row_ticket = $this->db->query($sql_ticket)->row();

				$sql_ticket_solved = "SELECT COUNT(id_ticket) AS jml_ticket_solved FROM ticket where status = 6";
				$row_ticket_solved = $this->db->query($sql_ticket_solved)->row();

				$sql_ticket_process = "SELECT COUNT(id_ticket) AS jml_ticket_process FROM ticket where status = 4";
				$row_ticket_process = $this->db->query($sql_ticket_process)->row();

				$sql_ticket_app_tek = "SELECT COUNT(id_ticket) AS jml_ticket_app_tek FROM ticket where status = 3";
				$row_ticket_app_tek = $this->db->query($sql_ticket_app_tek)->row();

$precent_ticket_solved = $row_ticket_solved->jml_ticket_solved / $row_ticket->jml_ticket * 100;
$precent_ticket_process = $row_ticket_process->jml_ticket_process / $row_ticket->jml_ticket * 100;
$precent_ticket_app_tek = $row_ticket_app_tek->jml_ticket_app_tek / $row_ticket->jml_ticket * 100;

				$data['jml_ticket_solved'] = $row_ticket_solved->jml_ticket_solved;
				$data['jml_ticket_process'] = $row_ticket_process->jml_ticket_process;
				$data['jml_ticket_app_tek'] = $row_ticket_app_tek->jml_ticket_app_tek;
				$data['precent_ticket_solved'] = $precent_ticket_solved;
				$data['precent_ticket_process'] = $precent_ticket_process;
				$data['precent_ticket_app_tek'] = $precent_ticket_app_tek;
				$data['jml_ticket'] = $row_ticket->jml_ticket;


//GeneralPusat
$sql_ticketPusat =  "SELECT COUNT(A.id_ticket) AS jml_ticketPusat FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'PUSAT'";
$row_ticketPusat = $this->db->query($sql_ticketPusat)->row();

$sql_ticket_solvedPusat = "SELECT COUNT(A.id_ticket) AS jml_ticket_solvedPusat FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'PUSAT' AND status = 6";
$row_ticket_solvedPusat = $this->db->query($sql_ticket_solvedPusat)->row();

$sql_ticket_processPusat = "SELECT COUNT(A.id_ticket) AS jml_ticket_processPusat FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'PUSAT' AND status = 4";
$row_ticket_processPusat = $this->db->query($sql_ticket_processPusat)->row();

$sql_ticket_app_tekPusat = "SELECT COUNT(A.id_ticket) AS jml_ticket_app_tekPusat FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'PUSAT'AND status = 3";
$row_ticket_app_tekPusat = $this->db->query($sql_ticket_app_tekPusat)->row();

$precent_ticket_solvedPusat = $row_ticket_solvedPusat->jml_ticket_solvedPusat / $row_ticketPusat->jml_ticketPusat * 100;
$precent_ticket_processPusat = $row_ticket_processPusat->jml_ticket_processPusat / $row_ticketPusat->jml_ticketPusat * 100;
$precent_ticket_app_tekPusat = $row_ticket_app_tekPusat->jml_ticket_app_tekPusat / $row_ticketPusat->jml_ticketPusat * 100;

$data['jml_ticket_solvedPusat'] = $row_ticket_solvedPusat->jml_ticket_solvedPusat;
$data['jml_ticket_processPusat'] = $row_ticket_processPusat->jml_ticket_processPusat;
$data['jml_ticket_app_tekPusat'] = $row_ticket_app_tekPusat->jml_ticket_app_tekPusat;
$data['precent_ticket_solvedPusat'] = $precent_ticket_solvedPusat;
$data['precent_ticket_processPusat'] = $precent_ticket_processPusat;
$data['precent_ticket_app_tekPusat'] = $precent_ticket_app_tekPusat;
$data['jml_ticketPusat'] = $row_ticketPusat->jml_ticketPusat;

//GeneralKPC
$sql_ticketKPC =  "SELECT COUNT(A.id_ticket) AS jml_ticketKPC FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'KPC'";
$row_ticketKPC = $this->db->query($sql_ticketKPC)->row();

$sql_ticket_solvedKPC = "SELECT COUNT(A.id_ticket) AS jml_ticket_solvedKPC FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'KPC' AND status = 6";
$row_ticket_solvedKPC = $this->db->query($sql_ticket_solvedKPC)->row();

$sql_ticket_processKPC = "SELECT COUNT(A.id_ticket) AS jml_ticket_processKPC FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'KPC' AND status = 4";
$row_ticket_processKPC = $this->db->query($sql_ticket_processKPC)->row();

$sql_ticket_app_tekKPC = "SELECT COUNT(A.id_ticket) AS jml_ticket_app_tekKPC FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'KPC'AND status = 3";
$row_ticket_app_tekKPC = $this->db->query($sql_ticket_app_tekKPC)->row();

$precent_ticket_solvedKPC = $row_ticket_solvedKPC->jml_ticket_solvedKPC / $row_ticketKPC->jml_ticketKPC * 100;
$precent_ticket_processKPC = $row_ticket_processKPC->jml_ticket_processKPC / $row_ticketKPC->jml_ticketKPC * 100;
$precent_ticket_app_tekKPC = $row_ticket_app_tekKPC->jml_ticket_app_tekKPC / $row_ticketKPC->jml_ticketKPC * 100;

$data['jml_ticket_solvedKPC'] = $row_ticket_solvedKPC->jml_ticket_solvedKPC;
$data['jml_ticket_processKPC'] = $row_ticket_processKPC->jml_ticket_processKPC;
$data['jml_ticket_app_tekKPC'] = $row_ticket_app_tekKPC->jml_ticket_app_tekKPC;
$data['precent_ticket_solvedKPC'] = $precent_ticket_solvedKPC;
$data['precent_ticket_processKPC'] = $precent_ticket_processKPC;
$data['precent_ticket_app_tekKPC'] = $precent_ticket_app_tekKPC;
$data['jml_ticketKPC'] = $row_ticketKPC->jml_ticketKPC;


//GeneralAGEN
$sql_ticketAGEN =  "SELECT COUNT(A.id_ticket) AS jml_ticketAGEN FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'AGEN'";
$row_ticketAGEN = $this->db->query($sql_ticketAGEN)->row();

$sql_ticket_solvedAGEN = "SELECT COUNT(A.id_ticket) AS jml_ticket_solvedAGEN FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'AGEN' AND status = 6";
$row_ticket_solvedAGEN = $this->db->query($sql_ticket_solvedAGEN)->row();

$sql_ticket_processAGEN = "SELECT COUNT(A.id_ticket) AS jml_ticket_processAGEN FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'AGEN' AND status = 4";
$row_ticket_processAGEN = $this->db->query($sql_ticket_processAGEN)->row();

$sql_ticket_app_tekAGEN = "SELECT COUNT(A.id_ticket) AS jml_ticket_app_tekAGEN FROM ticket A LEFT JOIN nopen B ON B.id_nopen = A.nopen WHERE B.tipe = 'AGEN'AND status = 3";
$row_ticket_app_tekAGEN = $this->db->query($sql_ticket_app_tekAGEN)->row();

$precent_ticket_solvedAGEN = $row_ticket_solvedAGEN->jml_ticket_solvedAGEN / $row_ticketAGEN->jml_ticketAGEN * 100;
$precent_ticket_processAGEN = $row_ticket_processAGEN->jml_ticket_processAGEN / $row_ticketAGEN->jml_ticketAGEN * 100;
$precent_ticket_app_tekAGEN = $row_ticket_app_tekAGEN->jml_ticket_app_tekAGEN / $row_ticketAGEN->jml_ticketAGEN * 100;

$data['jml_ticket_solvedAGEN'] = $row_ticket_solvedAGEN->jml_ticket_solvedAGEN;
$data['jml_ticket_processAGEN'] = $row_ticket_processAGEN->jml_ticket_processAGEN;
$data['jml_ticket_app_tekAGEN'] = $row_ticket_app_tekAGEN->jml_ticket_app_tekAGEN;
$data['precent_ticket_solvedAGEN'] = $precent_ticket_solvedAGEN;
$data['precent_ticket_processAGEN'] = $precent_ticket_processAGEN;
$data['precent_ticket_app_tekAGEN'] = $precent_ticket_app_tekAGEN;
$data['jml_ticketAGEN'] = $row_ticketAGEN->jml_ticketAGEN;








		//KEPUASAN USER


			 $data['jml_user'] = $row_user->jml_user;
			// $data['jml_karyawan'] = $row_karyawan->jml_karyawan;
			//$data['jml_teknisi'] = $row_teknisi->jml_teknisi;



			$precent_ticket_app_tek = $row_ticket_app_tek->jml_ticket_app_tek / $row_ticket->jml_ticket * 100;

			$sql_feedback = "SELECT COUNT(id_feedback) AS jml_feedback FROM history_feedback";
			$row_feedback = $this->db->query($sql_feedback)->row();

			$sql_feedback_positiv = "SELECT COUNT(id_feedback) AS jml_feedback_positiv FROM history_feedback WHERE feedback =1";
			$row_feedback_positiv = $this->db->query($sql_feedback_positiv)->row();

			$sql_feedback_negativ = "SELECT COUNT(id_feedback) AS jml_feedback_negativ FROM history_feedback WHERE feedback =0";
			$row_feedback_negativ = $this->db->query($sql_feedback_negativ)->row();

		if($row_feedback_positiv->jml_feedback_positiv == 0){
			$data['jml_feedback_positiv'] = 0;
		}else{
			$data['jml_feedback_positiv'] = $row_feedback_positiv->jml_feedback_positiv / $row_feedback->jml_feedback * 100;
		}

		if($row_feedback_negativ->jml_feedback_negativ == 0){
			$data['jml_feedback_negativ'] = 0;
		}else{
			$data['jml_feedback_negativ'] = $row_feedback_negativ->jml_feedback_negativ / $row_feedback->jml_feedback * 100;
		}


    $this->load->view('template', $data);
  }


}
