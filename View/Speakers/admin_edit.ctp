<div id="SpeakersAdminEdit">
    <?php echo $this->Form->create('Speaker', array('type' => 'file')); ?>
    <div class="Speakers form">
            <h2>編輯講師</h2>
            <?php
            echo $this->Form->input('Speaker.id');
            echo $this->Form->input('Speaker.Event_id', array(
                'type' => 'select',
                'options' => $events,
                'label' => '活動',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Speaker.name', array(
                'label' => '姓名',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Speaker.phone', array(
                'label' => '手機號碼',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Speaker.title', array(
                'label' => '職稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Speaker.unit', array(
                'label' => '服務機關單位',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Speaker.note', array(
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