<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Enter the book details</h3>
        
        <?php
          echo $this->Html->link(
            "< Back",
            "/book",
            [
              "class" => "btn btn-success pull-right",
              "style" => "margin-top: -25px",
            ]
          );
        ?>
     
    </div>
      <div class="panel-body">

<?php
    echo $this->Form->create(
        null,
        [
            "url"=>["action"=>"save"],
            "type"=>"file",
            "class"=>"form-horizontal"
        ]
        );

?>
    <div class="form-group">
        <label for="book_name">Book Name:</label>
        <input type="text" class="form-control" id="book_name" placeholder="Enter book name" name="book_name">
    </div>

    <div class="form-group">
        <label for="author">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" placeholder="Enter the Author's Name" name="author">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" placeholder="Enter description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="description">Upload File:</label>
          <input type="file" name="file" id="form-data"/>
      </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
