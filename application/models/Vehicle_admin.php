<?php
class Vehicle_admin extends CI_Model 
{
	public function get_time()
	{
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Calcutta'));
		$get_time= $now->format('Y-m-d H:i:s');
		return $get_time;
	}
	public function login_model()
	{
		$code_email_id=strtolower(stripcslashes(htmlspecialchars(trim($this->input->post('email_id')))));
		$user_password=stripcslashes(htmlspecialchars(trim($this->input->post('password'))));
		$salt=sha1('abcdefghijklmn');
		$password=$user_password.$salt;
		$user_password=sha1($password);
		$where_data=array(
				'code_email_id'=>$code_email_id,
				'pass'=>$user_password
			);
		$result=$this->db->where($where_data)->get('user_management');
		if($result->num_rows()==1)
		{
			$result = $result->row();
			if($result->status==1)
			{
				$management_user_data = array(
								'user_id'  => $result->user_id,
								'user_name'  => $result->first_name.' '.$result->last_name,
								'email'=>$result->email_id,
								'code_email_id'=>$result->code_email_id,
								'type'=>$result->user_type,
								);
				$this->session->set_userdata($management_user_data);
				$this->session->set_flashdata('succ_msg','Welcome '.ucfirst($this->session->userdata('user_name')).' To VTS LoraWan');
				$this->session->set_flashdata('color_msg',"success");
				redirect('Vehicle_controller/dashboard');
			}
			else
			{
				$this->session->set_flashdata('succ_msg','Sorry! Your Account has been Deactivated');
				$this->session->set_flashdata('color_msg',"warning");
				redirect('Vehicle_controller/index');
			}	
		}
		else
		{
			$this->session->set_flashdata('succ_msg','Invalid Email id/Password');
			$this->session->set_flashdata('color_msg',"danger");
			redirect('Vehicle_controller/index');
		}
	}
	public function dashboard()
	{
		return array(
			'total_user'=>$this->db->get('user_management')->num_rows(),
			'total_active_user'=>$this->db->where(['status'=>1])->get('user_management')->num_rows(),
			'total_inactive_user'=>$this->db->where(['status'=>0])->get('user_management')->num_rows(),
			'total_vehicle'=>$this->db->get('vehicle')->num_rows(),
			'total_active_vehicle'=>$this->db->where(['status'=>1])->get('vehicle')->num_rows(),
			'total_inactive_vehicle'=>$this->db->where(['status'=>0])->get('vehicle')->num_rows(),
			'total_device'=>$this->db->get('device_table')->num_rows(),
			'total_active_device'=>$this->db->where(['status'=>1])->get('device_table')->num_rows(),
			'total_inactive_device'=>$this->db->where(['status'=>0])->get('device_table')->num_rows(),
			'total_active_device_free'=>$this->db->where(['status'=>1,'connect'=>0])->get('device_table')->num_rows(),
			'total_active_device_connected'=>$this->db->where(['status'=>1,'connect'=>1])->get('device_table')->num_rows(),
			'total_active_vehicle_free'=>$this->db->where(['status'=>1,'connect'=>0])->get('vehicle')->num_rows(),
			'total_active_vehicle_connected'=>$this->db->where(['status'=>1,'connect'=>1])->get('vehicle')->num_rows(),
			);
	}
	public function my_profile()
	{
		return $this->db->where(['user_id'=>$this->session->userdata('user_id')])->get('user_management')->row();
	}
	public function get_all_management_user()
	{
		return $this->db->select('user_id,first_name,last_name,phone_no,code_email_id,email_id,user_type,status')->order_by('first_name','ASC')->get('user_management')->result();
	}
	public function get_management_user($id)
	{
		return $this->db->select('user_id,first_name,last_name,phone_no,code_email_id,email_id,user_type,status,created_dt')->order_by('first_name','ASC')->where(['user_id'=>$id])->get('user_management')->row();
	}
	public function get_all_vehicle()
	{
		return $this->db->order_by('created_dt','DESC')->get('vehicle')->result();
	}
	public function get_single_vehcile($id)
	{
		return $this->db->query("SELECT v.*, CONCAT(cb.first_name,' ',cb.last_name) as created_by_full_name , CONCAT(mb.first_name,' ',mb.last_name) as modified_by_full_name  FROM vehicle as v LEFT JOIN user_management as cb ON v.created_by=cb.user_id LEFT JOIN user_management as mb  ON v.modified_by=mb.user_id WHERE v.vehicle_id=$id")->row();
	}
	public function get_single_vehcile_details($id)
	{
		return $this->db->where(['vehicle_id'=>$id])->get('vehicle')->row();
	}
	public function get_all_devices()
	{
		return $this->db->select('device_id,device_name,device_id_number,status')->order_by('created_dt','DESC')->get('device_table')->result();
	}
	public function get_single_device($id)
	{
		return $this->db->query("SELECT d.*, CONCAT(cb.first_name,' ',cb.last_name) as created_by_full_name , CONCAT(mb.first_name,' ',mb.last_name) as modified_by_full_name FROM device_table as d LEFT JOIN user_management as cb ON d.created_by=cb.user_id LEFT JOIN user_management as mb  ON d.modified_by=mb.user_id WHERE d.device_id=$id")->row();
	}
	public function get_single_device_details($id)
	{
		return $this->db->where(['device_id'=>$id])->get('device_table')->row();
	}
	public function get_all_active_device_and_vehicle_details()
	{
		return array(
			'active_device'=>$this->db->select('device_id,device_id_number,device_name')->where(['status'=>1,'connect'=>0])->get('device_table')->result(),
			'active_vehicle'=>$this->db->select('vehicle_id,vehicle_number,vehicle_name')->where(['status'=>1,'connect'=>0])->get('vehicle')->result(),
			'currently_connected'=>$this->db->query("SELECT c.connect_table_id,d.device_id,d.device_name,d.device_id_number,v.vehicle_id,v.vehicle_name,v.vehicle_number FROM vehicle as v , device_table as d, connect_table as c WHERE d.device_id=c.device_id AND v.vehicle_id=c.vehicle_id AND c.status=1 order by c.created_dt DESC")->result(),
			);
	}
	public function get_all_connected_devices()
	{
		return $this->db->query("SELECT DISTINCT(c.device_id) as device_id,dt.device_name,dt.device_id_number,dt.connect FROM connect_table as c, device_table as dt WHERE c.device_id=dt.device_id  ORDER by dt.device_name ASC")->result();
	}
	public function get_all_connected_vehicle()
	{
		return $this->db->query("SELECT DISTINCT(c.vehicle_id) as vehicle_id,v.vehicle_name,v.vehicle_number,v.connect FROM connect_table as c, vehicle as v WHERE c.vehicle_id=v.vehicle_id  ORDER by v.vehicle_name ASC")->result();
	}
	public function get_track_of_devices($id)
	{
		return $this->db->query("SELECT c.*, CONCAT(cb.first_name,' ',cb.last_name) as created_by_full_name , CONCAT(mb.first_name,' ',mb.last_name) as modified_by_full_name,d.device_name,d.device_id_number,v.vehicle_name,v.vehicle_number FROM connect_table as c LEFT JOIN vehicle as v on v.vehicle_id=c.vehicle_id LEFT JOIN device_table as d ON d.device_id=c.device_id LEFT JOIN user_management as cb ON c.created_by=cb.user_id LEFT JOIN user_management as mb  ON c.modified_by=mb.user_id WHERE d.device_id=$id ORDER BY c.created_dt DESC")->result();
	}
	public function get_track_of_vehicle($id)
	{
		return $this->db->query("SELECT c.*, CONCAT(cb.first_name,' ',cb.last_name) as created_by_full_name , CONCAT(mb.first_name,' ',mb.last_name) as modified_by_full_name,d.device_name,d.device_id_number,v.vehicle_name,v.vehicle_number FROM connect_table as c LEFT JOIN vehicle as v on v.vehicle_id=c.vehicle_id LEFT JOIN device_table as d ON d.device_id=c.device_id LEFT JOIN user_management as cb ON c.created_by=cb.user_id LEFT JOIN user_management as mb  ON c.modified_by=mb.user_id WHERE v.vehicle_id=$id ORDER BY c.created_dt DESC")->result();
	}
	public function get_vehicle_tracking_report()
	{
		$text_from=date("Y-m-d H:i:s",strtotime($this->input->post('text_from')));
		$text_to=date("Y-m-d H:i:s",strtotime($this->input->post('text_to')));
		
		$query=$this->db->query("SELECT lat_data,long_data FROM track WHERE date(created_dt)>=date('$text_from') and date('$text_to')>=date(created_dt)");
		if($query->num_rows()>0)
		{
			return $this->db->query("SELECT lat_data,long_data,created_dt FROM track WHERE TIME(created_dt)>=TIME('$text_from') and TIME(created_dt)<=TIME('$text_to')  ORDER by Id ASC")->result();
		}	

	}
	
