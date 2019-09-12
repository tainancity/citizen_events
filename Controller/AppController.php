<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Js', 'Session');
    public $components = array('Acl', 'Auth', 'RequestHandler', 'Session');

    public function beforeFilter() {
        if (isset($this->Auth)) {
            $this->Auth->authenticate = array(
                'Form' => array(
                    'userModel' => 'Member',
                    'scope' => array('Member.user_status' => 'Y'),
                )
            );
            $this->Auth->loginAction = '/members/login';
            $this->Auth->loginRedirect = '/';
            $this->Auth->authorize = array(
                'Actions' => array(
                    'userModel' => 'Member',
                )
            );
            Configure::write('loginMember', $this->Session->read('Auth.User'));
        }
        Configure::write('organizations', array(
            'a101' => '地政局',
            'a102' => '工務局',
            'a103' => '政風處',
            'a104' => '教育局',
            'a105' => '文化局',
            'a106' => '民政局',
            'a107' => '民族事務委員會',
            'a108' => '水利局',
            'a109' => '法制處',
            'a110' => '消防局',
            'a111' => '環保局',
            'a112' => '社會局',
            'a113' => '秘書處',
            'a114' => '經濟發展局',
            'a115' => '衛生局',
            'a116' => '觀光旅遊局',
            'a117' => '警察局',
            'a118' => '財政稅務局',
            'a119' => '農業局',
            'a120' => '都市發展局',
            'a121' => '主計處',
            'a122' => '交通局',
            'a123' => '人事處',
            'a124' => '勞工局',
            'a125' => '新聞及國際關係處',
            'a126' => '研究發展考核委員會',
            'a127' => '七股區公所',
            'a128' => '下營區公所',
            'a129' => '中西區公所',
            'a130' => '仁德區公所',
            'a131' => '佳里區公所',
            'a132' => '六甲區公所',
            'a133' => '北區公所',
            'a134' => '北門區公所',
            'a135' => '南化區公所',
            'a136' => '南區公所',
            'a137' => '善化區公所',
            'a138' => '大內區公所',
            'a139' => '學甲區公所',
            'a140' => '安南區公所',
            'a141' => '安定區公所',
            'a142' => '安平區公所',
            'a143' => '官田區公所',
            'a144' => '將軍區公所',
            'a145' => '山上區公所',
            'a146' => '左鎮區公所',
            'a147' => '後壁區公所',
            'a148' => '新化區公所',
            'a149' => '新市區公所',
            'a150' => '新營區公所',
            'a151' => '東區公所',
            'a152' => '東山區公所',
            'a153' => '柳營區公所',
            'a154' => '楠西區公所',
            'a155' => '歸仁區公所',
            'a156' => '永康區公所',
            'a157' => '玉井區公所',
            'a158' => '白河區公所',
            'a159' => '西港區公所',
            'a160' => '關廟區公所',
            'a161' => '鹽水區公所',
            'a162' => '麻豆區公所',
            'a163' => '龍崎區公所',
        ));
    }

}
