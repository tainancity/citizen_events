<?php

if (!isset($url)) {
    $url = array();
}

if (!empty($foreignId) && !empty($foreignModel)) {
    $url = array($foreignModel, $foreignId);
}
?>
<div id="EventsAdminIndex">
    <h2><?php echo __('活動', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link('新增', array_merge($url, array('action' => 'add')), array('class' => 'btn btn-default dialogControl')); ?>
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
                <?php if (empty($scope['Event.Plan_id'])): ?>
                <th><?php echo $this->Paginator->sort('Event.Plan_id', '計畫', array('url' => $url)); ?></th>
                <?php endif; ?>

                <th><?php echo $this->Paginator->sort('Event.name', '活動（會議）名稱', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Event.event_type', '辦理形式', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Event.date_begin', '活動期程（起）', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Event.date_end', '活動期程（訖）', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Event.place', '辦理地點', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Event.note', '備註', array('url' => $url)); ?></th>
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
                    <?php if (empty($scope['Event.Plan_id'])): ?>
                <td><?php
                if (empty($item['Plan']['id'])) {
                    echo '--';
                } else {
                    echo $this->Html->link($item['Plan']['id'], array(
                        'controller' => 'plans',
                        'action' => 'view',
                        $item['Plan']['id']
                    ));
                }
                        ?></td>
                    <?php endif; ?>

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
                    echo $item['Event']['note'];
                    ?></td>
                <td>
                    <div class="btn-group">
                                <?php echo $this->Html->link('檢視', array('action' => 'view', $item['Event']['id']), array('class' => 'btn btn-default dialogControl')); ?>
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
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
        });
        //]]>
    </script>
</div>