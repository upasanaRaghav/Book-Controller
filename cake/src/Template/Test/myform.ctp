<h4> Craeted a fucntion inside the Test Controller </h4>

<?php 

echo $this->Form->create(null, [
    "url" => ["controller" => "Test",
     "action" => "myform2"],
    "type" => "file"
]);

    echo $this->Form->text("name",
     ["class" => "owt-class",
      "value" => "Upasana",
       "id" => "form-id"]);
    
       echo "<br/>";
       echo "<br/>";

    echo $this->Form->file("submitteddata");
    echo "<br/>";
    echo "<br/>";

    echo $this->Form->textarea("txtArea", ["rows" => 3, "cols" => 10, "value" => "Upasana is amazing"]);
    echo "<br/>";
    echo "<br/>";


    echo $this->Form->button("Submit");
    echo "<br/>";

    echo $this->Form->end();
?>



<?php 
