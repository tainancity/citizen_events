<div id="MembersAdminAdd">
        <?php
    echo $this->Form->create('Member', array('type' => 'file', 'url' => array('action' => 'signup')));
    ?>
    <div class="Members form">
        <h2>註冊</h2>
            <?php
            echo $this->Form->input('Member.name', array(
                'type' => 'select',
                'options' => $organizations,
                'label' => '單位',
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