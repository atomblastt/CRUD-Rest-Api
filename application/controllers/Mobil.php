<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	function index()
	{
		$data = array(	'title' => 'Data Ali Mobil',
						'isi'	=> 'home/mobil/list'
					 );
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	function HTTP_req($url, $data)
	{
		$client = curl_init($url);

		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($client);

		curl_close($client);

		return $response;
	}

	function action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');

			// delete
			if($data_action == "Delete")
			{
				$data = array('id_mobil' => $this->input->post('id_mobil'));
				$response = $this->HTTP_req('http://localhost/alimobil/api/delete', $data);
				echo $response;
			}

			// Edit
			if($data_action == "Edit")
			{
				$data = array(		'no_kerangka'	=>	$this->input->post('no_kerangka'),
									'no_polisi'		=>	$this->input->post('no_polisi'),
									'merek'			=>	$this->input->post('merek'),
									'tipe'			=>	$this->input->post('tipe'),
									'tahun'			=>	$this->input->post('tahun'),
									'id_mobil'		=>	$this->input->post('id_mobil')
							);
				$response = $this->HTTP_req('http://localhost/alimobil/api/update', $data);
				echo $response;
			}

			// Get ID
			if($data_action == "get_id")
			{
				$data = array('id_mobil' =>	$this->input->post('id_mobil'));
				$response = $this->HTTP_req('http://localhost/alimobil/api/get_id', $data);
				echo $response;
			}

			// Insert
			if($data_action == "Insert")
			{
				$data = array(		'no_kerangka'	=>	$this->input->post('no_kerangka'),
									'no_polisi'		=>	$this->input->post('no_polisi'),
									'merek'			=>	$this->input->post('merek'),
									'tipe'			=>	$this->input->post('tipe'),
									'tahun'			=>	$this->input->post('tahun')
							);
				$response = $this->HTTP_req('http://localhost/alimobil/api/insert', $data);
				echo $response;

			}

			// Get All
			if($data_action == "get")
			{
				$response = $this->HTTP_req('http://localhost/alimobil/api', null);
				$result = json_decode($response, true);
				$output = '';
				if(count($result) > 0)
				{
					foreach($result as $row => $u)
					{
						$output .= '
						<tr>
							<td>'.$u['no_kerangka'].'</td>
							<td>'.$u['no_polisi'].'</td>
							<td>'.$u['merek'].'</td>
							<td>'.$u['tipe'].'</td>
							<td>'.$u['tahun'].'</td>
							<td><button type="button" name="edit" class="btn btn-success btn-xs edit" id="'.$u['id_mobil'].'">Edit</button>
							<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$u['id_mobil'].'">Delete</button>
							</td>
						</tr>
						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="4" align="center">Tidak ada data ditemukan</td>
					</tr>
					';
				}
				echo $output;
			}

			// search
			if($data_action == "search")
			{
				$data = array(	'criteria'	=>	$this->input->post('criteria'),
								'cari'		=>	$this->input->post('cari')
							);

				$response = $this->HTTP_req('http://localhost/alimobil/api/search', $data);
				$result = json_decode($response, true);
				$output = '';
				if(count($result) > 0)
				{
					foreach($result as $row => $u)
					{
						$output .= '
						<tr>
							<td>'.$u['no_kerangka'].'</td>
							<td>'.$u['no_polisi'].'</td>
							<td>'.$u['merek'].'</td>
							<td>'.$u['tipe'].'</td>
							<td>'.$u['tahun'].'</td>
							<td><button type="button" name="edit" class="btn btn-success btn-xs edit" id="'.$u['id_mobil'].'">Edit</button>
							<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$u['id_mobil'].'">Delete</button>
							</td>
						</tr>
						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="4" align="center">Tidak ada data ditemukan</td>
					</tr>
					';
				}
				echo $output;
			}
		}	
	}
}

?>