<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="member-dashboard container">
    <section class="row">
        <h2 class="font-weight-bold"> Your Order</h2>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Order</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($orders)) {
                        foreach ($orders as $orderKey => $order) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo ($orderKey + 1) ?> </th>
                                <td><?php echo $order['number'] ?></td>
                                <td class="text-capitalize"><?php echo $order['status'] ?></td>
                                <td class="text-capitalize"><?php echo $order['payment'] ?></td>
                                <td>
                                    <a href="<?php echo base_url("member/order/{$order['number']}") ?>" class="btn btn-sm btn-success">
                                        View
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</div>