<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TestsTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('email', 'create', 'Email should be needed')
            ->add('email', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Email should be unique'
                ]
            ])
            ->requirePresence('password', 'create', 'Password is needed')
            ->notEmptyString('password', 'Password should not be empty')
            ->add('confirm_password', 'custom', [
                'rule' => function ($value, $context) {
                    return isset($context['data']['password']) && $value === $context['data']['password'];
                },
                'message' => 'Password confirmation does not match'
            ]);

        return $validator;
    }
}
