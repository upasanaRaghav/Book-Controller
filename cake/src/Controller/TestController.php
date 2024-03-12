<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
// use Cake\Validation\Validator;

class TestController extends AppController{
private $connection;   
private $table;

public function initialize(){
        parent :: initialize();
        $this->viewBuilder()->setLayout('custom');
        $this->connection=ConnectionManager::get('default');
        $this->table=TableRegistry::get('employees');
        $this->loadModel("Fruits");  //the model is loaded
    }

   //validation by model
    public function validatdatabymodel(){
    $this->autoRender = false;
    $req_data = [
        "email",
        "password"=>"rupal",
        "confirm_password"=>"rupali"
    ];

    $this->loadModel("Tests");
    $validation=$this->Tests->newEntity($req_data);
    $validationErrors = $validation->errors(); 
    if(!empty($validationErrors)){
    //errors
    print_r($validationErrors);
} else {
    // passed
    echo "Successfully Passed";

    }
}




//data validation . code for data validation by controller


public function dataValidator(){
    $this->autoRender = false; //no need to create template file

    $validator = new Validator();
    $req_data = array(
        "name" => "",
        "email" => "",
        "url" => ""
    );

    // Rules for name
    $validator
        ->requirePresence("name", "create", "Name field should be needed")
        ->add("name", 'length', [
            "rule" => ['minLength', 6],
            "message" => "Name field should not be empty and should have a minimum length of 6 characters"
        ]);


    // Rules for email
$validator
->requirePresence("email", "create", "Email field should be needed")
->add("email", [
    "email" => [
        "rule" => ["email"],
        "message" => "Invalid email"
    ]
])
->notEmptyString("email", "Email field should not be empty")
->email("email", false, "Invalid email format");

    // Rules for URL
    $validator
        ->allowEmptyString("url")
        ->url("url", "Invalid URL format");

    $validation = $validator->errors($req_data);

    if(!empty($validation)){
        // Errors
        print_r($validation);
    } else {
        echo "Data is correct, passed successfully";
    }
}




    public function deleteModel(){
        $this->autoRender=false; //no need to create template file
        // $data=$this->Fruits->get(8);
        // $this->Fruits->delete($data);

        //now deleting using query object

        $data = $this->Fruits->query();
        $data->delete()->where([
            "id"=>3
        ])->execute();


    }
    public function updateModel(){
        $this->autoRender=false; //no need to create template file
        // $data=$this->Fruits->get(1);
        // $data->name="CuteApple";
        // $data->description="CuteApple is extended version of apple";
        // $this->Fruits->save($data);

        //another methos also known as query method can b eused for updation
    
            $query = $this->Fruits->query();
        
            $data = $query->update()
                ->set([
                    'name' => 'UpdatedGrapes',
                    'description' => 'UpdatedGrapes is an extended version of grapes'
                ])
                ->where([
                    'id' => 2
                ])
                ->execute();
        }
        
    public function getDataModel(){
        $this->autoRender=false; //no need to create template file
       $data=$this->Fruits->find("all", [
        //add conditions if needed rn it will print whole db
       ])->toArray();
        //   print_r($data);

          //now trying to get the values using for each loop
          //this will give the name and description of each fruits inside the table/model
          foreach($data as $key=> $value){
            echo "Name ".$value->name."<br/> Notes: ".$value->description."<br/><br/> ";
          }
    }

    public function insertModel(){
        $this->autoRender=false;
        //creating instance of fruit table/model
        //creating using data entry
    //    $fruitObj=$this->Fruits->newEntity();

    //    //uploading values in the database inside fruits table

    //    $fruitObj->name ="Apple";
    //    $fruitObj->description="An apple a day keeps the doctor away";

    //    //saving the values in th database
    //    $this->Fruits->save($fruitObj);

       
    //another method to insert data using query object
       $fruitObjQuery = $this->Fruits->query();
    
        // Insert the first fruit
    $fruitObjQuery->insert(['name', 'description'])
    ->values([
        'name' => 'Grapes',
        'description' => 'They are sour as well as sweet'
    ])
    ->execute();

// Insert the second fruit
$fruitObjQuery->insert(['name', 'description'])
    ->values([
        'name' => 'Banana',
        'description' => 'Rich in potassium'
    ])
    ->execute();

// Insert the third fruit
$fruitObjQuery->insert(['name', 'description'])
    ->values([
        'name' => 'Strawberry',
        'description' => 'Sweet and juicy'
    ])
    ->execute();
}


