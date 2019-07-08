<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller
{
	public $data;
	 public function __construct() {
        Parent::__construct();
        $this->load->model("books_model");
    }
     public function index()
     {
          $this->load->view("books/index.php", array());
     }

     public function books_page()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $books = $this->books_model->get_books();

          $data = array();
          foreach($books as $r) {
          	$actionLinks = '<button class="btn"><a href="'.base_url().'books/edit/'.$r['ID'].'" title="Edit"><i class="fa fa-edit"></i></a></button>&nbsp;<button class="btn" onclick="deleteData('.$r['ID'].')"><a href="javascript:void(0);" title="Edit"><i class="fa fa-trash"></i></a></button>';

               $data[] = array(
                    $r['name'],
                    $r['price'],
                    $r['author'],
                    $r['rating']. "/10 Stars",
                    $r['publisher'],
                    $actionLinks
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => count($books),
                 "recordsFiltered" => count($books),
                 //"recordsFiltered" => $books->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }

     public function deleteData(){
     	$deleteId = $_POST['id'];
     	
     	$this->db->where('ID', $deleteId);
     	if ($this->db->update('books', $data=array('is_deleted'=>1))) {
            echo 1;
        } else {
            echo 0;
        }
     }

     // update the users detail
    public function edit($id = '') {

    	$books = $this->books_model->get_books_by_id($id);
    	if (!empty($books)) {
            $this->data['book_detail'] = $books[0];
            $this->load->view('books/edit', $this->data);
        } else {
            $this->session->set_flashdata('error', 'Something went wrong! Try Again.');
            redirect('books');
        }
    }

    public function editData(){
    	$book_id = $_POST['book_id'];
      $book_title = $_POST['book_title'];
      $book_price = $_POST['book_price'];
      $book_author = $_POST['book_author'];
      $book_publisher = $_POST['book_publisher'];
      //$book_image = $_FILES['book_image'];
      echo '<pre>';
      print_r($_FILES);
      exit;

      $data = array('name'=>$book_title, 'price'=>$book_price, 'author'=>$book_author , 'publisher' =>$book_publisher , 'rating' =>8);

      echo $books = $this->books_model->update_data($data, 'books', 'ID', $book_id);
      exit;
    }
}
?>