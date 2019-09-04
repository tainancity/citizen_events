<div id="SpeakersAdminView">
    <h3><?php echo __('View 講師', true); ?></h3><hr />
    <div class="col-md-12">
        <div class="col-md-2">活動</div>
        <div class="col-md-9">&nbsp;<?php
if (empty($this->data['Event']['id'])) {
    echo '--';
} else {
    echo $this->Html->link($this->data['Event']['id'], array(
        'controller' => 'events',
        'action' => 'view',
        $this->data['Event']['id']
    ));
}
?></div>

        <div class="col-md-2">姓名</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Speaker']['name']) {

                echo $this->data['Speaker']['name'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">手機號碼</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Speaker']['phone']) {

                echo $this->data['Speaker']['phone'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">職稱</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Speaker']['title']) {

                echo $this->data['Speaker']['title'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">服務機關單位</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Speaker']['unit']) {

                echo $this->data['Speaker']['unit'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">備註</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Speaker']['note']) {

                echo $this->data['Speaker']['note'];
            }
?>&nbsp;
        </div>
    </div>
    <hr />
    <div class="btn-group">
        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Speaker.id')), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
        <?php echo $this->Html->link(__('講師 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <div id="SpeakersAdminViewPanel"></div>
<?php
echo $this->Html->scriptBlock('

');
?>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.SpeakersAdminViewControl').click(function () {
                $('#SpeakersAdminViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>