	public function add_management_user_model()
	{
		$first_name=stripcslashes(htmlspecialchars(strtolower(trim($this->input->post('first_name')))));
		$last_name=stripcslashes(htmlspecialchars(strtolower(trim($this->input->post('last_name')))));
		$phone_no=stripcslashes(htmlspecialchars(strtolower(trim($this->input->post('phone_no')))));
		$code_email_id=strtolower(stripcslashes(htmlspecialchars(trim($this->input->post('email_id')))));
		$email_id=stripcslashes(htmlspecialchars(trim($this->input->post('email_id'))));
		$salt=sha1('abcdefghijklmn');
		$user_password='user_123456';
		$password=$user_password.$salt;
		$user_password=sha1($password);

		$query=$this->db->where(['code_email_id'=>$code_email_id])->get('user_management');
		if($query->num_rows()==1)
		{
			$this->session->set_flashdata('succ_msg',ucfirst($email_id).' Email Id Already Added');
			$this->session->set_flashdata('color_msg',"warning");
			redirect('Vehicle_controller/add_management_user');
		}
		else
		{
			$data=array(
					'first_name'=>$first_name,
					'last_name'=>$last_name,
					'phone_no'=>$phone_no,
					'email_id'=>$email_id,
					'code_email_id'=>$code_email_id,
					'pass'=>$user_password,
					'user_type'=>$this->input->post('user_type'),
					'phone_no'=>$phone_no,
					'status'=>1,
					'created_by'=>$this->session->userdata('user_id'),
					'created_dt'=>$this->get_time()
					);
		$this->db->trans_begin();
		$this->db->insert('user_management',$data);
		if ($this->db->affected_rows())
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('succ_msg',ucfirst($email_id).' Email-Id Added Successfully');
			$this->session->set_flashdata('color_msg',"success");
			redirect('Vehicle_controller/add_management_user');
		}
		else
		{  
			$this->db->trans_rollback();
			$this->session->set_flashdata('succ_msg','Database Problem');
			$this->session->set_flashdata('color_msg',"danger");
			redirect('Vehicle_controller/add_management_user');
		}
	  }
	}
	public function edit_user_account_detail_model()
	{	
		
		$email_id=stripcslashes(htmlspecialchars(trim($this->input->post('email_id'))));
		$update_data=array(
					'first_name'=>stripcslashes(htmlspecialchars(strtolower(trim($this->input->post('first_name'))))),
					'last_name'=>stripcslashes(htmlspecialchars(strtolower(trim($this->input->post('last_name'))))),
					'phone_no'=>stripcslashes(htmlspecialchars(strtolower(trim($this->input->post('phone_no'))))),
					'code_email_id'=>strtolower(stripcslashes(htmlspecialchars(trim($this->input->post('email_id'))))),
					'email_id'=>$email_id,
					'user_type'=>$this->input->post('user_type'),
					'status'=>$this->input->post('status'),
					'modified_by'=>$this->session->userdata('user_id'),
					'modified_dt'=>$this->get_time()
					);
		$this->db->trans_begin();
		$this->db->where(['user_id'=>$this->input->post('user_id')])->update('user_management',$update_data);
		if ($this->db->affected_rows())
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('succ_msg',ucfirst($email_id).' Updated Successfully');
			$this->session->set_flashdata('color_msg',"success");
			redirect('Vehicle_controller/view_management_user');
		}
		else
		{  
			$this->db->trans_rollback();
			$this->session->set_flashdata('succ_msg','Database Problem');
			$this->session->set_flashdata('color_msg',"danger");
			redirect('Vehicle_controller/view_management_user');
		}
	}

	public function update_admin_profile()
	{
		$first_name=stripslashes(htmlentities(trim($this->input->post('first_name'))));
		$last_name=stripslashes(htmlentities(trim($this->input->post('last_name'))));
		$phone_no=stripslashes(htmlentities(trim($this->input->post('phone_no'))));

		$update_data=array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'phone_no'=>$phone_no
			);

		$management_user_data = array('user_name'  => $result->first_name.' '.$result->last_name);
		$this->session->set_userdata($management_user_data);
		
		$this->db->trans_begin();
		$this->db->where(['user_id'=>$this->session->userdata('user_id')])->update('user_management',$update_data);
		if ($this->db->affected_rows())
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('succ_msg','Profile Updated Successfully');
			$this->session->set_flashdata('color_msg',"success");
			redirect('Vehicle_controller/my_profile');
		}
		else
		{  
			$this->db->trans_rollback();
			$this->session->set_flashdata('succ_msg','Database Problem');
			$this->session->set_flashdata('color_msg',"danger");
			redirect('Vehicle_controller/my_profile');
		}

	}
	public function change_password_admin()
	{
		$password=stripslashes(htmlspecialchars(trim($this->input->post('old_password'))));
		$salt=sha1('abcdefghijklmn');
		$password=$password.$salt;
		$password=sha1($password);
		$query=$this->db->where(['user_id'=>$this->session->userdata('user_id'),'pass'=>$password])->get('user_management');
		if($query->num_rows()>0)
		{
			
			$password=stripslashes(htmlspecialchars(trim($this->input->post('new_password'))));
			$salt=sha1('abcdefghijklmn');
			$password=$password.$salt;
			$password=sha1($password);

			$this->db->trans_begin();
			$this->db->where(['user_id'=>$this->session->userdata('user_id')])->update('user_management',['pass'=>$password]);
			if ($this->db->affected_rows())
			{
				$this->db->trans_commit();
				$this->session->set_flashdata('succ_msg',"Password Changed Successfully");
				$this->session->set_flashdata('color_msg','success');
				redirect('Vehicle_controller/change_password');
			}
			else
			{  
				$this->db->trans_rollback();
				$this->session->set_flashdata('succ_msg',"Nothing has been Update for Change Password");
				$this->session->set_flashdata('color_msg','danger');
				redirect('Vehicle_controller/change_password');
			}
		}
		else
		{
			$this->session->set_flashdata('succ_msg',"Password Do not Match");
			$this->session->set_flashdata('color_msg','danger');
			redirect('Vehicle_controller/change_password');
		}	
	}
	
	public function add_vehicle_model()
	{
		$vehicle_name=stripcslashes(htmlspecialchars(trim($this->input->post('vehicle_name'))));
		$data=array(
					'vehicle_name'=>$vehicle_name,
					'vehicle_number'=>stripcslashes(htmlspecialchars(trim($this->input->post('vehicle_number')))),
					'rci_number'=>stripcslashes(htmlspecialchars(trim($this->input->post('rci_number')))),
					'fuel_used'=>stripcslashes(htmlspecialchars(trim($this->input->post('fuel_used')))),
					'vehicle_type'=>stripcslashes(htmlspecialchars(trim($this->input->post('vehicle_type')))),
					'vehicle_discription'=>stripcslashes(htmlspecialchars(trim($this->input->post('vehicle_discription')))),
					'owner_name'=>stripcslashes(htmlspecialchars(trim($this->input->post('owner_name')))),
					'owner_address'=>stripcslashes(htmlspecialchars(trim($this->input->post('owner_address')))),
					'status'=>1,
					'created_by'=>$this->session->userdata('user_id'),
					'created_dt'=>$this->get_time()
					);
		
				$this->db->trans_begin();
				$this->db->insert('vehicle',$data);
				if ($this->db->affected_rows())
				{
					$this->db->trans_commit();
					$this->session->set_flashdata('succ_msg',$vehicle_name.' Vehicle Added Successfully');
					$this->session->set_flashdata('color_msg',"success");
					redirect('Vehicle_controller/add_vehicle');
				}
				else
				{  
					$this->db->trans_rollback();
					$this->session->set_flashdata('err_msg','DataBase Problem');
					$this->session->set_flashdata('color_msg',"danger");
					redirect('Vehicle_controller/add_vehicle');
				}
	}
	 public function edit_user_vehicle_detail_model()
	 {
	 	$vehicle_name=stripcslashes(htmlspecialchars(trim($this->input->post('vehicle_name'))));
		$update_data=array(
					'vehicle_name'=>$vehicle_name,
					'vehicle_number'=>stripcslashes(htmlspecialchars(trim($this->input->post('vehicle_number')))),
					'rci_number'=>stripcslashes(htmlspecialchars(trim($this->input->post('rci_number')))),
					'fuel_used'=>stripcslashes(htmlspecialchars(trim($this->input->post('fuel_used')))),
					'vehicle_type'=>stripcslashes(htmlspecialchars(trim($this->input->post('vehicle_type')))),
					'vehicle_discription'=>stripcslashes(htmlspecialchars(trim($this->input->post('vehicle_discription')))),
					'owner_name'=>stripcslashes(htmlspecialchars(trim($this->input->post('owner_name')))),
					'owner_address'=>stripcslashes(htmlspecialchars(trim($this->input->post('owner_address')))),
					'status'=>$this->input->post('status'),
					'modified_by'=>$this->session->userdata('user_id'),
					'modified_dt'=>$this->get_time()
					);
		
				$this->db->trans_begin();
				$this->db->where(['vehicle_id'=>$this->input->post('vehicle_id')])->update('vehicle',$update_data);
				if ($this->db->affected_rows())
				{
					$this->db->trans_commit();
					$this->session->set_flashdata('succ_msg',$vehicle_name.' Vehicle Updated Successfully');
					$this->session->set_flashdata('color_msg',"success");
					redirect('Vehicle_controller/view_all_vehicle');
				}
				else
				{  
					$this->db->trans_rollback();
					$this->session->set_flashdata('err_msg','DataBase Problem');
					$this->session->set_flashdata('color_msg',"danger");
					redirect('Vehicle_controller/view_all_vehicle');
				}
	}
	public function add_device_model()
	{
		$device_id_number=stripcslashes(htmlspecialchars(trim($this->input->post('device_id_number'))));
		$code_device_id_number=strtolower(stripcslashes(htmlspecialchars(trim($this->input->post('device_id_number')))));
		
		$query=$this->db->where(['code_device_id_number'=>$code_device_id_number])->get('device_table');
		if($query->num_rows()==1)
		{
			$this->session->set_flashdata('succ_msg',$code_device_id_number.' Device Id Already Added');
			$this->session->set_flashdata('color_msg',"warning");
			redirect('Vehicle_controller/add_device');
		}
		else
		{
			$data=array(
					'device_name'=>stripcslashes(htmlspecialchars(trim($this->input->post('device_name')))),
					'device_id_number'=>$device_id_number,
					'code_device_id_number'=>$code_device_id_number,
					'status'=>1,
					'created_by'=>$this->session->userdata('user_id'),
					'created_dt'=>$this->get_time()
					);
		$this->db->trans_begin();
		$this->db->insert('device_table',$data);
		if ($this->db->affected_rows())
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('succ_msg',$code_device_id_number.' Device Added Successfully');
			$this->session->set_flashdata('color_msg',"success");
			redirect('Vehicle_controller/add_device');
		}
		else
		{  
			$this->db->trans_rollback();
			$this->session->set_flashdata('succ_msg','Database Problem');
			$this->session->set_flashdata('color_msg',"danger");
			redirect('Vehicle_controller/add_device');
		}
	  }
	}
	public function edit_device_detail_model()
	{
	 	$device_id_number=stripcslashes(htmlspecialchars(trim($this->input->post('device_id_number'))));
		$code_device_id_number=strtolower(stripcslashes(htmlspecialchars(trim($this->input->post('device_id_number')))));
		
		$update_data=array(
					'device_name'=>stripcslashes(htmlspecialchars(trim($this->input->post('device_name')))),
					'device_id_number'=>$device_id_number,
					'code_device_id_number'=>$code_device_id_number,
					'status'=>$this->input->post('status'),
					'modified_by'=>$this->session->userdata('user_id'),
					'modified_dt'=>$this->get_time()
					);
		
				$this->db->trans_begin();
				$this->db->where(['device_id'=>$this->input->post('device_id')])->update('device_table',$update_data);
				if ($this->db->affected_rows())
				{
					$this->db->trans_commit();
					$this->session->set_flashdata('succ_msg',$device_id_number.' Device Id Updated Successfully');
					$this->session->set_flashdata('color_msg',"success");
					redirect('Vehicle_controller/view_device');
				}
				else
				{  
					$this->db->trans_rollback();
					$this->session->set_flashdata('err_msg','DataBase Problem');
					$this->session->set_flashdata('color_msg',"danger");
					redirect('Vehicle_controller/view_device');
				}
	}
	public function connect_device_model()
	{
		$insert_data=array(
			'device_id'=>$this->input->post('device_id'),
			'vehicle_id'=>$this->input->post('vehicle_id'),
			'status'=>1,
			'created_by'=>$this->session->userdata('user_id'),
			'created_dt'=>$this->get_time()
			);
		$this->db->trans_begin();
		$this->db->insert('connect_table',$insert_data);
		$this->db->where(['device_id'=>$this->input->post('device_id')])->update('device_table',['connect'=>1]);
		$this->db->where(['vehicle_id'=>$this->input->post('vehicle_id')])->update('vehicle',['connect'=>1]);
		if ($this->db->affected_rows())
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('succ_msg',$device_id_number.' Device Connect Successfully');
			$this->session->set_flashdata('color_msg',"success");
			redirect('Vehicle_controller/connect_device');
		}
		else
		{  
			$this->db->trans_rollback();
			$this->session->set_flashdata('err_msg','DataBase Problem');
			$this->session->set_flashdata('color_msg',"danger");
			redirect('Vehicle_controller/connect_device');
		}
	}	
	public function remove_connect_device_model($id,$device_id,$vehicle_id)
	{
		$update_data=array(
			'status'=>0,
			'modified_by'=>$this->session->userdata('user_id'),
			'modified_dt'=>$this->get_time()
			);
		$this->db->trans_begin();
		$this->db->where(['connect_table_id'=>$id])->update('connect_table',$update_data);
		$this->db->where(['device_id'=>$device_id])->update('device_table',['connect'=>0]);
		$this->db->where(['vehicle_id'=>$vehicle_id])->update('vehicle',['connect'=>0]);
		if ($this->db->affected_rows())
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('succ_msg',$device_id_number.' Connection Removed Successfully');
			$this->session->set_flashdata('color_msg',"success");
			redirect('Vehicle_controller/connect_device');
		}
		else
		{  
			$this->db->trans_rollback();
			$this->session->set_flashdata('err_msg','DataBase Problem');
			$this->session->set_flashdata('color_msg',"danger");
			redirect('Vehicle_controller/connect_device');
		}
	}
	public function get_latest_location()
	{
		return $this->db->select('*')->order_by('id',"desc")->get('track')->row();
	}
	
	public function full_track_device()
	{
		return $this->db->order_by('id','asc')->get('track')->result();
	}
	public function clear_database()
	{
		$this->db->query("TRUNCATE TABLE track");
		$this->session->set_flashdata('err_msg','Data clear Successfully');
		$this->session->set_flashdata('color_msg',"success");
		redirect('Vehicle_controller/main_functions');
	}
	public function get_switch()
	{
		return $this->db->get('trigger_working')->row();	
	}
	public function switch_on()
	{
		$this->db->where(['id'=>1])->update('trigger_working',['switch_on_off'=>1]);
		redirect('Vehicle_controller/main_functions');
	}
	public function switch_off()
	{
		$this->db->where(['id'=>1])->update('trigger_working',['switch_on_off'=>0]);
		redirect('Vehicle_controller/main_functions');
	}
	public function get_online_data()
	{
		$check=$this->db->get('trigger_working')->row()->switch_on_off;
		if($check==1)
		{
			$username="p-mahavircasters";
			$password = "rvn38beonni2bip8dfau";
			$data = base64_encode($username.":".$password);
			$ch = curl_init('https://data.iot.tatacommunications.com/rest/nodes/A84041000181B618?all=true');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Basic '.$data));

			$result = curl_exec($ch);
			curl_close($ch);
			
			$x=json_decode($result,true);
			
			$system_date=date("Y-m-d",strtotime($x['last_reception']));
			$current_date=date("Y-m-d",strtotime($this->get_time()));

			if($system_date!=$current_date)
			{
				return array('status'=>'Stop','device_status'=>"OFF",'engine_status'=>"OFF","comment"=>"Old Date Data is Coming");
			}
				
			$time1 = strtotime($this->get_time());
			$time2 = strtotime('+5 hours +30 minutes',strtotime($x['last_reception']));
			
			$difference = round(abs($time2 - $time1) / 60,2);
			if($difference>59)					// 59 minitues
			{
				$device_status="OFF";
			}
			else
			{
				$device_status="ON";
			}


			$time2 = strtotime('+5 hours +30 minutes',strtotime($x['last_reception']));
			
			$difference = round(abs($time2 - $time1) / 60,2);
			if($difference>29)				// 29 minutes 
			{
				$engine_status="OFF";
			}
			else
			{
				$engine_status="ON";
			}
			
			$server_data=$x['latitude'].'	,'.$x['longitude'];
			$x[0]=$x['latitude'];
			$x[1]=$x['longitude'];
			
			$insertion_check=$this->db->select('main_data')->order_by('id','DESC')->get('track')->row()->main_data;
			
			if($insertion_check==$server_data)
			{
				return array('status'=>'Stop','device_status'=>$device_status,'engine_status'=>$engine_status,"comment"=>"Same Data is Coming");
			}
			else if($server_data==',')
			{
				return array('status'=>'Stop','device_status'=>$device_status,'engine_status'=>$engine_status,"comment"=>"No Co-ordinates are Coming");
			}	
			else
			{
				$data=array(
							'lat_data'=>$x[0],
							'long_data'=>$x[1],
							'main_data'=>$server_data,
							'created_dt'=>$this->get_time()
							);
				
				$this->db->trans_begin();
				$this->db->insert('track',$data);
				if ($this->db->affected_rows())
				{
					$this->db->trans_commit();
					return array('status'=>"Moving",'device_status'=>$device_status,'engine_status'=>$engine_status,"comment"=>"Data Insert");
				}
				else
				{  
					$this->db->trans_rollback();
					return array('status'=>"Database Problem",'device_status'=>$device_status,'engine_status'=>$engine_status,"Comment"=>"Database Problem");
				}
			}	
		}
		else
		{
			return array('status'=>"0",'device_status'=>$device_status,'engine_status'=>$engine_status,"Comment"=>"Device is Off");
		}	
		
	}
	public function get_online_data_fake()
	{
		return $this->db->get('fake_data')->row();
	}	
}	