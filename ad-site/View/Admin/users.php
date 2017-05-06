<?php
if(isset($_SESSION['admin'])) :?>
<div style="width: 100%;">
    <div style="width: 85%; float: left;">
        <form method="post" action="<?php echo ROOT_URL.'admin/users/search'?>">
            <div class="form-group" style="margin: 10px;">
                <input type="text" name="item" placeholder="Search">
                <button type="submit" name="search" class="btn">Submit</button>
            </div >
        </form>
        <table class="table table-condensed">
            <tr>
                <th>id</th>
                <th>username</th>
                <th>phone</th>
                <th>email</th>
                <th>Products</th>
                <th>Details</th>
                <th>Group</th>
            </tr>
            <?php foreach($data as $d):?>
                <?php if ($d['type'] == 1){
                    $group = "Admin";
                }elseif($d['type'] == 0){
                    $group = "User";
                }?>
                <tr>
                    <td><?php echo $d['id']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['phone']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><a href="<?php echo ROOT_URL.'admin/products/'.$d['id']; ?>" class="btn btn-outline-info">View Products</a></td>
                    <td><a href="<?php echo ROOT_URL.'admin/user/'.$d['id']; ?>" class="btn btn-outline-success">More Details</a></td>
                    <td><?php echo $group; ?></td>
                </tr>
            <? endforeach;?>
        </table>

    </div>

    <div style="width: 10%; float: right; margin: 20px; margin-top: 40px;">
        <div class="panel panel-default">
            <hr>
            <h5>Category</h5>
            <hr>
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo ROOT_URL.'admin/users/'; ?>">All</a></li>
                <li class="list-group-item"><a href="<?php echo ROOT_URL.'admin/users/admin'; ?>">administrator</a></li>
                <li class="list-group-item"><a href="<?php echo ROOT_URL.'admin/users/user'; ?>">normal user</a></li>
            </ul>
        </div >

    </div>
</div>

<?php else:
header('Location: '.ROOT_URL.'admin/login');
endif; ?>
