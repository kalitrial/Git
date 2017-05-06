<?php
if(isset($_SESSION['admin'])) :?>
    <?php foreach ($data as $d) :?>

    <section>
        <a href="<?php echo ROOT_URL.'admin/products/'; ?>" class="btn btn-link">Back to All Products</a>
        <form action="<?php echo ROOT_URL.'admin/editdetails/'.$d['id'];?>" enctype="multipart/form-data" method="post" style="margin: 20px;">
            <div class="form-group">
                <label for="product_name">Name:
                    <input type="text" name="product_name" id="product_name" autocomplete="off" class="form-control" value="<?php echo $d['name']?>">
                </label>
            </div>

            <div class="form-group">
                <label for="desc">Description:
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" ><?php echo $d['desc']?>

            </textarea>
                </label>
            </div>


            <div class="form-group">
                <label for="price">Price:
                    <input type="text" name="price" id="price" autocomplete="off" class="form-control" value="<?php echo $d['price']?>">
                </label>
            </div>

            <div class="form-group">
                <label for="price_type">
                    <input type="radio" name="price_type" value="Negotiable" <?php
                    if($d['price_type'] == "Negotiable"){
                        echo "checked";
                    }
                    ?>>Negotiable
                </label>

                <label for="price_type">
                    <input type="radio" name="price_type" value="Fixed" <?php
                    if($d['price_type'] == "Fixed"){
                        echo "checked";
                    }
                    ?>>Fixed
                </label>

            </div>

            Image

            <div class="form-group">
                <label for="status">Status:
                    <select name="status" id="status">
                        <option value="active" <?php
                        if($d['status'] == "active"){
                            echo "selected";
                        }
                        ?>>Active</option>
                        <option value="inactive" <?php
                        if($d['status'] == "inactive"){
                            echo "selected";
                        }
                        ?>>Inactive</option>
                    </select>
                </label>

            </div>

            <div class="form-group">
                <input type="submit" name="delete" value="Delete" class="btn btn-outline-danger">
                <input type="submit" name="post" value="Save" class="btn btn-outline-success">
            </div>

        </form>
    </section>

<?php endforeach;?>
<?php else:
    header('Location: '.ROOT_URL.'admin/login');
 endif; ?>
