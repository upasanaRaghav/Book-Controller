<!-- <h3> This content is from ShowMessage Function</h3>  -->

<?= $this->Flash->render() ?>
<?= $this->Flash->render('flash', [
    'element' => 'Company.flashy'
]);