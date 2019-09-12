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
    
    public function admin_export($planId = 0) {
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
        $this->layout = 'ajax';
        $this->response->disableCache();
        $this->response->download($plan['Plan']['name'] . '_活動.csv');
        $headers = $this->response->header('Content-Type', 'application/csv');
        foreach ($headers AS $name => $value) {
            header("{$name}: {$value}");
        }
        $f = fopen('php://memory', 'w');
        $items = $this->Event->find('all', array(
            'conditions' => array(
                'Event.Plan_id' => $planId,
            ),
            'order' => array(
                'date_begin' => 'ASC',
            ),
        ));
        $result = array();
        $result[] = array('活動（會議）名稱', '辦理形式', '活動期程（起）', '活動期程（訖）', '辦理地點', '公民參與人數', '備註');
        foreach($items AS $k => $v) {
            $result[] = array(
                $v['Event']['name'],
                $v['Event']['event_type'],
                $v['Event']['date_begin'],
                $v['Event']['date_end'],
                $v['Event']['place'],
                $v['Event']['count_citizen'],
                $v['Event']['note'],
                    );
        }
        if (!empty($result)) {
            foreach ($result AS $line) {
                foreach ($line AS $k => $v) {
                    $line[$k] = mb_convert_encoding($v, 'big5', 'utf-8');
                }
                fputcsv($f, $line);
            }
            fseek($f, 0);
        }
        fpassthru($f);
        exit();
    }

}
