<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depan extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_app');
    }

function index(){
	 	$this->load->view('depan/header');
		$this->load->view('depan/wellcome');
}
function Login(){
	 	redirect(login);
}

function buatTiket(){
	$data['id_ticket'] = "";

  // $data['id_user'] = $id_user;
  $data['reported_name'] = "";
  $data['reported_mail'] = "";
  $data['nopen'] = "";
  $data['ruangan'] = "";
  // $data['dd_ruangan'] = $this->model_app->dropdown_ruangan();
  // $data['id_ruangan'] = "";

  $data['dd_kategori'] = $this->model_app->dropdown_kategori();
  $data['id_kategori'] = "";


  $data['problem_summary'] = "";
  $data['problem_detail'] = "";

 $data['status'] = "";
 $data['progress'] = "";

 $data['url'] = "depan/save";

 $data['flag'] = "add";

		 $this->load->view('depan/header');
		 $this->load->view('depan/buatTiket', $data);

}



function save()
{

 $getkodeticket = $this->model_app->getkodeticket();

 $ticket = $getkodeticket;

 $reported_name = strtoupper(trim($this->input->post('reported_name')));
 $tanggal = $time = date("Y-m-d  H:i:s");
 $reported_mail = $this->input->post('reported_mail');
 $nopen = strtoupper(trim($this->input->post('nopen')));



 		$result = $this->model_app->checkNopenExists($nopen);

 		if(empty($result)){
			$this->session->set_flashdata('SUCCESS', "
					<b> NOMOR PENDIRIAN ($nopen) SALAH ATAU TIDAK TERDAFTAR DALAM SISTEM </b>. Mohon diulangi!
					 <hr id='welcomeLine' style='display:block;width:100%;z-index:17;'>
			 ");
			redirect('depan/buatTiket');
		 }
 		else {



		 $ruangan = strtoupper(trim($this->input->post('ruangan')));
		 $id_sub_kategori = strtoupper(trim($this->input->post('id_sub_kategori')));
		 $problem_summary = strtoupper(trim($this->input->post('problem_summary')));
		 $problem_detail = strtoupper(trim($this->input->post('problem_detail')));
		 // $id_teknisi = strtoupper(trim($this->input->post('id_teknisi')));

		 $data['id_ticket'] = $ticket;
		 $data['reported_name'] = $reported_name;
		 $data['nopen'] = $nopen;


		 $data['ruangan'] = $ruangan;
		 $data['reported_mail'] = $reported_mail;
		 $data['tanggal'] = $tanggal;
		 $data['id_sub_kategori'] = $id_sub_kategori;
		 $data['problem_summary'] = $problem_summary;
		 $data['problem_detail'] = $problem_detail;
		 $data['id_teknisi'] = "";
		 $data['status'] = 3;
		 $data['progress'] = 0;

		 $tracking['id_ticket'] = $ticket;
		 $tracking['tanggal'] = $tanggal;
		 $tracking['status'] = "Created Ticket";
		 $tracking['deskripsi'] = "";
		 $tracking['id_user'] = "";

		 $this->db->trans_start();

		 $this->db->insert('ticket', $data);
		 $this->db->insert('tracking', $tracking);

		 $this->db->trans_complete();

		 if ($this->db->trans_status() === FALSE)
				 {
					 $this->session->set_flashdata('SUCCESS', "
						   <b> Ticket Gagal Dibuat!</b>
							 <hr id='welcomeLine' style='display:block;width:100%;z-index:17;'>
						 ");
					 redirect('depan/buatTiket');
				 } else
				 {
					 $this->session->set_flashdata('SUCCESS', "
						   <b> Ticket Berhasil di Buat, KODE TIKET ANDA :  $ticket </b>. Mohon dicatat!
							 <hr id='welcomeLine' style='display:block;width:100%;z-index:17;'>
						 ");
					 redirect('depan/buatTiket');
				 }




 		}






}



function cekTiket(){
 $data['id_ticket']= "";

$data['url'] = "depan/cek";

		 $this->load->view('depan/header');
		 $this->load->view('depan/cekTiket', $data);
}

function cekNopen(){


}

function cekProgresTiket($data){


												$this->load->view('depan/header');
												$this->load->view('depan/cekTiket', $data);

}

function cek(){
	 $id_ticket= strtoupper(trim($this->input->post('id_ticket')));
	 $result = $this->model_app->checkTicket($id_ticket);

	  		if(empty($result)){
					$this->session->set_flashdata('SUCCESS', "
							<b>KODE TIKET:  $id_ticket, SALAH/TIDAK TERDAFTAR PADA SISTEM </b>. Mohon diulangi!
							<hr id='welcomeLine' style='display:block;width:100%;z-index:17;'>
						");
					redirect('depan/cekTiket');
	 		 }
	  		else {
					$this->session->set_flashdata('SUCCESS', "
							<b>KODE TIKET:  $id_ticket, TERDAFTAR PADA SISTEM </b>.
							<hr id='welcomeLine' style='display:block;width:100%;z-index:17;'>
						");
					$sql = "SELECT A.nopen, A.reported_name, A.status, A.id_ticket, A.tanggal, A.progress, A.nopen, A.tanggal_proses, A.id_teknisi, F.nama AS nama_nopen, D.name AS nama_teknisi, A.tanggal_solved, B.nama_sub_kategori, C.nama_kategori
																						 FROM ticket A
																						 LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
																						 LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
																						 LEFT JOIN user D ON D.id_user = A.id_teknisi
																						 LEFT JOIN nopen F ON F.id_nopen = A.nopen
																						WHERE A.id_ticket = '$id_ticket'";

																						$row = $this->db->query($sql)->row();

																						$data['id_ticket'] = $id_ticket;
																						$data['nopen'] = $row->nopen;
																						$data['nama_teknisi'] = $row->nama_teknisi;
																						$data['nama_nopen'] = $row->nama_nopen;
																						$data['tanggal'] = $row->tanggal;
																						$data['nama_sub_kategori'] = $row->nama_sub_kategori;
																						$data['nama_kategori'] = $row->nama_kategori;
																						$data['reported_name'] = $row->reported_name;
																						$data['progress'] = $row->progress;
																						$data['tanggal_proses'] = $row->tanggal_proses;
																						$data['tanggal'] = $row->tanggal;
																						$data['tanggal_solved'] = $row->tanggal_solved;

																						//TRACKING TICKET
																						$data_trackingticket = $this->model_app->data_trackingticket($id_ticket);
																						$data['data_trackingticket'] = $data_trackingticket;

																						$data['url'] = "depan/cek";
																						$this->load->view('depan/header');
																						$this->load->view('depan/cekTiketHasil', $data);
				}

}

function progresTiket(){
		 $this->load->view('depan/header');
		 $this->load->view('depan/progresTiket');
}



}
