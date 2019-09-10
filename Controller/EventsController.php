<?php

App::uses('AppController', 'Controller');

class EventsController extends AppController {

    public $name = 'Events';
    public $paginate = array();
    public $helpers = array();

    function admin_index($planId = 0) {
        $planId = intval($planId);
        if($planId > 0) {
            $plan = $this->Event->Plan->find('first', array(
                'conditions' => array('Plan.id' => $planId),
            ));
        }
        if(empty($plan)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect('/admin/plans');
        }
        
        $scope = array(
            'Event.Plan_id' => $planId,
        );
        $this->paginate['Event']['limit'] = 20;
        $items = $this->paginate($this->Event, $scope);
        foreach($items AS $k => $v) {
            $items[$k]['Event']['count_people'] = $this->Event->Citizen->find('count', array(
                'conditions' => array(
                    'Citizen.Event_id' => $v['Event']['id'],
                ),
            ));
            $items[$k]['Event']['count_people'] += $this->Event->Speaker->find('count', array(
                'conditions' => array(
                    'Speaker.Event_id' => $v['Event']['id'],
                ),
            ));
        }

        $this->set('items', $items);
        $this->set('plan', $plan);
    }

    function admin_add($planId = 0) {
        $planId = intval($planId);
        if($planId > 0) {
            $plan = $this->Event->Plan->find('first', array(
                'conditions' => array('Plan.id' => $planId),
            ));
        }
        if(empty($plan)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect('/admin/plans');
        }
        $this->set('plan', $plan);
        
        if (!empty($this->data)) {
            $this->Event->create();
            $dataToSave = $this->request->data;
            $dataToSave['Event']['Plan_id'] = $planId;
            if ($this->Event->save($dataToSave)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index', $planId));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect($this->referer());
        }
        $dbItem = $this->Event->read(null, $id);
        if (!empty($this->data)) {
            if ($this->Event->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index', $dbItem['Event']['Plan_id']));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
        $this->set('id', $id);
        $this->data = $dbItem;
    }

    function admin_delete($id = null) {
        $dbItem = $this->Event->read(null, $id);
        if (!$id) {
            $this->Session->setFlash('請依照網頁指示操作');
        } else if ($this->Event->delete($id)) {
            $this->Session->setFlash('資料已經刪除');
        }
        $this->redirect(array('action' => 'index', $dbItem['Event']['Plan_id']));
    }

}
