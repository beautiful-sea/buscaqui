<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categories extends MY_Controller{

	function index()
	{
		$this->view_data['categories'] = Category::find('all',array('conditions' => array('inactive=?','0')));
		$this->view_data['subcategories'] = Subcategory::find_by_sql('
			SELECT a.id,a.name,a.idcategory, b.name as namecategory FROM subcategories as a
			INNER JOIN categories as b ON(b.id = a.idcategory) ');
		$this->content_view = 'categories/all';
	}

	function create_categories(){
		if($_POST){
			unset($_POST['send']);
			$_POST['inactive'] = 0;
			$_POST = array_map('htmlspecialchars', $_POST);
			var_dump($_POST);
			$categories = Category::create($_POST);
       		if(!$categories){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_create_item_error'));}
       		else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_create_item_success'));}
			redirect('categories');
			
		}else
		{
			$this->theme_view = 'modal';
			$this->view_data['title'] = $this->lang->line('application_create_item');
			$this->view_data['form_action'] = 'categories/create_categories';
			$this->content_view = 'categories/_categories';
		}	
	}
	function update_categories($id = FALSE){
		if($_POST){
			unset($_POST['send']);
			$_POST = array_map('htmlspecialchars', $_POST);
			$id = $_POST['id'];
			$categories = Category::find($id);
			$categories = $categories->update_attributes($_POST);
       		if(!$categories){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_item_error'));}
       		else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_item_success'));}
			redirect('categories');
			
		}else
		{
			$this->view_data['categories'] = Category::find($id);
			$this->theme_view = 'modal';
			$this->view_data['title'] = $this->lang->line('application_edit_item');
			$this->view_data['form_action'] = 'categories/update_categories';
			$this->content_view = 'categories/_categories';
		}	
	}
	function delete_categories($id = FALSE){
		$categories = Category::find($id);
		$categories->inactive = 1;
		$categories->save();
		if(!$categories){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_item_error'));}
       	else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_item_success'));}
		redirect('categories');
	}	

	//SUBCATEGORIAS

	function create_subcategories(){
		if($_POST){
			unset($_POST['send']);
			$_POST = array_map('htmlspecialchars', $_POST);
			$subcategories = Subcategory::create($_POST);
       		if(!$subcategories){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_create_item_error'));}
       		else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_create_item_success'));}
			redirect('categories');
			
		}else
		{
			$this->theme_view = 'modal';
			$this->view_data['title'] = $this->lang->line('application_create_item');
			$this->view_data['form_action'] = 'categories/create_subcategories';
			$this->view_data['categories']	= Category::find("all");
			$this->content_view = 'categories/_subcategories';
		}	
	}
	function update_subcategories($id = FALSE){
		if($_POST){
			unset($_POST['send']);
			$_POST = array_map('htmlspecialchars', $_POST);
			$id = $_POST['id'];
			$subcategories = Subcategory::find($id);
			$subcategories = $subcategories->update_attributes($_POST);
       		if(!$subcategories){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_item_error'));}
       		else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_item_success'));}
			redirect('categories');
			
		}else
		{	
			$this->view_data['subcategories'] = Subcategory::find($id);
			$this->view_data['categories']	= Category::find("all");
			$this->theme_view = 'modal';
			$this->view_data['title'] = $this->lang->line('application_edit_item');
			$this->view_data['form_action'] = 'categories/update_subcategories';
			$this->content_view = 'categories/_subcategories';
		}	
	}
	function delete_subcategories($id = FALSE){
		$subcategories = Subcategory::find($id);
		$subcategories->inactive = 1;
		$subcategories->save();
		if(!$subcategories){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_item_error'));}
       	else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_item_success'));}
		redirect('categories');
	}
}


?>
