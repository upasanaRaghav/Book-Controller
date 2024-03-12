<div class="row">
  <div class="primary">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Book-List</h3>
        <?php
          echo $this->Html->link(
            "+ Add Book",
            "/book/create",
            [
              "class" => "btn btn-success pull-right",
              "style" => "margin-top: -25px",
            ]
          );
        ?>
      </div>
      <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Book Name</th>
              <th>Email</th>
              <th>Author</th>
              <th>Description</th>
              <th>Book Image</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = 1;
              foreach ($books as $key => $book) {
            ?>
              <tr class="info">
                <td><?= $count++ ?></td>
                <td><?= $book->book_name ?></td>
                <td><?= $book->email ?></td>
                <td><?= $book->author ?></td>
                <td><?= $book->description ?></td>
                <td>
  <?php
    if (empty($book->img)) {
      echo 'NA';
    } else {
      echo '<img src="' . $this->Url->image($book->img) . '" style="height:50px; width:50px">';
    }
  ?>
</td>
<td>
   <?= $this->Html->link(
                    "Edit",
                    "/book/update/" . $book->id,
                    [
                      "class" => "btn btn-success pull-right",
                      "style" => "margin-left: 5px",
                    ]
                  ); ?>

                  <?= $this->Html->link(
                    "Delete",
                    "/book/delete/" . $book->id,
                    [
                      "class" => "btn btn-danger pull-right",
                      "style" => "margin-left: 5px",
                    ]
                  ); ?>
                </td>
              </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
