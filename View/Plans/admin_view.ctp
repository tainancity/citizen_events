<div id="PlansAdminView">
    <h3><?php echo __('View 計畫', true); ?></h3><hr />
    <div class="col-md-12">

        <div class="col-md-2">計畫名稱（專案名稱）</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Plan']['name']) {

                echo $this->data['Plan']['name'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">計畫概述</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Plan']['description']) {

                echo $this->data['Plan']['description'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">辦理形式</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Plan']['plan_type']) {

                echo $this->data['Plan']['plan_type'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">協辦單位</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Plan']['units']) {

                echo $this->data['Plan']['units'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">備註</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Plan']['note']) {

                echo $this->data['Plan']['note'];
            }
?>&nbsp;
        </div>
    </div>
    <hr />
    <div class="btn-group">
        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Plan.id')), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
        <?php echo $this->Html->link(__('計畫 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link(__('View Related 活動', true), array('controller' => 'events', 'action' => 'index', 'Plan', $this->data['Plan']['id']), array('class' => 'btn btn-default PlansAdminViewControl')); ?>
    </div>
    <div id="PlansAdminViewPanel"></div>
<?php
echo $this->Html->scriptBlock('

');
?>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.PlansAdminViewControl').click(function () {
                $('#PlansAdminViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>