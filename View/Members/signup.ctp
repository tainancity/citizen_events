<div id="MembersAdminAdd">
        <?php
    echo $this->Form->create('Member', array('type' => 'file', 'url' => array('action' => 'signup')));
    ?>
    <div class="Members form">
        <h2>註冊</h2>
            <?php
            echo $this->Form->input('Member.organization', array(
                'type' => 'select',
                'options' => $organizations,
                'label' => '機關單位名稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Member.name', array(
                'label' => '姓名',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Member.title', array(
                'label' => '職稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Member.phone', array(
                'label' => '連絡電話',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Member.email', array(
                'label' => '電子郵件',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Member.username', array(
                'label' => '帳號',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Member.password', array(
                'type' => 'password',
                'label' => '密碼',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
    </div>
        <?php
    echo $this->Form->end('送出');
    ?>
</div>