<?php

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');">
<?php 
if(isset($message["book_name"]['_empty'])){
    echo "<p><b>Book Name: </b> ".$message["book_name"]['_empty']."</p>";
}
if(isset($message["book_name"]['length'])){
    echo "<p><b>Book Name length</b>: ".$message["book_name"]['length']."</p>";
}
if(isset($message["email"]['_empty'])){
    echo "<p><b>Email</b>: ".$message["email"]['_empty']."</p>";
}
if(isset($message["email"]['valid_email'])){
    echo "<p><b>Email</b>: ".$message["email"]['valid_email']."</p>";
}
if(isset($message["author"]['_empty'])){
    echo "<p><b>Author</b>: ".$message["author"]['_empty']."</p>";
}
if(isset($message["author"]['length'])){
    echo "<p><b>Author name</b>: ".$message["author"]['length']."</p>";
}

?>
</div>
