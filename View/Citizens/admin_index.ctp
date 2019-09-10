<?php

if (!isset($url)) {
    $url = array();
}

if (!empty($foreignId) && !empty($foreignModel)) {
    $url = array($foreignModel, $foreignId);
}
?>
<div id="CitizensAdminIndex">
    <h2><?php echo __('公民', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link('新增', array_merge($url, array('action' => 'add')), array('class' => 'btn btn-default dialogControl')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => '第 {:page} 頁 / 共 {:pages} 頁'
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="CitizensAdminIndexTable">
        <thead>
            <tr>
                <?php if (empty($scope['Citizen.Event_id'])): ?>
                <th><?php echo $this->Paginator->sort('Citizen.Event_id', '活動', array('url' => $url)); ?></th>
                <?php endif; ?>

                <th><?php echo $this->Paginator->sort('Citizen.role', '擔任角色', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Citizen.name', '姓名', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Citizen.phone', '手機號碼', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Citizen.unit', '服務機關單位', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Citizen.note', '備註', array('url' => $url)); ?></th>
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
                    <?php if (empty($scope['Citizen.Event_id'])): ?>
                <td><?php
                if (empty($item['Event']['id'])) {
                    echo '--';
                } else {
                    echo $this->Html->link($item['Event']['id'], array(
                        'controller' => 'events',
                        'action' => 'view',
                        $item['Event']['id']
                    ));
                }
                        ?></td>
                    <?php endif; ?>

                <td><?php
                    echo $item['Citizen']['role'];
                    ?></td>
                <td><?php
                    echo $item['Citizen']['name'];
                    ?></td>
                <td><?php
                    echo $item['Citizen']['phone'];
                    ?></td>
                <td><?php
                    echo $item['Citizen']['unit'];
                    ?></td>
                <td><?php
                    echo $item['Citizen']['note'];
                    ?></td>
                <td>
                    <div class="btn-group">
                                <?php echo $this->Html->link('檢視', array('action' => 'view', $item['Citizen']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                                <?php echo $this->Html->link('編輯', array('action' => 'edit', $item['Citizen']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                                <?php echo $this->Html->link('刪除', array('action' => 'delete', $item['Citizen']['id']), array('class' => 'btn btn-default'), '確定要刪除？'); ?>
                    </div>
                </td>
            </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="CitizensAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
        });
        //]]>
    </script>
</div>