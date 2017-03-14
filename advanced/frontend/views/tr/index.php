<?php
?>
<table>
    <?php foreach ($res as $key=>$val){?>
    <tr>
    <td><?=$val['t_lx']?></td>
    <td><?=$val['t_img']?></td>
    <td><?=$val['t_price']?></td>
    <td><?=$val['t_txt']?></td>
    <td><?=$val['t_hgd']?></td>
    </tr>
    <?php }?>
</table>
