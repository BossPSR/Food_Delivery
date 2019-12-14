<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_ctr extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('email') == '') {
			redirect('Login');
		} else {
			$this->load->view('option/header');
			$this->load->view('profile');
			$this->load->view('option/footer');
		}
	}

	public function my_profile_save()
	{
		if ($this->session->userdata('email')  != '') {
			$id                  = $this->input->post('id');
			$first_name          = $this->input->post('first_name');
			$last_name           = $this->input->post('last_name');
			$tel                 = $this->input->post('tel');
			$email               = $this->input->post('email');
			$birthday            = $this->input->post('birthday');
			$line                = $this->input->post('id_line');
			$address             = $this->input->post('address');
			$province             = $this->input->post('province');
			$amphur             = $this->input->post('amphur');
			$district             = $this->input->post('district');
			$zipcode             = $this->input->post('zipcode');
			$updated_at          = date('Y-m-d H:i:s');
			$c_password          = $this->input->post('c_password');
			$password            = $this->input->post('password');


			if ($password && $c_password == '') {
				$data = array(
					'first_name'        => $first_name,
					'last_name'         => $last_name,
					'tel'               => $tel,
					'email'             => $email,
					'birthday'          => $birthday,
					'line'              => $line,
					'address'           => $address,
					'province'           => $province,
					'amphur'           => $amphur,
					'district'           => $district,
					'zipcode'           => $zipcode,
					'updated_at'	    => $updated_at

				);

				$this->db->where('id', $id);
				$success = $this->db->update('tbl_member', $data);

				if ($success > 0) {
					$this->session->set_flashdata('save_ss2', 'อัพเดตข้อมูลโปรไฟล์สำเร็จแล้ว');
				} else {
					$this->session->set_flashdata('del_ss2', 'อัพเดตข้อมูลไม่สำเร็จ');
				}
				return redirect('Profile');
			} else {
				if ($password == $c_password) {
					$data = array(
						'first_name'        => $first_name,
						'last_name'         => $last_name,
						'tel'               => $tel,
						'email'             => $email,
						'birthday'          => $birthday,
						'line'              => $line,
						'address'           => $address,
						'province'           => $province,
						'amphur'           => $amphur,
						'district'           => $district,
						'zipcode'           => $zipcode,
						'password'			=> md5($password),
						'updated_at'	    => $updated_at

					);

					$this->db->where('id', $id);
					$success = $this->db->update('tbl_member', $data);

					if ($success > 0) {
						$this->session->set_flashdata('save_ss2',  'อัพเดตข้อมูลโปรไฟล์สำเร็จแล้ว ');
					} else {
						$this->session->set_flashdata('del_ss2', 'อัพเดตข้อมูลไม่สำเร็จ');
					}
					return redirect('Profile');
				} else {
					echo "<script>";
					echo "alert('กรุณากรอก Password ให้ตรงกัน !!!');";
					echo "window.location='Profile';";
					echo "</script>";
				}
			}
		} else {
			redirect('Login', 'refresh');
		}
	}
}