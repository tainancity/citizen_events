<div id="EventsAdminEdit">
    <?php echo $this->Form->create('Event', array('type' => 'file')); ?>
    <div class="Events form">
        <fieldset>
            <legend><?php
                echo __('Edit 活動', true);
                ?></legend>
            <?php
            echo $this->Form->input('Event.id');
            foreach ($belongsToModels AS $key => $model) {
                echo $this->Form->input('Event.' . $model['foreignKey'], array(
                    'type' => 'select',
                    'label' => $model['label'],
                    'options' => $$key,
                    'div' => 'form-group',
                    'class' => 'form-control',
                ));
            }
            echo $this->Form->input('Event.name', array(
                'label' => '活動（會議）名稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Event.event_type', array(
                'label' => '辦理形式',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Event.date_begin', array(
                'label' => '活動期程（起）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Event.date_end', array(
                'label' => '活動期程（訖）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Event.place', array(
                'label' => '辦理地點',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Event.note', array(
                'label' => '備註',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </fieldset>
    </div>
            <?php
            echo $this->Form->end(__('Submit', true));
            ?>
</div>