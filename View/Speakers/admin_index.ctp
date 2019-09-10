<?php

if (!isset($url)) {
    $url = array();
}

if (!empty($foreignId) && !empty($foreignModel)) {
    $url = array($foreignModel, $foreignId);
}
?>
<div id="SpeakersAdminIndex">
    <h2><?php echo __('講師', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link('新增', array_merge($url, array('action' => 'add')), array('class' => 'btn btn-default dialogControl')); ?>
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
                <?php if (empty($scope['Speaker.Event_id'])): ?>
                <th><?php echo $this->Paginator->sort('Speaker.Event_id', '活動', array('url' => $url)); ?></th>
                <?php endif; ?>

                <th><?php echo $this->Paginator->sort('Speaker.name', '姓名', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Speaker.phone', '手機號碼', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Speaker.title', '職稱', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Speaker.unit', '服務機關單位', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Speaker.note', '備註', array('url' => $url)); ?></th>
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
                    <?php if (empty($scope['Speaker.Event_id'])): ?>
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
                                <?php echo $this->Html->link('檢視', array('action' => 'view', $item['Speaker']['id']), array('class' => 'btn btn-default dialogControl')); ?>
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
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
        });
        //]]>
    </script>
</div>