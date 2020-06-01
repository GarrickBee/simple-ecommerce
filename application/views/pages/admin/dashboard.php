<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="member-dashboard container">
    <section class="row">
        <h2 class="font-weight-bold">Admin : Your Orders</h2>
        <div class="col-12">
            <table class="table admin-dashboard">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Order</th>
                        <th scope="col">Buyer</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($orders)) {
                        foreach ($orders as $orderKey => $order) {
                            $paymentColor = ($order['payment'] == 'paid') ? 'text-success' : 'text-warning';
                            $statusColor = ($order['status'] == 'shiped') ? 'text-success' : 'text-warning';
                    ?>
                            <tr class="text-capitalize">
                                <th scope="row"><?php echo ($orderKey + 1) ?> </th>
                                <td><?php echo $order['number'] ?></td>
                                <td><?php echo $order['email'] ?></td>
                                <td class="font-weight-bold <?php echo $statusColor ?> ">
                                    <?php echo $order['status'] ?></td>
                                <td class="font-weight-bold  <?php echo $paymentColor ?>">
                                    <?php echo $order['payment'] ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url("admin/order/{$order['number']}") ?>" class="btn btn-sm btn-success">
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