<?php

App::uses('AppController', 'Controller');

class PlansController extends AppController {

    public $name = 'Plans';
    public $paginate = array();
    public $helpers = array();

    function admin_index() {
        $organizations = Configure::read('organizations');
        $this->paginate['Plan'] = array(
            'limit' => 20,
            'contain' => array('Member'),
        );
        $items = $this->paginate($this->Plan);
        foreach($items AS $k => $v) {
            $items[$k]['Plan']['count_events'] = $this->Plan->Event->find('count', array(
                'conditions' => array(
                    'Event.Plan_id' => $v['Plan']['id']
                ),
            ));
            $countPeople = $this->Plan->query('SELECT SUM(count_citizen) AS count_people FROM events WHERE Plan_id = ' . $v['Plan']['id']);
            $items[$k]['Plan']['count_people'] = $countPeople[0][0]['count_people'];
            $items[$k]['Plan']['count_citizen'] = $this->Plan->Citizen->find('count', array(
                'conditions' => array(
                    'Citizen.Plan_id' => $v['Plan']['id']
                ),
            ));
            $items[$k]['Plan']['count_speaker'] = $this->Plan->Speaker->find('count', array(
                'conditions' => array(
                    'Speaker.Plan_id' => $v['Plan']['id']
                ),
            ));
        }
        $this->set('organizations', $organizations);
        $this->set('items', $items);
    }

    function admin_add() {
        if (!empty($this->data)) {
            $this->Plan->create();
            if ($this->Plan->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index'));
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
        if (!empty($this->data)) {
            if ($this->Plan->save($this->data)) {
                $this->Session->setFlash('資料已經儲存');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('資料儲存時發生錯誤');
            }
        }
        $this->set('id', $id);
        $this->data = $this->Plan->read(null, $id);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('請依照網頁指示操作');
        } else if ($this->Plan->delete($id)) {
            $this->Session->setFlash('資料已經刪除');
        }
        $this->redirect(array('action' => 'index'));
    }
    
    public function admin_export() {
        $organizations = Configure::read('organizations');
        $this->layout = 'ajax';
        $this->response->disableCache();
        $this->response->download('計畫.csv');
        $headers = $this->response->header('Content-Type', 'application/csv');
        foreach ($headers AS $name => $value) {
            header("{$name}: {$value}");
        }
        $f = fopen('php://memory', 'w');
        $items = $this->Plan->find('all', array(
            'order' => array(
                'date_begin' => 'ASC',
            ),
            'contain' => array(
                'Member' => array(
                    'fields' => array('organization'),
                ),
            ),
        ));
        $result = array();
        $result[] = array('填報單位', '計畫名稱（專案名稱）', '計畫概述', '辦理形式', '計畫期程（起）', '計畫期程（迄）', '活動場數', '公民參與人數', '工作人員培訓人數', '講師人數', '協辦單位', '備註');
        foreach($items AS $k => $v) {
            $v['Plan']['count_events'] = $this->Plan->Event->find('count', array(
                'conditions' => array(
                    'Event.Plan_id' => $v['Plan']['id']
                ),
            ));
            $countPeople = $this->Plan->query('SELECT SUM(count_citizen) AS count_people FROM events WHERE Plan_id = ' . $v['Plan']['id']);
            $v['Plan']['count_people'] = $countPeople[0][0]['count_people'];
            $v['Plan']['count_citizen'] = $this->Plan->Citizen->find('count', array(
                'conditions' => array(
                    'Citizen.Plan_id' => $v['Plan']['id']
                ),
            ));
            $v['Plan']['count_speaker'] = $this->Plan->Speaker->find('count', array(
                'conditions' => array(
                    'Speaker.Plan_id' => $v['Plan']['id']
                ),
            ));
            $result[] = array(
                isset($organizations[$v['Member']['organization']]) ? $organizations[$v['Member']['organization']] : '--',
                $v['Plan']['name'],
                $v['Plan']['description'],
                $v['Plan']['plan_type'],
                $v['Plan']['date_begin'],
                $v['Plan']['date_end'],
                $v['Plan']['count_events'],
                $v['Plan']['count_people'],
                $v['Plan']['count_citizen'],
                $v['Plan']['count_speaker'],
                $v['Plan']['units'],
                $v['Plan']['note']);
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
