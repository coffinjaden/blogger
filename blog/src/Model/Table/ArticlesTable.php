<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles model
 */
class ArticlesTable extends Table
{
    /**
     * Initialization method
     * @param  array  $config
     */
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    /**
     * [validationDefault description]
     * @param  Validator $validator
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->requirePresence('title')
            ->notEmpty('body')
            ->requirePresence('body');

        return $validator;
    }
}
