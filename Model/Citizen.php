<?php

App::uses('AppModel', 'Model');

class Citizen extends AppModel {

    var $name = 'Citizen';
    var $actsAs = array(
    );
    var $belongsTo = array(
        'Event' => array(
            'foreignKey' => 'Event_id',
            'className' => 'Event',
        ),
    );

    function afterSave($created, $options = array()) {
        
    }

}
