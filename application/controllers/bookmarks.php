<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Bookmarks extends CI_Controller {

	public function index()
	{
		$this->load->view('form');
	}

	public function form()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "required|min_length[5]|max_length[45]");
		$this->form_validation->set_rules("url", "URL", "required|valid_url");
		$this->form_validation->set_rules("folder", "Folder", "required");
		if($this->form_validation->run() === FALSE)
		{
			$this->view_data["errors"] = validation_errors();
			$this->load->view('form', $this->view_data);
		}
		else
		{

        	$this->load->model("Bookmark"); //loads the model
			$name = $this->input->post('name');
			$url = $this->input->post('url');
			$folder = $this->input->post('folder');
			$bookmark_details = array(
				'name' => $name,
				'url' => $url,
				'folder' => $folder
			);
			$add_bookmark = $this->Bookmark->add_bookmark($bookmark_details);  //calls the get_bookmark_by_id method
			if($add_bookmark === TRUE) {
				echo "bookmark is added!";
				redirect("bookmarks/show");
			}
		}
	}

	public function show()
	{
		$this->output->enable_profiler(TRUE); 
        $this->load->model("Bookmark"); 
		$view_data['bookmarks'] = $this->Bookmark->get_all_bookmarks();
		$this->load->view('form', $view_data);
	}

	public function destroy($id)
	{
		$this->output->enable_profiler(TRUE); //enables the profiler
        $this->load->model("Bookmark"); //loads the model
		$view_data['to_destroy'] = $this->Bookmark->get_bookmark_by_id($id);
		$view_data['id'] = $id;
		$this->load->view('delete', $view_data);
	}

	public function delete($delete_id)
	{
		echo $delete_id. "success";
		$this->output->enable_profiler(TRUE); //enables the profiler
        $this->load->model("Bookmark"); //loads the model
		$this->Bookmark->delete_by_id($delete_id);
		redirect("bookmarks/show");
	}
}
?>