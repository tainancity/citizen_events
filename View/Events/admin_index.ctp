<?php

if (!isset($url)) {
    $url = array();
}

?>
<div id="EventsAdminIndex">
    <h2><?php echo $plan['Plan']['name']; ?>的活動</h2>
    <div class="btn-group">
        <?php echo $this->Html->link('新增活動', array('action' => 'add', $plan['Plan']['id']), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link('相關公民', '/admin/citizens/index/' . $plan['Plan']['id'], array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link('相關工作人員', '/admin/speakers/index/' . $plan['Plan']['id'], array('class' => 'btn btn-default')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => '第 {:page} 頁 / 共 {:pages} 頁'
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="EventsAdminIndexTable">
        <thead>
            <tr>
                <th>活動（會議）名稱</th>
                <th>辦理形式</th>
                <th><?php echo $this->Paginator->sort('Event.date_begin', '活動期程（起）', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Event.date_end', '活動期程（訖）', array('url' => $url)); ?></th>
                <th>辦理地點</th>
                <th>公民參與人數</th>
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
                    echo $item['Event']['name'];
                    ?></td>
                <td><?php
                    echo $item['Event']['event_type'];
                    ?></td>
                <td><?php
                    echo $item['Event']['date_begin'];
                    ?></td>
                <td><?php
                    echo $item['Event']['date_end'];
                    ?></td>
                <td><?php
                    echo $item['Event']['place'];
                    ?></td>
                <td><?php
                    echo $item['Event']['count_people'];
                    ?></td>
                <td><?php
                    echo $item['Event']['note'];
                    ?></td>
                <td>
                    <div class="btn-group">
                        <?php echo $this->Html->link('編輯', array('action' => 'edit', $item['Event']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                        <?php echo $this->Html->link('刪除', array('action' => 'delete', $item['Event']['id']), array('class' => 'btn btn-default'), '確定要刪除？'); ?>
                    </div>
                </td>
            </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="EventsAdminIndexPanel"></div>
</div>