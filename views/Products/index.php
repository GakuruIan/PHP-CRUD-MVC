<h1>Products</h1>

 <table class="table">
 <caption>List of Products</caption>
 <div class="wrap py-4">
 <a href="/products/create" class="btn btn-success mb-3">Create Product</a>
 <form>
<div class="form-group mb-3 py-2 inline">
     <input type="text" class="form-control mb-3 input" placeholder="search product"name="search" <?php echo $search; ?> >
     <button class="btn btn-success  search" type="submit" name="submit">search</button>
</div>
</form>
 </div>
 <thead class="thead-dark">
     <tr>
     <th scope="col">Id</th>
     <th scope="col">Title</th>
     <th scope="col">Image</th>
     <th scope="col">Description</th>
     <th scope="col">Price</th>
     <th scope="col">Action</th>
     </tr>
 </thead>
 <tbody>
     <?php foreach($products as $i => $product):?>
         <tr>
         <td><?php echo $product['id']?></td>
         <td><?php echo $product['title']?></td>
         <td>
         <?php if($product['image']):?>
             <img src="<?php echo $product['image']?>" class='img'>
             <?php endif ;?>
        </td>
         <td><?php echo $product['description']?></td>
         <td><?php echo $product['price']?></td>
         <td>
            <a href="/products/update?id=<?php echo $product['id']?>" class="btn btn-sm btn-primary">Edit</a>
            <form method="post" action="/products/delete">
            <input type="hidden" name='id' value="<?php echo $product['id']?>">
            <button type="submit" name="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
         </td>
     </tr>
          <?php endforeach; ?>
 </tbody>
</table>