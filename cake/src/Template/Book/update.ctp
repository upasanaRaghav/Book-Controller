<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Edit details</h3>
        <!-- using form helper -->
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
            "url"=>["action"=>"edit"],
            "class"=>"form-horizontal"
        ]
        );

?>
<input type="hidden" value="<?php echo $book->id ?>" name="bookID"/>    
     
<label for="bookName">Book Name:</label>
        <input type="text" class="form-control" id="book_name" value="<?php echo $book->book_name;?>" placeholder="Enter book name" name="book_name">
    </div>

   
    <div class="form-group">
        <label for="author">Email:</label>
        <input type="email" class="form-control" id="email" value="<?php echo $book->email;?>" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="text">Author</label>
        <input type="text" class="form-control" id="author" value="<?php echo $book->author;?>" placeholder="Enter the Author's Name" name="author">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" placeholder="Enter description" name="description"><?php echo isset($book) ? ($book->description) : ''; ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>
