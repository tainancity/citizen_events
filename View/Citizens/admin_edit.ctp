<div id="CitizensAdminEdit">
    <?php echo $this->Form->create('Citizen', array('type' => 'file')); ?>
    <div class="Citizens form">
            <h2>編輯工作人員</h2>
            <?php
            echo $this->Form->input('Citizen.id');
            echo $this->Form->input('Citizen.Event_id', array(
                'type' => 'select',
                'options' => $events,
                'label' => '活動',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Citizen.role', array(
                'label' => '擔任角色',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Citizen.name', array(
                'label' => '姓名',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Citizen.phone', array(
                'label' => '手機號碼',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Citizen.unit', array(
                'label' => '服務機關單位',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Citizen.note', array(
                'label' => '備註',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
    </div>
            <?php
            echo $this->Form->end('送出');
            ?>
</div>