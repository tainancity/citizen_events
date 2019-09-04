<div id="EventsAdminView">
    <h3><?php echo __('View 活動', true); ?></h3><hr />
    <div class="col-md-12">
        <div class="col-md-2">計畫</div>
        <div class="col-md-9">&nbsp;<?php
if (empty($this->data['Plan']['id'])) {
    echo '--';
} else {
    echo $this->Html->link($this->data['Plan']['id'], array(
        'controller' => 'plans',
        'action' => 'view',
        $this->data['Plan']['id']
    ));
}
?></div>

        <div class="col-md-2">活動（會議）名稱</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Event']['name']) {

                echo $this->data['Event']['name'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">辦理形式</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Event']['event_type']) {

                echo $this->data['Event']['event_type'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">活動期程（起）</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Event']['date_begin']) {

                echo $this->data['Event']['date_begin'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">活動期程（訖）</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Event']['date_end']) {

                echo $this->data['Event']['date_end'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">辦理地點</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Event']['place']) {

                echo $this->data['Event']['place'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">備註</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Event']['note']) {

                echo $this->data['Event']['note'];
            }
?>&nbsp;
        </div>
    </div>
    <hr />
    <div class="btn-group">
        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Event.id')), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
        <?php echo $this->Html->link(__('活動 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link(__('View Related 公民', true), array('controller' => 'citizens', 'action' => 'index', 'Event', $this->data['Event']['id']), array('class' => 'btn btn-default EventsAdminViewControl')); ?>
        <?php echo $this->Html->link(__('View Related 講師', true), array('controller' => 'speakers', 'action' => 'index', 'Event', $this->data['Event']['id']), array('class' => 'btn btn-default EventsAdminViewControl')); ?>
    </div>
    <div id="EventsAdminViewPanel"></div>
<?php
echo $this->Html->scriptBlock('

');
?>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.EventsAdminViewControl').click(function () {
                $('#EventsAdminViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>