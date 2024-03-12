<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

class BookController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel("Books");
        $this->viewBuilder()->setLayout("Booklayout");
    }


    
    public function index()
    {
   $books=$this->Books->find("all",[
            "order"=>["id"=>"desc"]
        ]);
   $this->set("title", "book-list");
   $this->set("books", $books);
    }
    
    public function create()
    {
        $this->set("title", "create book");

    }

   
    public function edit()
    {
            // print_r($this->request->data);

        //ye function called when we will click on edit
        $this->set("title", "edit book");
        $form_data = $this->request->data;
        $book=$this->Books->get($form_data['bookID']);
      
        $book->book_name=$form_data['book_name'];
        $book->email=$form_data['email'];
        $book->author=$form_data['author'];
        $book->description=$form_data['description'];  
      
        $this->Books->save($book);
        $this->Flash->set("book has been updated",
        [
         "element"=>"book_success"
        ]);
        $this->redirect(["action" => "update/".$form_data['bookID']]);
        }
 
  
    
    public function update($id)
    {
      
        $id = (int)$id;
        $book = $this->Books->get($id);
        $this->set("title", "update book");
        $this->set("book", $book); 
  
    }
    public function delete($id)
    {
        // $this->set("title", "delete book");
        // print_r($id); die;
        $book=$this->Books->get($id);
        $this->Books->delete($book);
        $this->Flash->set("book has been deleted",
        [
         "element"=>"book_success"
        ]);
        $this->redirect(["action" => "index/"]);
        }
   
        public function save()
    {
        $this->autoRender = false;
        // print_r($this->request->data);
        $book = $this->Books->newEntity($this->request->getData());
        

        $validation = $book->errors();
    
        if (!empty($validation)) {
            // There are errors
            print_r($validation);
            $this->Flash->set($validation, [
                "element" => "book_error"
            ]);
        } 
        else {  

           $form_data=$this->request->getData();
        //    print_r($this->request->data);die;

        $uploaded_path = "/img/uploads/";
        $tmp_name = $this->request->data['file']['tmp_name'];

           //image is valid or not is checked by getimagesize
         $validImage= getimagesize($tmp_name);

         if($validImage===FALSE){
             //if image is not valid
             print_r($this->request->data);
             $this->Flash->set("Image file is not valid",
             [
              "element"=>"book_error"
             ]);
         }

         else{
            //if image is valid
            $image_name = $this->request->data['file']['name'];
      
            if(move_uploaded_file($tmp_name, WWW_ROOT. $uploaded_path."/".$image_name)) {
                $book->book_name=$form_data['book_name'];
                $book->email=$form_data['email'];
                $book->author=$form_data['author'];
                $book->description=$form_data['description'];  
                $book->img=$uploaded_path."/".$image_name;  
    
                $this->Books->save($book);
                $this->Flash->set("book has been successfully added to database",
                [
                 "element"=>"book_success"
                ]);

         }
          else{
            $this->Flash->set("Image file has not been uploaded",
            [
             "element"=>"book_error"
            ]);

        }
       
        }
        $this->redirect(["action" => "create"]);
    }
}
}
?>



