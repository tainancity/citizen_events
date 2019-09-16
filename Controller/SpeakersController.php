<?php

App::uses('AppController', 'Controller');

class SpeakersController extends AppController {

    public $name = 'Speakers';
    public $paginate = array();
    public $helpers = array();

    function admin_index($planId = 0) {
        $planId = intval($planId);
        if($planId > 0) {
            $plan = $this->Speaker->Plan->find('first', array(
                'conditions' => array('Plan.id' => $planId),
            ));
        }
        if(empty($plan)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect('/admin/plans');
        }
        
        $scope = array(
            'Speaker.Plan_id' => $planId,
        );
        $this->paginate['Speaker']['limit'] = 20;
        $items = $this->paginate($this->Speaker, $scope);

        $this->set('items', $items);
        $this->set('events', $this->Speaker->Event->find('list', array(
            'conditions' => array(
                'Event.Plan_id' => $planId,
            ),
        )));
        $this->set('plan', $plan);
    }

    function admin_add($planId = 0) {
        $planId = intval($planId);
        if($planId > 0) {
            $plan = $this->Speaker->Plan->find('first', array(
                'conditions' => array('Plan.id' => $planId),
            ));
        }
        if(empty($plan)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect('/admin/plans');
        }
        $this->set('plan', $plan);
        $this->set('events', $this->Speaker->Event->find('list', array(
            'conditions' => array(
                'Event.Plan_id' => $planId,
            ),
        )));
        if (!empty($this->data)) {
            $this->Speaker->create();
            $dataToSave = $this->data;
            $dataToSave['Speaker']['Plan_id'] = $planId;
            if ($this->Speaker->save($dataToSave)) {
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
        $dbItem = $this->Speaker->read(null, $id);
        if (!empty($this->data)) {
            if ($this->Speaker->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index', $dbItem['Speaker']['Plan_id']));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
        $this->set('id', $id);
        $this->data = $dbItem;
        $this->set('events', $this->Speaker->Event->find('list', array(
            'conditions' => array(
                'Event.Plan_id' => $this->data['Speaker']['Plan_id'],
            ),
        )));
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('請依照網頁指示操作');
        } else if ($this->Speaker->delete($id)) {
            $this->Session->setFlash('資料已經刪除');
        }
        $this->redirect(array('action' => 'index'));
    }
    
    public function admin_export($planId = 0) {
        $planId = intval($planId);
        if ($planId > 0) {
            $plan = $this->Speaker->Plan->find('first', array(
                'conditions' => array('Plan.id' => $planId),
            ));
        }
        if (empty($plan)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect('/admin/plans');
        }
        $organizations = Configure::read('organizations');
        $this->layout = 'ajax';
        $this->response->disableCache();
        $this->response->download($plan['Plan']['name'] . '_講師.csv');
        $headers = $this->response->header('Content-Type', 'application/csv');
        foreach ($headers AS $name => $value) {
            header("{$name}: {$value}");
        }
        $f = fopen('php://memory', 'w');
        $items = $this->Speaker->find('all', array(
            'conditions' => array(
                'Speaker.Plan_id' => $planId,
            ),
            'order' => array(
                'Event_id' => 'ASC',
            ),
            'contain' => array(
                'Member' => array(
                    'fields' => array('username'),
                ),
            ),
        ));
        $events = $this->Speaker->Event->find('list', array(
            'conditions' => array(
                'Event.Plan_id' => $planId,
            ),
        ));
        $result = array();
        $result[] = array('填報單位', '計畫名稱（專案名稱）', '活動', '姓名', '手機號碼', '職稱', '服務機關單位', '備註');
        foreach ($items AS $k => $v) {
            $result[] = array(
                isset($organizations[$v['Member']['username']]) ? $organizations[$v['Member']['username']] : '--',
                $plan['Plan']['name'],
                $events[$v['Speaker']['Event_id']],
                $v['Speaker']['name'],
                $v['Speaker']['phone'],
                $v['Speaker']['title'],
                $v['Speaker']['unit'],
                $v['Speaker']['note'],
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
