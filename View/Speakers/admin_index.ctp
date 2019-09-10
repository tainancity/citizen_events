<?php
if(!isset($url)) {
    $url = array();
}
?>
<div id="SpeakersAdminIndex">
    <h2><?php echo $plan['Plan']['name']; ?>的工作人員</h2>
    <div class="btn-group">
        <?php echo $this->Html->link('新增工作人員', array('action' => 'add', $plan['Plan']['id']), array('class' => 'btn btn-default dialogControl')); ?>
        <?php echo $this->Html->link('相關活動', '/admin/events/index/' . $plan['Plan']['id'], array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link('相關公民', '/admin/citizens/index/' . $plan['Plan']['id'], array('class' => 'btn btn-default')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => '第 {:page} 頁 / 共 {:pages} 頁'
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="SpeakersAdminIndexTable">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Speaker.Event_id', '活動', array('url' => $url)); ?></th>
                <th>姓名</th>
                <th><?php echo $this->Paginator->sort('Speaker.phone', '手機號碼', array('url' => $url)); ?></th>
                <th>職稱</th>
                <th>服務機關單位</th>
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
                    echo $events[$item['Speaker']['Event_id']];
                        ?></td>
                <td><?php
                    echo $item['Speaker']['name'];
                    ?></td>
                <td><?php
                    echo $item['Speaker']['phone'];
                    ?></td>
                <td><?php
                    echo $item['Speaker']['title'];
                    ?></td>
                <td><?php
                    echo $item['Speaker']['unit'];
                    ?></td>
                <td><?php
                    echo $item['Speaker']['note'];
                    ?></td>
                <td>
                    <div class="btn-group">
                        <?php echo $this->Html->link('編輯', array('action' => 'edit', $item['Speaker']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                        <?php echo $this->Html->link('刪除', array('action' => 'delete', $item['Speaker']['id']), array('class' => 'btn btn-default'), '確定要刪除？'); ?>
                    </div>
                </td>
            </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="SpeakersAdminIndexPanel"></div>
</div>