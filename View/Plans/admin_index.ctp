<?php

if (!isset($url)) {
    $url = array();
}
?>
<div id="PlansAdminIndex">
    <h2><?php echo __('計畫', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link('新增', array('action' => 'add'), array('class' => 'btn btn-default dialogControl')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => '第 {:page} 頁 / 共 {:pages} 頁'
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="PlansAdminIndexTable">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('Plan.name', '計畫名稱（專案名稱）', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.description', '計畫概述', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.plan_type', '辦理形式', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.units', '協辦單位', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.note', '備註', array('url' => $url)); ?></th>
                <th class="actions">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($items as $item) {
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
            <tr<?php echo $class; ?>>

                <td><?php
                    echo $item['Plan']['name'];
                    ?></td>
                <td><?php
                    echo $item['Plan']['description'];
                    ?></td>
                <td><?php
                    echo $item['Plan']['plan_type'];
                    ?></td>
                <td><?php
                    echo $item['Plan']['units'];
                    ?></td>
                <td><?php
                    echo $item['Plan']['note'];
                    ?></td>
                <td>
                    <div class="btn-group">
                                <?php echo $this->Html->link('檢視', array('action' => 'view', $item['Plan']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                                <?php echo $this->Html->link('編輯', array('action' => 'edit', $item['Plan']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                                <?php echo $this->Html->link('刪除', array('action' => 'delete', $item['Plan']['id']), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
                    </div>
                </td>
            </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="PlansAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
        });
        //]]>
    </script>
</div>