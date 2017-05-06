
<?php if(isset($_SESSION['admin'])) :?>
<div>
    <div style="width: 70%; float: left;">
        <form method="post" action="">
            <div class="form-group" style="margin: 10px;">
                <input type="text" name="item" placeholder="Search" autocomplete="off">
                <button type="submit" name="search" class="btn">Submit</button>
            </div >
        </form>
        <table class="table table-condensed">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>desc</th>
                <th>price</th>
                <th>price type</th>
                <th>status</th>
                <th>user id</th>
            </tr>
        <?php foreach($data as $d):?>
            <tr>
                <td><?php echo $d['id']; ?></td>
                <td><a href="<?php echo ROOT_URL.'admin/details/'.$d['id']; ?>"><?php echo $d['name']; ?></a></td>
                <td><?php echo $d['desc']; ?></td>
                <td><?php echo $d['price']; ?></td>
                <td><?php echo $d['price_type']; ?></td>
                <td><?php echo $d['status']; ?></td>
                <td><a href="<?php echo ROOT_URL.'admin/user/'.$d['user_id']; ?>"><?php echo $d['user_id']; ?></a></td>
            </tr>
            <? endforeach;?>
        </table>

    </div>

    <div style="width: 20%; float: right; margin: 20px;">
       <h3>Order By</h3>
        <div class="panel panel-default">
            <h5>Status</h5>
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo ROOT_URL.'admin/products/'; ?>">All</a></li>
                <li class="list-group-item"><a href="<?php echo ROOT_URL.'admin/products/active/'; ?>">active</a></li>
                <li class="list-group-item"><a href="<?php echo ROOT_URL.'admin/products/inactive/'; ?>">inactive</a></li>
            </ul>

            <h5>Date</h5>
            <ul class="list-group">
                <li class="list-group-item"><a href="">any date</a></li>
                <li class="list-group-item"><a href="">today</a></li>
                <li class="list-group-item"><a href="">this month</a></li>
                <li class="list-group-item"><a href="">this year</a></li>
            </ul>
        </div >

    </div>
</div>

<?php else:
    header('Location: '.ROOT_URL.'admin/login');
endif; ?>
