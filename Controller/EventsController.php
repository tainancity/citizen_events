<?php

App::uses('AppController', 'Controller');

class EventsController extends AppController {

    public $name = 'Events';
    public $paginate = array();
    public $helpers = array();

    function admin_index($foreignModel = null, $foreignId = 0, $op = null) {
        $foreignId = intval($foreignId);
        $foreignKeys = array();

        $foreignKeys = array(
            'Plan' => 'Plan_id',
        );


        $scope = array();
        if (array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
            $scope['Event.' . $foreignKeys[$foreignModel]] = $foreignId;
        } else {
            $foreignModel = '';
        }
        $this->set('scope', $scope);
        $this->paginate['Event']['limit'] = 20;
        $items = $this->paginate($this->Event, $scope);

        $this->set('items', $items);
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);
    }

    function admin_view($id = null) {
        if (!$id || !$this->data = $this->Event->read(null, $id)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_add($foreignModel = null, $foreignId = 0) {
        $foreignId = intval($foreignId);
        $foreignKeys = array(
            'Plan' => 'Plan_id',
        );
        if (array_key_exists($foreignModel, $foreignKeys) && $foreignId > 0) {
            if (!empty($this->data)) {
                $this->data['Event'][$foreignKeys[$foreignModel]] = $foreignId;
            }
        } else {
            $foreignModel = '';
        }
        if (!empty($this->data)) {
            $this->Event->create();
            if ($this->Event->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
        $this->set('foreignId', $foreignId);
        $this->set('foreignModel', $foreignModel);

        $belongsToModels = array(
            'listPlan' => array(
                'label' => '計畫',
                'modelName' => 'Plan',
                'foreignKey' => 'Plan_id',
            ),
        );

        foreach ($belongsToModels AS $key => $model) {
            if ($foreignModel == $model['modelName']) {
                unset($belongsToModels[$key]);
                continue;
            }
            $this->set($key, $this->Event->{$model['modelName']}->find('list'));
        }
        $this->set('belongsToModels', $belongsToModels);
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Event->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
        $this->set('id', $id);
        $this->data = $this->Event->read(null, $id);

        $belongsToModels = array(
            'listPlan' => array(
                'label' => '計畫',
                'modelName' => 'Plan',
                'foreignKey' => 'Plan_id',
            ),
        );

        foreach ($belongsToModels AS $key => $model) {
            $this->set($key, $this->Event->{$model['modelName']}->find('list'));
        }
        $this->set('belongsToModels', $belongsToModels);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('請依照網頁指示操作');
        } else if ($this->Event->delete($id)) {
            $this->Session->setFlash('資料已經刪除');
        }
        $this->redirect(array('action' => 'index'));
    }

}
