<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
</head>
<body>
<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
    <div class="product-item text-center border h-100 p-4">
        <img class="img-fluid mb-4" src="./img/tumeric-img.png" alt="" />
        <div class="mb-2">
            <small class="fa fa-star text-primary"></small>
            <small class="fa fa-star text-primary"></small>
            <small class="fa fa-star text-primary"></small>
            <small class="fa fa-star text-primary"></small>
            <small class="fa fa-star text-primary"></small>
            <small>(99)</small>
        </div>
        <a href="#" class="h6 d-inline-block mb-2">आदर्श हळद पावडर (सेलम)</a>
        <h5 class="text-primary mb-3">$99.99</h5>
        <form method="post" action="cartss.php">
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="product_name" value="आदर्श हळद पावडर (सेलम)">
            <input type="hidden" name="product_price" value="99.99">
            <button type="submit" class="btn btn-outline-primary px-3" name="add_to_cart">Add To Cart</button>
        </form>
    </div>
</div>

</body>
</html>
