<div id="PlansAdminAdd">
    <?php echo $this->Form->create('Plan', array('type' => 'file')); ?>
    <div class="Plans form">
        <h3>新增計畫</h3>
            <?php
            echo $this->Form->input('Plan.name', array(
                'label' => '計畫名稱（專案名稱）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.description', array(
                'label' => '計畫概述（50-100字）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.plan_type', array(
                'label' => '辦理形式',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.date_begin', array(
                'type' => 'text',
                'label' => '計畫期程（起）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.date_end', array(
                'type' => 'text',
                'label' => '計畫期程（迄）',
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
    </div>
<?php echo $this->Form->end('送出'); ?>
</div>
<script>
    $(function() {
        $('#PlanDateBegin').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#PlanDateEnd').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>