<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_pembayaran extends AUTH_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('M_setting_pembayaran');
	}

	public function index()
	{

		$data['userdata'] 	= $this->userdata;
		$id 				= $this->userdata->id_user;
		$data['page'] 		= "Setting Pembayaran";
		$data['judul'] 		= "Setting Pembayaran";
		$data['deskripsi'] 	= "Manage Setting Pembayaran";
		$data['setting_pembayaran'] = $this->M_setting_pembayaran->select_all_setting_pembayaran($id);
		$data['kelas'] 				= $this->M_setting_pembayaran->select_all_kelas($id);
		$this->template->views('setting_pembayaran/index', $data);
	}

	public function add()
	{

		$data['userdata']			= $this->userdata;
		$id 						= $this->userdata->id_user;
		$id_unit_pendidikan 		= $this->userdata->id_unit_pendidikan;
		$data['page'] 				= "Setting Pembayaran";
		$data['judul'] 				= "Setting Pembayaran";
		$data['deskripsi'] 			= "Manage Setting Pembayaran";
		$data['tahun_ajaran'] 		= $this->M_setting_pembayaran->select_all_tahun_ajaran();
		$data['tipe_pembayaran'] 	= $this->M_setting_pembayaran->select_all_tipe_pembayaran();
		$data['tipe_kelas'] 		= $this->M_setting_pembayaran->select_all_tipe_kelas($id_unit_pendidikan);
		$data['user'] 				= $this->M_setting_pembayaran->select_all_user($id);
		$this->template->views('setting_pembayaran/add', $data);
	}

	public function save()
	{

		$data = array(

			'id_tahun_ajaran'		=> $this->input->post('id_tahun_ajaran'),
			'id_tipe_pembayaran'	=> $this->input->post('id_tipe_pembayaran'),
			'nominal'				=> $this->input->post('nominal'),
			'id_tipe_kelas'				=> $this->input->post('id_tipe_kelas'),
			// 'jenis_kelamin'				=> $this->input->post('jenis_kelamin'),
			'id_unit_pendidikan'	=> $this->input->post('id_unit_pendidikan')

		);

		$this->M_setting_pembayaran->insert($data);
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil disimpan'));
		redirect('setting_pembayaran/index');
	}

	function edit($id)

	{
		$data['userdata']	= $this->userdata;
		$id_user 			= $this->userdata->id_user;
		$id_unit_pendidikan 		= $this->userdata->id_unit_pendidikan;
		$data['page'] 		= "Setting Pembayaran";
		$data['judul'] 		= "Setting Pembayaran";
		$data['deskripsi'] 	= "Manage Setting Pembayaran";

		$where = array('id_setting_pembayaran' => $id);
		$data['tahun_ajaran'] 		= $this->M_setting_pembayaran->select_all_tahun_ajaran();
		$data['tipe_pembayaran'] 	= $this->M_setting_pembayaran->select_all_tipe_pembayaran();
		$data['tipe_kelas'] 				= $this->M_setting_pembayaran->select_all_tipe_kelas($id_unit_pendidikan);
		$data['kelas_siswa'] 		= $this->M_setting_pembayaran->edit_data($where, 'setting_pembayaran')->result();
		$data['setting_pembayaran'] = $this->M_setting_pembayaran->edit_data($where, 'setting_pembayaran')->result();
		$this->template->views('setting_pembayaran/edit', $data);
	}

	function update()
	{

		$id 				= $this->input->post('id_setting_pembayaran');
		$id_tahun_ajaran 	= $this->input->post('id_tahun_ajaran');
		$id_tipe_pembayaran = $this->input->post('id_tipe_pembayaran');
		$nominal 			= $this->input->post('nominal');
		$id_unit_pendidikan = $this->input->post('id_unit_pendidikan');
		$id_tipe_kelas = $this->input->post('id_tipe_kelas');
		// $jenis_kelamin = $this->input->post('jenis_kelamin');

		$data = array(

			'id_tahun_ajaran' 		=> $id_tahun_ajaran,
			'id_tipe_pembayaran' 	=> $id_tipe_pembayaran,
			'nominal' 				=> $nominal,
			'id_unit_pendidikan' 	=> $id_unit_pendidikan,
			'id_tipe_kelas'			=> $id_tipe_kelas,
			// 'jenis_kelamin'			=> $jenis_kelamin

		);

		$where = array(

			'id_setting_pembayaran' => $id

		);

		$this->M_setting_pembayaran->update_data($where, $data, 'setting_pembayaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil diubah'));
		redirect('setting_pembayaran/index');
	}

	public function delete($id)
	{

		$data = array('id_setting_pembayaran' => $id);
		$this->M_setting_pembayaran->delete($data, 'setting_pembayaran');
		$this->session->set_flashdata('msg', show_succ_msg('Data Berhasil dihapus'));
		redirect('setting_pembayaran/index');
	}
}
