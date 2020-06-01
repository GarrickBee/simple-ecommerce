<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="member-dashboard container">
    <section class="row">
        <h2 class="font-weight-bold">Order : <?php echo $order['number']; ?></h2>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($products)) {
                        $totalPrice = 0;
                        foreach ($products as $productKey => $product) {
                            $itemPrice = 0;
                            $itemPrice = $product['quantity'] * $product['price'];
                            $totalPrice += $itemPrice;

                    ?>
                            <tr class="text-capitalize">
                                <th scope="row"><?php echo ($productKey + 1) ?> </th>
                                <td>
                                    <a href="<?php echo $product['href'] ?>">
                                        <img src="<?php echo $product['image'] ?>" alt="" style="max-width:100px;width:100%">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo $product['href'] ?>">
                                        <?php echo $product['name'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $product['quantity'] ?>
                                </td>
                                <td>
                                    <?php echo $itemPrice  ?>
                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-right font-weight-bold">Total</td>
                        <td class="font-weight-bold">
                            <?php echo $totalPrice ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</div>