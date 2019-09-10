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
        'Citizen' => array(
            'foreignKey' => 'Event_id',
            'dependent' => false,
            'className' => 'Citizen',
        ),
        'Speaker' => array(
            'foreignKey' => 'Event_id',
            'dependent' => false,
            'className' => 'Speaker',
        ),
    );

}
