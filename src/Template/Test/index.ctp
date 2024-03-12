<?php
//breadcrumbs
// $this->Breadcrumbs->add(
//     'Products',
//     ['controller' => 'Test', 'action' => 'index']
// );



// // Add multiple crumbs at the end of the trail
// $this->Breadcrumbs->add([
//     ['title' => 'Products', 'url' => ['controller' => 'Test', 'action' => 'index']],
//     ['title' => 'Product name', 'url' => ['controller' => 'Test', 'action' => 'view', 1234]]
// ]);

// $this->Breadcrumbs->templates([
//     'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
//     'item' => '<li><a href="{{url}}">{{title}}</a></li>',

// ]);
// echo $this->Breadcrumbs->render();

?>


<!-- url helper contains build, css, script and image functionality -->


<a href ="<?php echo $this->Url->build(
    ['controller' => 'Test',
    'action' => 'index_with_param']);
    
    ?>"> Test>index_with_param</a>
    
    <img src="<?= $this->Url->image('img/about/profile_image.jpg'); ?>" />

<br/>

<?php

print_r($data);

?>

<br/>

<?php

print_r($AllHobbies);


?>