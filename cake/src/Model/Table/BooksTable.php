<?php

// namespace App\Controller;
namespace App\Model\Table;

 use Cake\ORM\Table;
 use Cake\Validation\Validator;


class BooksTable extends Table{
   
        public function validationDefault(Validator $validator)
        {
            $validator
                ->requirePresence('book_name', 'create', 'Book name should be needed')
                ->add('book_name', [
                    'length' => [
                        'rule' => ["minLength", 2],
                        'message' => 'Book name should be more than 2 characters'
                    ]
                ])                
                ->requirePresence('email', 'create', 'Email should be needed')
                ->add('email', [
                    'valid_email' => [
                        'rule' => 'email',
                        'message' => 'Invalid email address'
                    ],
                    'unique_email' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => 'Email should be unique'
                    ]
                    ])

                ->requirePresence('author', 'create', 'Author name is needed')
                ->add('author', [
                    'length' => [
                        'rule' => ["minLength", 2],
                        'message' => 'Author name should be more than 2 characters'
                    ]
                ]);
    
            return $validator;
        }
    }
    

?>


