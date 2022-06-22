<div class="form_wrapper">
   <form action=""method="post" class="w-50"enctype="multipart/form-data">
    <div class="py-3">
       <?php if($errors):?>
           <div class="alert alert-danger">
              <?php foreach ($errors as $error):?>
                <small><?php echo $error ?></small>
                <br/>
                <?php endforeach; ?>
           </div>
       <?php endif; ?>
       <div class="form-group mb-3">
           <?php if($product['image']): ?>
            <img src="../<?php echo $product['image']?>" class='update-img'>
            <?php endif ;?>
            <br/>
           <label for ="image">Product Image</label>
           <br/>
           <input type="file" name="image">
       </div>
       <div class="form-group mb-3">
           <label for ="title">Title</label>
           <input type="text" class="form-control" name='title' value="<?php echo $product['title']?>">
       </div>
       <div class="form-group mb-3">
           <label for ="Description">Description</label>
           <textarea class="form-control" name='Description'><?php echo $product['description']?></textarea>
       </div>
       <div class="form-group mb-3">
           <label for ="price">price</label>
           <input type="number" class="form-control" name='price'value="<?php echo $product['price']?>">
       </div>
       <div class="form-group mb-3">
           <input type="submit" class="btn btn-success" id="mybtn" name='submit' value="submit">
       </div>
       </div>
   </form>
   </div>