 public function insertdata(){
     $this->connection->insert("employees",[
        "name"=> "anchal",
        "email"=> "anchal@gmail.com",
        "mobile" => "7894561230"
     ]);
    //update
    $this->connection->update ("employees",[
        "email"=>"ups@gmail.com"
    ],[ 

        "id"=>1// conditions here
]);
    
    //delete
    $this->connection->delete ("employees", [
        "id"=>3 // delete conditions


    ]);

 }

public function tabledata()
{
    $this->autoRender=false;
    $tableIns=$this->table->newEntity(); 
    $tableIns->name="priyam";
    $tableIns->email="priyam@gmail.com";
    $tableIns->mobile="8524568708";
    
    $this->table->save($tableIns);

    //second method for tabledata
    // $this->autoRender=false;
    // $tableIns=$this->table->newEntity(); 
    // $tableIns[name]"tripti";
    // $tableIns[emai]"tripti@gmail.com";
    // $tableIns[mobile]"8024568708";
    
    // $this->table->save($tableIns);
    // echo $tableIns->id;


}

 public function selectdata() {
    // assoc Fetch a result row as an associative array:
    $this->autoRender = false;
    // $datas = $this->connection->execute("SELECT * from employees where id = :id", ["id" => 2])->fetch("assoc");
    $datas = $this->connection->execute("SELECT * from employees")->fetchAll("assoc");

    print_r($datas);
    // echo $datas['name'];

    foreach ($datas as $data) {
        echo $data['name']. " ," .$data['mobile'], "</br>";
    }
}

public function selecttable(){
    $this->autoRender=false;

    $datas= $this->table->find("all",["condition"=>["id"=>2]])
    ->toArray(); //can also toList()
    print_r($datas);
}
    public function index(){
    // $this->autoRender=false;  //over here we are using autorender because
    //we do not have the view defined . we can remove it as we have now created the index.php file in the Test folder that
    // we created in the template folder structure
    // echo " <h1> Helloooooooooo  </h1>"; 

    // we have defined the method in the template/Test?index.php file and now its simply going to render
// meaning we can define the  function over here and its defination is in the index.php file present in template

//lets now pass the parameters from controller to the the 
//template 

$this->set("name", "Upasana Raghav"); //access using $name
$this->set("hobby", "Sleeping"); //access using $hobby


// //we can create a array also

$AllHobbies= array(
    "Writer" => "Upasana Raghav",
    "BookWritten" => "Falling",
    "platform" => "wattpad"

);
$this->set("data", $AllHobbies); //we'll fetch using $data variable


//fetching array val using compact function

$this -> set(compact("AllHobbies"));

//there are two methods to use this data. we can fetch this data as in show it in two ways -->
}


public function indexWithParam(){

//  $this -> set(compact('param1','param2'));
print_r($this->request->params["pass"]);
// $param1 =$this->request->params['pass'][0]; //passed the parameter to the controller
// $param2 =$this->request->params['pass'][1]; //passed the parameter to the controller
// echo $param1."<br>";
// echo $param2."<br>";
// $this->set("name", ['param1','param2']); //access using $name
// $param1 = "abc";
// $param2 = "abc";

}

// public function showMessage(){
//     $this->Flash->set('Form is submitted successfully');
// }

public function showMessage(){

    $this->Flash->set('Form is submitted successfully',  [
        'element' => 'error'
                
    ]);
}

public function myform2(){
    $this->viewbuilder()->layout(false);   
if ($this->request->is("post")) {
        $data = $this->request->data;
        print_r($data);
    }
}


public function myform(){
    $this->viewbuilder()->layout(false);   

    if ($this->request->is("post")) {
        $data = $this->request->data;
        print_r($data);
    }
}

public function customfunction(){
    $this->viewbuilder()->layout(false);   

}
}
?>

