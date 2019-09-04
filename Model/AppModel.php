<?php

class AppModel extends Model {

    public $actsAs = array('Containable');
    public $recursive = -1;

    public function beforeSave($options = array()) {
        if (false === $this->exists() && !empty($this->schema('created_by'))) {
            $this->data[$this->name]['created_by'] = Configure::read('loginMember.id');
        }
        return parent::beforeSave($options);
    }
    
    public function beforeFind($query) {
        if(!empty($this->schema('created_by')) && Configure::read('loginMember.group_id') != 1) {
            $query['conditions'][$this->name . '.created_by'] = Configure::read('loginMember.id');
        }
        return $query;
    }

}
