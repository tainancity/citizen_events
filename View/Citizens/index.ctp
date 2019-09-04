<div id="CitizensIndex">
    <h2><?php echo __('公民', true); ?></h2>
    <div class="btn-group">
    </div>
    <p>
        <?php
        $url = array();

        if (!empty($foreignId) && !empty($foreignModel)) {
            $url = array($foreignModel, $foreignId);
        }

        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></p>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="CitizensIndexTable">
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
                <th class="actions"><?php echo __('Action', true); ?></th>
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
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Citizen']['id']), array('class' => 'btn btn-default CitizensIndexControl')); ?>
                    </div>
                </td>
            </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="CitizensIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('#CitizensIndexTable th a, div.paging a, a.CitizensIndexControl').click(function () {
                $('#CitizensIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>