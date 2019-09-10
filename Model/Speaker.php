<?php

App::uses('AppModel', 'Model');

class Speaker extends AppModel {

    var $name = 'Speaker';
    var $actsAs = array(
    );
    var $belongsTo = array(
        'Plan' => array(
            'foreignKey' => 'Plan_id',
            'className' => 'Plan',
        ),
        'Event' => array(
            'foreignKey' => 'Event_id',
            'className' => 'Event',
        ),
    );

    function afterSave($created, $options = array()) {
        
    }

}
