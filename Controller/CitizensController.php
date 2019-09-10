<?php

App::uses('AppController', 'Controller');

class CitizensController extends AppController {

    public $name = 'Citizens';
    public $paginate = array();
    public $helpers = array();

    function admin_index($planId = 0) {
        $planId = intval($planId);
        if($planId > 0) {
            $plan = $this->Citizen->Plan->find('first', array(
                'conditions' => array('Plan.id' => $planId),
            ));
        }
        if(empty($plan)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect('/admin/plans');
        }
        
        $scope = array(
            'Citizen.Plan_id' => $planId,
        );
        $this->paginate['Citizen']['limit'] = 20;
        $items = $this->paginate($this->Citizen, $scope);

        $this->set('items', $items);
        $this->set('events', $this->Citizen->Event->find('list', array(
            'conditions' => array(
                'Event.Plan_id' => $planId,
            ),
        )));
        $this->set('plan', $plan);
    }

    function admin_add($planId = 0) {
        $planId = intval($planId);
        if($planId > 0) {
            $plan = $this->Citizen->Plan->find('first', array(
                'conditions' => array('Plan.id' => $planId),
            ));
        }
        if(empty($plan)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect('/admin/plans');
        }
        $this->set('plan', $plan);
        $this->set('events', $this->Citizen->Event->find('list', array(
            'conditions' => array(
                'Event.Plan_id' => $planId,
            ),
        )));
        if (!empty($this->data)) {
            $this->Citizen->create();
            $dataToSave = $this->data;
            $dataToSave['Citizen']['Plan_id'] = $planId;
            if ($this->Citizen->save($dataToSave)) {
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
        $dbItem = $this->Citizen->read(null, $id);
        if (!empty($this->data)) {
            if ($this->Citizen->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index', $dbItem['Citizen']['Plan_id']));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
        $this->set('id', $id);
        $this->data = $dbItem;
        $this->set('events', $this->Citizen->Event->find('list', array(
            'conditions' => array(
                'Event.Plan_id' => $this->data['Citizen']['Plan_id'],
            ),
        )));
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('請依照網頁指示操作');
        } else if ($this->Citizen->delete($id)) {
            $this->Session->setFlash('資料已經刪除');
        }
        $this->redirect(array('action' => 'index'));
    }

}
