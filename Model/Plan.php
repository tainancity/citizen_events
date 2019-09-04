<?php

App::uses('AppModel', 'Model');

class Plan extends AppModel {

    var $name = 'Plan';
    var $actsAs = array(
    );
    var $hasMany = array(
        'Event' => array(
            'foreignKey' => 'Plan_id',
            'dependent' => false,
            'className' => 'Event',
        ),
    );

    function afterSave($created, $options = array()) {
        
    }

}
