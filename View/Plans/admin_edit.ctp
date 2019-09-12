<div id="PlansAdminEdit">
    <?php echo $this->Form->create('Plan', array('type' => 'file')); ?>
    <div class="Plans form">
        <h3>編輯計畫</h3>
            <?php
            echo $this->Form->input('Plan.id');
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
            echo $this->Form->input('Plan.plan_options', array(
                'type' => 'select',
                'options' => array(
                    '參與式預算' => '參與式預算',
                    '審議式民調' => '審議式民調',
                    '聽證會' => '聽證會',
                    '公開展覽' => '公開展覽',
                    '公聽會' => '公聽會',
                    '世界咖啡館' => '世界咖啡館',
                    '說明會' => '說明會',
                    '座談會' => '座談會',
                    '公民論壇' => '公民論壇',
                    '公民陪審團' => '公民陪審團',
                    '(願景)工作坊' => '(願景)工作坊',
                    '其他' => '其他',
                ),
                'label' => '辦理形式',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Plan.plan_type', array(
                'label' => false,
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
        $('#PlanPlanOptions').val($('#PlanPlanType').val());
        $('#PlanPlanOptions').change(function() {
            var selectedVal = $(this).val();
            if(selectedVal != '其他') {
                $('#PlanPlanType').val(selectedVal);
                $('#PlanPlanType').hide();
            } else {
                $('#PlanPlanType').val('');
                $('#PlanPlanType').show();
            }
            
        }).trigger('change');
    });
</script>