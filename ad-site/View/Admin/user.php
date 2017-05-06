<?php
if(isset($_SESSION['admin'])) :?>
<a href="<?php echo ROOT_URL.'admin/users/' ?>" class="btn btn-link">Back to Users</a>

<?php foreach ($data as $d) :?>

    <div align="center" style="margin: 30px;">
        <form action="<?php echo ROOT_URL.'admin/edituser/'.$d['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fname">First Name
                    <input type="text" name="fname" autocomplete="off" class="form-control" value="<?php echo $d['fname'];?>">
                </label>
            </div>

            <div class="form-group">
                <label for="lname">Last Name
                    <input type="text" name="lname" autocomplete="off" class="form-control" value="<?php echo $d['lname'];?>">
                </label>
            </div>

            <div class="form-group">
                <label for="username">Username
                    <input type="text" name="username" autocomplete="off" class="form-control" value="<?php echo $d['username'];?>">
                </label>
            </div>

            <div class="form-group">
                <label for="phone">Phone
                    <input type="text" name="phone" autocomplete="off" class="form-control" value="<?php echo $d['phone'];?>">
                </label>
            </div>

            <div class="form-group">
                <label for="email">Email
                    <input type="text" name="email" autocomplete="off" class="form-control" value="<?php echo $d['email'];?>">
                </label>
            </div>

            <div class="form-group">
                <label for="pass">Password
                    <input type="Password" name="pass" autocomplete="off" class="form-control" placeholder="********************">
                </label>
            </div>

            <div class="form-group">
                <input type="submit" name="delete" value="Delete" class="btn btn-outline-danger">
                <input type="submit" name="edituser" value="Save and Exit" class="btn btn-outline-success">
            </div>

        </form>
    </div>

<?php endforeach;?>
<?php else:
    header('Location: '.ROOT_URL.'admin/login');
endif; ?>
