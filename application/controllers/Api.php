<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
	}

	function index()
	{
		$data = $this->api_model->get();
		echo json_encode($data->result_array());
	}

	function insert()
	{
		$this->form_validation->set_rules('no_kerangka', 'Nomor Kerangka', 'required');
		$this->form_validation->set_rules('no_polisi', 'Nomor Polisi', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'no_kerangka'	=>	$this->input->post('no_kerangka'),
				'no_polisi'		=>	$this->input->post('no_polisi'),
				'merek'		=>	$this->input->post('merek'),
				'tipe'		=>	$this->input->post('tipe'),
				'tahun'		=>	$this->input->post('tahun')

			);

			$this->api_model->insert($data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'					=>	true,
				'nomor_kerangka_error'	=>	form_error('no_kerangka'),
				'nomor_polisi_error'	=>	form_error('no_polisi')
			);
		}
		echo json_encode($array);
	}
	
	function get_id()
	{
		if($this->input->post('id_mobil'))
		{
			$data = $this->api_model->get_id($this->input->post('id_mobil'));

			foreach($data as $row)
			{
				$output['no_kerangka'] = $row['no_kerangka'];
				$output['no_polisi'] = $row['no_polisi'];
				$output['merek'] = $row['merek'];
				$output['tipe'] = $row['tipe'];
				$output['tahun'] = $row['tahun'];
			}
			echo json_encode($output);
		}
	}

	function search()
	{
		$criteria = $this->input->post('criteria');
		$cari = $this->input->post('cari');

		$data = $this->api_model->search($criteria, $cari);
		echo json_encode($data, true);
	}

	function update()
	{
		$this->form_validation->set_rules('no_kerangka', 'Nomor Kerangka', 'required');
		$this->form_validation->set_rules('no_polisi', 'Nomor Polisi', 'required');
		if($this->form_validation->run())
		{	
			$data = array(
				'no_kerangka'	=>	$this->input->post('no_kerangka'),
				'no_polisi'		=>	$this->input->post('no_polisi'),
				'merek'		=>	$this->input->post('merek'),
				'tipe'		=>	$this->input->post('tipe'),
				'tahun'		=>	$this->input->post('tahun')

			);

			$this->api_model->update($this->input->post('id_mobil'), $data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'					=>	true,
				'nomor_kerangka_error'	=>	form_error('no_kerangka'),
				'nomor_polisi_error'		=>	form_error('no_polisi')
			);
		}
		echo json_encode($array);
	}

	function delete()
	{
		if($this->input->post('id_mobil'))
		{
			if($this->api_model->delete($this->input->post('id_mobil')))
			{
				$array = array(

					'success'	=>	true
				);
			}
			else
			{
				$array = array(
					'error'		=>	true
				);
			}
			echo json_encode($array);
		}
	}

}


?>