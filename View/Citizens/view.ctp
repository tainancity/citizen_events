<div id="CitizensView">
    <h3><?php echo __('View 公民', true); ?></h3><hr />
    <div class="col-md-12">
        <div class="col-md-2">活動</div>
        <div class="col-md-9"><?php
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

        <div class="col-md-2">擔任角色</div>
        <div class="col-md-9"><?php
            if ($this->data['Citizen']['role']) {

                echo $this->data['Citizen']['role'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">姓名</div>
        <div class="col-md-9"><?php
            if ($this->data['Citizen']['name']) {

                echo $this->data['Citizen']['name'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">手機號碼</div>
        <div class="col-md-9"><?php
            if ($this->data['Citizen']['phone']) {

                echo $this->data['Citizen']['phone'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">服務機關單位</div>
        <div class="col-md-9"><?php
            if ($this->data['Citizen']['unit']) {

                echo $this->data['Citizen']['unit'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">備註</div>
        <div class="col-md-9"><?php
            if ($this->data['Citizen']['note']) {

                echo $this->data['Citizen']['note'];
            }
?>&nbsp;
        </div>
    </div>
    <div class="btn-group">
        <?php echo $this->Html->link(__('公民 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <div id="CitizensViewPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.CitizensViewControl').click(function () {
                $('#CitizensViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>