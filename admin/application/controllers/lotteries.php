<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Lotteries extends MY_Controller{

	function index()
	{
		$this->view_data['lotteries'] = Lottery::find_by_sql('SELECT * FROM lotteries');
		$this->content_view = 'lotteries/all';
	}

	function create(){
		if($_POST){
			unset($_POST['send']);
			$_POST['start_date'] = date('d/m/Y', strtotime($_POST['start_date']));
			$_POST['end_date'] = date('d/m/Y', strtotime($_POST['end_date']));
			$_POST = array_map('htmlspecialchars', $_POST);
			$lotteries = Lottery::create($_POST);
       		if(!$lotteries){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_create_item_error'));}
       		else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_create_item_success'));}
			redirect('lotteries');
			
		}else
		{
			$this->theme_view = 'modal';
			$this->view_data['title'] = $this->lang->line('application_create_item');
			$this->view_data['form_action'] = 'lotteries/create';
			$this->content_view = 'lotteries/_lotteries';
		}	
	}
	function update($id = FALSE){
		if($_POST){
			unset($_POST['send']);
			$_POST = array_map('htmlspecialchars', $_POST);
			$id = $_POST['id'];

			if($this->verify_status($id) === true){
				$lotteries = Lottery::find($id);
				$lotteries = $lotteries->update_attributes($_POST);

				if(!$lotteries){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_item_error'));}
       			else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_item_success'));}
       			redirect('lotteries');
			}else{
				$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_lottery_status_error'));
				redirect('lotteries');
			}
       		
			
			
		}else
		{
			$this->view_data['lotteries'] = Lottery::find($id);
			$this->theme_view = 'modal';
			$this->view_data['title'] = $this->lang->line('application_edit_item');
			$this->view_data['form_action'] = 'lotteries/update';
			$this->content_view = 'lotteries/_lotteries';
		}	
	}
	function delete($id = FALSE){
		$lotteries = Lottery::find($id);
		$lotteries->delete();
		if(!$lotteries){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_item_error'));}
       	else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_item_success'));}
		redirect('lotteries');
	}

	function verify_status($id){

		$this->exist_active = Lottery::find('all');

		foreach ($this->exist_active as $key) {

			if($this->exist_active[0]->status == 'Active' && $this->exist_active[0]->id != $id){
				return false;
			}
		}

		return true;
	}	

	}

?>
