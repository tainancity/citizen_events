<?php

App::uses('AppController', 'Controller');

class SpeakersController extends AppController {

    public $name = 'Speakers';
    public $paginate = array();
    public $helpers = array();

    function admin_index($foreignModel = null, $foreignId = 0, $op = null) {
        $foreignId = intval($foreignId);
        $foreignKeys = array();

        $foreignKeys = array(
            'Event' => 'Event_id',
        );


        $scope = array();
        if (array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
            $scope['Speaker.' . $foreignKeys[$foreignModel]] = $foreignId;
        } else {
            $foreignModel = '';
        }
        $this->set('scope', $scope);
        $this->paginate['Speaker']['limit'] = 20;
        $items = $this->paginate($this->Speaker, $scope);

        $this->set('items', $items);
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);
    }

    function admin_view($id = null) {
        if (!$id || !$this->data = $this->Speaker->read(null, $id)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_add($foreignModel = null, $foreignId = 0) {
        $foreignId = intval($foreignId);
        $foreignKeys = array(
            'Event' => 'Event_id',
        );
        if (array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
            if (!empty($this->data)) {
                $this->data['Speaker'][$foreignKeys[$foreignModel]] = $foreignId;
            }
        } else {
            $foreignModel = '';
        }
        if (!empty($this->data)) {
            $this->Speaker->create();
            if ($this->Speaker->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);

        $belongsToModels = array(
            'listEvent' => array(
                'label' => '活動',
                'modelName' => 'Event',
                'foreignKey' => 'Event_id',
            ),
        );

        foreach ($belongsToModels AS $key => $model) {
            if ($foreignModel == $model['modelName']) {
                unset($belongsToModels[$key]);
                continue;
            }
            $this->set($key, $this->Speaker->{$model['modelName']}->find('list'));
        }
        $this->set('belongsToModels', $belongsToModels);
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Speaker->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
        $this->set('id', $id);
        $this->data = $this->Speaker->read(null, $id);

        $belongsToModels = array(
            'listEvent' => array(
                'label' => '活動',
                'modelName' => 'Event',
                'foreignKey' => 'Event_id',
            ),
        );

        foreach ($belongsToModels AS $key => $model) {
            $this->set($key, $this->Speaker->{$model['modelName']}->find('list'));
        }
        $this->set('belongsToModels', $belongsToModels);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('請依照網頁指示操作');
        } else if ($this->Speaker->delete($id)) {
            $this->Session->setFlash('資料已經刪除');
        }
        $this->redirect(array('action' => 'index'));
    }

}
