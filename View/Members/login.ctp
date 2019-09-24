<?php

echo $this->Form->create('Member', array('url' => 'login'));
echo $this->Form->input('Member.username', array(
            'type' => 'text',
            'label' => '帳號',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.password', array(
            'type' => 'password',
            'label' => '密碼',
            'value' => '',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
echo $this->Form->end('登入');