<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bunnii Box</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{margin:0;font-family:'Segoe UI',sans-serif;background:#f5f5f5;}
.navbar{display:flex;justify-content:space-between;align-items:center;padding:15px 60px;background:#fff;border-bottom:1px solid #eee;}
.brand{font-size:22px;font-weight:600;}
.icons{display:flex;gap:25px;font-size:20px;}
.icons a{color:black;text-decoration:none;} /* เพิ่มให้ไอคอนกดได้ */
.hero{height:500px;background:url("./img/4.webp") center/cover no-repeat;display:flex;align-items:center;padding-left:80px;color:#fff;}
.hero-text h1{font-size:60px;margin:0;}
.hero-text p{font-size:22px;margin:20px 0;}
.hero-btn{padding:12px 30px;border:none;background:#fff;color:#000;cursor:pointer;font-weight:600;}
.products{display:flex;justify-content:center;gap:120px;padding:80px 60px;background:#fff;}
.card{text-align:center;width:280px;}
.card img{width:100%;height:280px;object-fit:contain;}
.name{margin:20px 0 10px;font-size:18px;}
.price{font-size:18px;margin-bottom:20px;}
.btn{padding:10px 25px;border:1px solid #000;background:#fff;cursor:pointer;text-decoration:none;color:black;display:inline-block;}
.btn:hover{background:#000;color:#fff;}
#result{text-align:center;margin:60px 0;}
.new-products{display:grid;grid-template-columns:repeat(4,1fr);gap:40px;padding:80px 120px;background:#f3f3f3;}
.item{background:#fff;padding:30px;text-align:center;}
.item img{width:100%;height:250px;object-fit:contain;}
.title{font-size:16px;margin:15px 0;}
.footer{text-align:center;padding:30px;color:#aaa;background:#fff;}
</style>
</head>

<body>

<div class="navbar">
    <div class="brand">Bunnii Box</div>
    <div class="icons">

        <!-- 👤 โปรไฟล์ -->
        <a href="profile.php">
            <i class="fa-regular fa-user"></i>
        </a>

        <!-- ❤️ -->
        <a href="#">
            <i class="fa-regular fa-heart"></i>
        </a>

        <!-- 🛒 -->
        <a href="cart.php" style="position:relative;">
            <i class="fa-solid fa-bag-shopping"></i>
            <span id="cartCount" style="
                position:absolute;
                top:-8px;
                right:-10px;
                background:red;
                color:white;
                font-size:12px;
                padding:2px 6px;
                border-radius:50%;
            ">0</span>
        </a>
    </div>
</div>

<section class="hero">
    <div class="hero-text">
        <h1>Stitch</h1>
        <p>Stitch Adventure Series Vinyl Plush Pendant</p>
        <button class="hero-btn" onclick="location.href='product.php?id=1'">SHOP NOW</button>
    </div>
</section>

<section class="products">

<div class="card">
<img src="./img/5.jpg">
<div class="name">Stitch Adventure Series Vinyl Plush Pendant</div>
<div class="price">฿550.00</div>
<a href="product.php?id=1" class="btn">เปิดกล่องเดี๋ยวนี้</a>
</div>

<div class="card">
<img src="./img/6.jpg">
<div class="name">Zsiga Under the Sun Series Figures</div>
<div class="price">฿380.00</div>
<a href="product.php?id=2" class="btn">เปิดกล่องเดี๋ยวนี้</a>
</div>

<div class="card">
<img src="./img/3.jpg">
<div class="name">SPY x FAMILY Daily Life Series Figures</div>
<div class="price">฿380.00</div>
<a href="product.php?id=3" class="btn">เปิดกล่องเดี๋ยวนี้</a>
</div>

</section>

<div id="result"></div>

<section class="new-products">

<div class="item">
<img src="./img/7.jpg">
<div class="title">Twinkle Twinkle Savor the Moment Series-Fresh-Baked Mini Cookies</div>
<div class="price">฿320.00</div>
<button class="btn" onclick="addToCart(this)">เพิ่มลงตะกร้า</button>
</div>

<div class="item">
<img src="./img/8.jpg">
<div class="title">Apple of My Eye Series-Twinkle Twinkle Festival Gift Box</div>
<div class="price">฿1,890.00</div>
<button class="btn" onclick="addToCart(this)">เพิ่มลงตะกร้า</button>
</div>

<div class="item">
<img src="./img/1.jpg">
<div class="title">Twinkle Twinkle Crush On You Series-Photo Frame Fridge Magnet Blind Box</div>
<div class="price">฿380.00</div>
<button class="btn" onclick="addToCart(this)">เพิ่มลงตะกร้า</button>
</div>

<div class="item">
<img src="./img/2.jpg">
<div class="title">Twinkle Twinkle Crush On You Series-Hand-in-Hand Heart Bag</div>
<div class="price">฿850.00</div>
<button class="btn" onclick="addToCart(this)">เพิ่มลงตะกร้า</button>
</div>

</section>

<div class="footer">
© 2026 Bunnii Box
</div>

<script>
let cart = JSON.parse(localStorage.getItem("cart")) || [];

function updateCart(){
    document.getElementById("cartCount").innerText = cart.length;
}
updateCart();

function addToCart(button){
    const item = button.closest(".item") || button.closest(".card");

    const name =
        item.querySelector(".title") ?
        item.querySelector(".title").innerText :
        item.querySelector(".name").innerText;

    const price = item.querySelector(".price").innerText;
    const img = item.querySelector("img").getAttribute("src");

    cart.push({
        name:name,
        price:price,
        img:img
    });

    localStorage.setItem("cart", JSON.stringify(cart));
    updateCart();
    alert("เพิ่มสินค้าลงตะกร้าแล้ว 🛒");
}
</script>

</body>
</html>
