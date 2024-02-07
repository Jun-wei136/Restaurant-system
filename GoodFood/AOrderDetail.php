<!--This page is aimed to appear in <td>Details of the table in AOrder.php-->
<div>
    <table border=1 style="width:100%; margin-left:0px; border-collapse:collapse; font-family:Arial; font-weight:normal;">
        <thead style="height:40px; background:#E2C2B3; color:#403234;">
            <th>Name</th>
            <th style="width:80px;">Price</th>
            <th style="width:55px;">Amt</th>
            <th style="width:90px;">Subtotal</th>
        </thead>

        <tbody>
        <?php  //Linking two database tables "purchase_detail and menu" via their common data "id and menu_id" by searching with order_id
        $sql1="select * from purchase_detail left join menu on menu.id=purchase_detail.menu_id where order_id='".$row['order_id']."'"; 
        $query1=$conn->query($sql1);

        while($row1=$query1->fetch_array())
        {
        ?>
            <tr>
            <td style="padding:10px;"><?php echo $row1['name']; ?></td>
            <td>$<?php echo number_format($row1['price'], 2); ?></td> <!--Number format allowing to appear number to two decimal place-->
            <td><?php echo $row1['quantity']; ?></td>
            <td>$<?php $subt = $row1['price']*$row1['quantity']; echo number_format($subt, 2); ?></td> <!--Multiplying for Subtotal-->
            </tr>                                            <!--Number format allowing to appear number to two decimal place-->
        <?php
        }
        ?>

            <tr style="height:40px;">
            <td colspan="2"></td>
            <td><b>TOTAL</b></td> 
            <td>$<?php echo number_format($row['total'], 2); ?></td> <!--Number format allowing to appear number to two decimal place-->
            </tr>
        </tbody>
    </table>
</div>