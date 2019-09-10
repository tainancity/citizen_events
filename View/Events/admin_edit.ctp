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
            echo $this->Form->input('Event.event_type', array(
                'label' => '辦理形式',
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
    });
</script>