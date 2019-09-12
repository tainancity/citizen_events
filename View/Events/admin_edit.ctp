<div id="EventsAdminEdit">
    <?php echo $this->Form->create('Event', array('type' => 'file', 'url' => array('action' => 'edit', $id))); ?>
    <div class="Events form">        
            <h3>編輯活動</h3>
            <?php
            echo $this->Form->input('Event.id');
            echo $this->Form->input('Event.name', array(
                'label' => '活動（會議）名稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Event.event_options', array(
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
            echo $this->Form->input('Event.event_type', array(
                'label' => false,
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Event.date_begin', array(
                'type' => 'text',
                'label' => '活動期程（起）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Event.date_end', array(
                'type' => 'text',
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
    </div>
<?php echo $this->Form->end('送出'); ?>
</div>
<script>
    $(function() {
        $('#EventDateBegin').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#EventDateEnd').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#EventEventOptions').change(function() {
            var selectedVal = $(this).val();
            if(selectedVal != '其他') {
                $('#EventEventType').val(selectedVal);
                $('#EventEventType').hide();
            } else {
                $('#EventEventType').val('');
                $('#EventEventType').show();
            }
            
        }).trigger('change');
    });
</script>