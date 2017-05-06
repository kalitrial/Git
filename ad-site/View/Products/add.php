<section>
    <form action="" enctype="multipart/form-data" method="post" style="margin: 20px;">
        <div class="form-group">
            <label for="product_name">Name:
                <input type="text" name="product_name" id="product_name" autocomplete="off" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label for="desc">Description:
                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">

            </textarea>
            </label>
        </div>


        <div class="form-group">
            <label for="price">Price:
                <input type="text" name="price" id="price" autocomplete="off" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label for="price_type">
                <input type="radio" name="price_type" value="Negotiable" checked>Negotiable
            </label>

            <label for="price_type">
                <input type="radio" name="price_type" value="Fixed">Fixed
            </label>

        </div>


        <div class="form-group">
            <label for="image">
                <input type="file" name="image" id="image" autocomplete="off" >
            </label>
        </div>

        <input type="hidden" name="status"  value="inactive">


        <div class="form-group">
            <input type="submit" name="post" value="Submit">
        </div>

    </form>
</section>