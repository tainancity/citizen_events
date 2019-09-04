<div id="PlansIndex">
    <h2><?php echo __('計畫', true); ?></h2>
    <div class="btn-group">
    </div>
    <p>
        <?php
        $url = array();

        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></p>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="PlansIndexTable">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('Plan.name', '計畫名稱（專案名稱）', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.description', '計畫概述', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.plan_type', '辦理形式', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.units', '協辦單位', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Plan.note', '備註', array('url' => $url)); ?></th>
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
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Plan']['id']), array('class' => 'btn btn-default PlansIndexControl')); ?>
                    </div>
                </td>
            </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="PlansIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('#PlansIndexTable th a, div.paging a, a.PlansIndexControl').click(function () {
                $('#PlansIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>