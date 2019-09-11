<?php

if (!isset($url)) {
    $url = array();
}
?>
<div id="PlansAdminIndex">
    <h2>計畫/專案</h2>
    <div class="btn-group">
        <?php echo $this->Html->link('新增', array('action' => 'add'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link('匯出', array('action' => 'export'), array('class' => 'btn btn-default')); ?>
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
                <th>計畫名稱（專案名稱）</th>
                <th>計畫概述</th>
                <th>辦理形式</th>
                <th><?php echo $this->Paginator->sort('Plan.date_begin', '計畫期程（起）', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.date_end', '計畫期程（迄）', array('url' => $url)); ?></th>
                <th>活動場數</th>
                <th>公民參與人數</th>
                <th>工作人員培訓人數</th>
                <th>協辦單位</th>
                <th>備註</th>
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
                    echo $item['Plan']['date_begin'];
                    ?></td>
                <td><?php
                    echo $item['Plan']['date_end'];
                    ?></td>
                <td><?php
                    echo $this->Html->link($item['Plan']['count_events'], '/admin/events/index/' . $item['Plan']['id']);;
                    ?></td>
                <td><?php
                    echo $this->Html->link($item['Plan']['count_citizen'], '/admin/citizens/index/' . $item['Plan']['id']);;
                    ?></td>
                <td><?php
                    echo $this->Html->link($item['Plan']['count_speaker'], '/admin/speakers/index/' . $item['Plan']['id']);;
                    ?></td>
                <td><?php
                    echo $item['Plan']['units'];
                    ?></td>
                <td><?php
                    echo $item['Plan']['note'];
                    ?></td>
                <td>
                    <div class="btn-group">
                        <?php echo $this->Html->link('編輯', array('action' => 'edit', $item['Plan']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                            <?php echo $this->Html->link('刪除', array('action' => 'delete', $item['Plan']['id']), array('class' => 'btn btn-default'), '確定要刪除？'); ?>
                    </div>
                </td>
            </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="PlansAdminIndexPanel"></div>
</div>