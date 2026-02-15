<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$products = [

    1 => [
        "name" => "Stitch Adventure Series Vinyl Plush Pendant",
        "price" => "฿550.00",
        "img" => "./img/5.jpg"
    ],

    2 => [
        "name" => "Zsiga Under the Sun Series Figures",
        "price" => "฿380.00",
        "img" => "./img/6.jpg"
    ],

    3 => [
        "name" => "SPY x FAMILY Daily Life Series Figures",
        "price" => "฿380.00",
        "img" => "./img/3.jpg"
    ]

];

if(!array_key_exists($id,$products)){
    die("ไม่พบสินค้า");
}

$product = $products[$id];
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title><?php echo $product['name']; ?></title>

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background:#f6f6f6;
}

/* ====== MAIN PRODUCT ====== */
.wrapper{
    display:flex;
    gap:80px;
    padding:80px 120px;
    background:#fff;
}

.image-box{
    flex:1;
    text-align:center;
}

.image-box img{
    width:450px;
    object-fit:contain;
}

.detail-box{
    flex:1;
}

h1{
    font-size:32px;
    margin-bottom:20px;
}

.price{
    font-size:28px;
    font-weight:700;
    color:#d60000;
    margin-bottom:10px;
}

.shipping{
    color:#d60000;
    margin-bottom:30px;
}

.btn-black{
    width:100%;
    padding:15px;
    background:#000;
    color:#fff;
    border:none;
    font-size:16px;
    cursor:pointer;
    margin-bottom:15px;
}

.btn-outline{
    width:100%;
    padding:15px;
    background:#fff;
    border:1px solid #000;
    font-size:16px;
    cursor:pointer;
}

.btn-black:hover{opacity:0.9;}
.btn-outline:hover{background:#000;color:#fff;}

/* ====== RELATED SECTION ====== */
.related-section{
    background:#f3f3f3;
    padding:50px 80px;
}

.related-wrapper{
    background:#fff;
    padding:30px;
    border-radius:12px;
    overflow:hidden;
    position:relative;
}

.related-list{
    display:flex;
    gap:40px;
    overflow-x:auto;
    scroll-behavior:smooth;
}

.related-item{
    text-align:center;
    min-width:120px;
}

.related-item img{
    width:100px;
    height:120px;
    object-fit:contain;
}

.related-item p{
    font-size:14px;
    margin-top:10px;
}

.related-list::-webkit-scrollbar{
    display:none;
}

.arrow{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    background:#fff;
    border:1px solid #ddd;
    width:35px;
    height:35px;
    border-radius:50%;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
}

.arrow.left{ left:10px; }
.arrow.right{ right:10px; }
</style>
</head>

<body>

<!-- ====== PRODUCT SECTION ====== -->
<div class="wrapper">

    <div class="image-box">
        <img src="<?php echo $product['img']; ?>">
    </div>

    <div class="detail-box">
        <h1><?php echo $product['name']; ?></h1>
        <div class="price"><?php echo $product['price']; ?></div>
        <div class="shipping">จัดส่งฟรีเมื่อซื้อเกิน ฿1,000.00</div>

        <button class="btn-black" onclick="addToCart()">
            เลือกให้ฉัน
        </button>

        <button class="btn-outline" onclick="addToCart()">
            ซื้อกล่องสุ่มหลายชิ้น
        </button>
    </div>

</div>

<!-- ====== RELATED PRODUCTS ====== -->
<section class="related-section">
    <div class="related-wrapper">

        <div class="arrow left" onclick="scrollLeft()">❮</div>
        <div class="arrow right" onclick="scrollRight()">❯</div>

        <div class="related-list" id="relatedList">

            <div class="related-item">
                <img src="./img/5.jpg">
                <p>Dalmatian Stitch</p>
            </div>

            <div class="related-item">
                <img src="./img/6.jpg">
                <p>Cheshire Cat Stitch</p>
            </div>

            <div class="related-item">
                <img src="./img/3.jpg">
                <p>Mickey Stitch</p>
            </div>

            <div class="related-item">
                <img src="./img/5.jpg">
                <p>Pinocchio Stitch</p>
            </div>

            <div class="related-item">
                <img src="./img/6.jpg">
                <p>Tigger Stitch</p>
            </div>

            <div class="related-item">
                <img src="./img/3.jpg">
                <p>Dumbo Stitch</p>
            </div>

            <div class="related-item">
                <img src="./img/5.jpg">
                <p>Winnie the Pooh Stitch</p>
            </div>

            <div class="related-item">
                <img src="./img/6.jpg">
                <p>Simba Stitch</p>
            </div>

        </div>

    </div>
</section>

<script>
function addToCart(){

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    cart.push({
        name: "<?php echo $product['name']; ?>",
        price: "<?php echo $product['price']; ?>",
        img: "<?php echo $product['img']; ?>"
    });

    localStorage.setItem("cart", JSON.stringify(cart));

    alert("เพิ่มสินค้าลงตะกร้าแล้ว 🛒");
}

function scrollLeft(){
    document.getElementById("relatedList").scrollBy({
        left:-300,
        behavior:"smooth"
    });
}

function scrollRight(){
    document.getElementById("relatedList").scrollBy({
        left:300,
        behavior:"smooth"
    });
}
</script>

</body>
</html>
