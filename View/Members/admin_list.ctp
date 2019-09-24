<table class="table table-bordered">
    <tr>
        <th>單位</th>
        <th>帳號</th>
    </tr>
        <?php
        $i = 0;
        foreach ($organizations as $k => $title) {
            echo '<tr>';
            echo '<td>' . $title . '</td>';
            echo '<td>';
            if(empty($accounts[$k])) {
                echo '尚未註冊';
            } else {
                foreach($accounts[$k] AS $member) {
                    echo $member['Member']['username'] . ',';
                }
            }
            echo '</td>';
            echo '</tr>';
        }
            ?>
</table>