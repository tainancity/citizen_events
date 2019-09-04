<div id="CitizensAdminEdit">
    <?php echo $this->Form->create('Citizen', array('type' => 'file')); ?>
    <div class="Citizens form">
        <fieldset>
            <legend><?php
                echo __('Edit 公民', true);
                ?></legend>
            <?php
            echo $this->Form->input('Citizen.id');
            foreach ($belongsToModels AS $key => $model) {
                echo $this->Form->input('Citizen.' . $model['foreignKey'], array(
                    'type' => 'select',
                    'label' => $model['label'],
                    'options' => $$key,
                    'div' => 'form-group',
                    'class' => 'form-control',
                ));
            }
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
        </fieldset>
    </div>
            <?php
            echo $this->Form->end(__('Submit', true));
            ?>
</div>