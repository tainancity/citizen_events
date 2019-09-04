<div id="PlansAdminEdit">
    <?php echo $this->Form->create('Plan', array('type' => 'file')); ?>
    <div class="Plans form">
        <fieldset>
            <legend><?php
                echo __('Edit 計畫', true);
                ?></legend>
            <?php
            echo $this->Form->input('Plan.id');
            echo $this->Form->input('Plan.name', array(
                'label' => '計畫名稱（專案名稱）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.description', array(
                'label' => '計畫概述',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.plan_type', array(
                'label' => '辦理形式',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.units', array(
                'label' => '協辦單位',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.note', array(
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