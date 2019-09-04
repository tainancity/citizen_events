<div id="SpeakersAdminAdd">
        <?php
    $url = array();
    if (!empty($foreignId) && !empty($foreignModel)) {
        $url = array('action' => 'add', $foreignModel, $foreignId);
    } else {
        $url = array('action' => 'add');
        $foreignModel = '';
    }
    echo $this->Form->create('Speaker', array('type' => 'file', 'url' => $url));
    ?>
    <div class="Speakers form">
        <fieldset>
            <legend><?php
                echo __('Add 講師', true);
                ?></legend>
            <?php
            foreach ($belongsToModels AS $key => $model) {
                echo $this->Form->input('Speaker.' . $model['foreignKey'], array(
                    'type' => 'select',
                    'label' => $model['label'],
                    'options' => $$key,
                    'div' => 'form-group',
                    'class' => 'form-control',
                ));
            }
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
        </fieldset>
    </div>
        <?php
    echo $this->Form->end(__('Submit', true));
    ?>
</div>