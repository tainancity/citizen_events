<div id="SpeakersIndex">
    <h2><?php echo __('講師', true); ?></h2>
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
    <table class="table table-bordered" id="SpeakersIndexTable">
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
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Speaker']['id']), array('class' => 'btn btn-default SpeakersIndexControl')); ?>
                    </div>
                </td>
            </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="SpeakersIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('#SpeakersIndexTable th a, div.paging a, a.SpeakersIndexControl').click(function () {
                $('#SpeakersIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>