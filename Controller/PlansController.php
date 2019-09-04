<?php

App::uses('AppController', 'Controller');

class PlansController extends AppController {

    public $name = 'Plans';
    public $paginate = array();
    public $helpers = array();

    function admin_index() {
        $this->paginate['Plan'] = array(
            'limit' => 20,
        );
        $this->set('items', $this->paginate($this->Plan));
    }

    function admin_view($id = null) {
        if (!$id || !$this->data = $this->Plan->read(null, $id)) {
            $this->Session->setFlash('請依照網頁指示操作');
            $this->redirect(array('action' => 'index'));
        }
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

}
