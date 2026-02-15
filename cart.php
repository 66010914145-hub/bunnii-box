<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ตะกร้าสินค้า - Bunnii Box</title>

<style>
body{
    font-family:'Segoe UI',sans-serif;
    margin:0;
    background:#f4f6f9;
}

.container{
    max-width:1000px;
    margin:auto;
    padding:40px 20px;
}

h1{
    text-align:center;
    margin-bottom:40px;
}

/* การ์ดรวม */
.card{
    background:#fff;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,0.05);
    padding:25px;
    margin-bottom:25px;
}

/* รายการสินค้า */
.cart-item{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:15px 0;
    border-bottom:1px solid #eee;
}

.cart-item:last-child{
    border-bottom:none;
}

.cart-item img{
    width:90px;
    border-radius:8px;
}

.item-info{
    flex:1;
    margin-left:20px;
}

.item-name{
    font-weight:600;
    margin-bottom:5px;
}

.item-price{
    color:#666;
}

.remove-btn{
    background:#e74c3c;
    padding:6px 12px;
    border:none;
    color:#fff;
    border-radius:6px;
    cursor:pointer;
}

.remove-btn:hover{
    background:#c0392b;
}

/* ยอดรวม */
.total{
    text-align:right;
    font-size:20px;
    font-weight:bold;
    margin-top:20px;
}

/* ส่วนชำระเงิน */
.payment-box{
    text-align:center;
}

.bank-info{
    background:#fafafa;
    padding:15px;
    border-radius:8px;
    margin:15px 0;
    line-height:1.8;
}

.qr{
    width:200px;
    margin:20px 0;
}

.pay-btn{
    background:#000;
    padding:10px 20px;
    color:#fff;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

.pay-btn:hover{
    background:#333;
}

.status{
    text-align:center;
    margin-top:20px;
    font-size:18px;
}

.empty{
    text-align:center;
    color:#888;
    padding:30px 0;
}
</style>
</head>

<body>

<div class="container">

    <h1>ตะกร้าสินค้า</h1>

    <div class="card">
        <div id="cart-list"></div>
        <div class="total" id="total-price"></div>
    </div>

    <div id="payment-section"></div>

    <div class="status" id="order-status">
        สถานะออเดอร์: ยังไม่ชำระเงิน
    </div>

</div>

<script>
let cart = JSON.parse(localStorage.getItem("cart")) || [];
let cartList = document.getElementById("cart-list");
let total = 0;

if(cart.length === 0){
    cartList.innerHTML = "<div class='empty'>ยังไม่มีสินค้าในตะกร้า</div>";
}else{

    cart.forEach((item,index)=>{
        total += parseInt(item.price.replace(/[^\d]/g,""));

        cartList.innerHTML += `
            <div class="cart-item">
                <img src="${item.img}">
                <div class="item-info">
                    <div class="item-name">${item.name}</div>
                    <div class="item-price">${item.price}</div>
                </div>
                <button class="remove-btn" onclick="removeItem(${index})">ลบ</button>
            </div>
        `;
    });

    document.getElementById("total-price").innerHTML =
        "รวมทั้งหมด: ฿" + total.toLocaleString();

    document.getElementById("payment-section").innerHTML = `
        <div class="card payment-box">
            <h2>ชำระเงินโดยโอนผ่านธนาคาร</h2>

            <div class="bank-info">
                ธนาคาร: กสิกรไทย <br>
                ชื่อบัญชี: บริษัท บันนี่บ็อกซ์ จำกัด <br>
                เลขบัญชี: 123-4-56789-0 <br>
                <strong>ยอดที่ต้องโอน: ฿${total.toLocaleString()}</strong>
            </div>

            <p>สแกน QR Code เพื่อโอนเงิน</p>
            <img src="images/qr.png" class="qr">

            <br>
            <button class="pay-btn" onclick="confirmPayment()">แจ้งว่าโอนแล้ว</button>
        </div>
    `;
}

function removeItem(index){
    cart.splice(index,1);
    localStorage.setItem("cart", JSON.stringify(cart));
    location.reload();
}

function confirmPayment(){
    localStorage.setItem("order_status","รอตรวจสอบการโอนเงิน");
    document.getElementById("order-status").innerHTML =
        "สถานะออเดอร์: รอตรวจสอบการโอนเงิน";
}
</script>

</body>
</html>
