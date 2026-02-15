<?php
session_start();

// ถ้ายังไม่มีข้อมูล ให้ตั้งค่าเริ่มต้น
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = [
        "name" => "",
        "email" => "",
        "phone" => ""
    ];
}

// เมื่อกดบันทึก
if(isset($_POST['save'])){
    $_SESSION['user']['name'] = $_POST['name'];
    $_SESSION['user']['email'] = $_POST['email'];
    $_SESSION['user']['phone'] = $_POST['phone'];
    $success = "บันทึกข้อมูลเรียบร้อยแล้ว";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>โปรไฟล์ของฉัน</title>

<style>
body{
    font-family:Segoe UI;
    background:#f4f6f9;
    margin:0;
}
.container{
    max-width:500px;
    margin:80px auto;
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
}
h2{
    text-align:center;
    margin-bottom:25px;
}
input{
    width:100%;
    padding:10px;
    margin-bottom:15px;
    border:1px solid #ddd;
    border-radius:6px;
}
button{
    width:100%;
    padding:10px;
    background:#000;
    color:#fff;
    border:none;
    border-radius:6px;
    cursor:pointer;
}
button:hover{
    background:#333;
}
.success{
    color:green;
    text-align:center;
    margin-bottom:15px;
}
.back{
    text-align:center;
    margin-top:15px;
}
a{
    text-decoration:none;
    color:#000;
}
</style>
</head>

<body>

<div class="container">
    <h2>แก้ไขข้อมูลส่วนตัว</h2>

    <?php if(isset($success)) echo "<div class='success'>$success</div>"; ?>

    <form method="post">
        <input type="text" name="name" value="<?=$_SESSION['user']['name']?>" placeholder="ชื่อ-นามสกุล" required>
        <input type="email" name="email" value="<?=$_SESSION['user']['email']?>" placeholder="อีเมล" required>
        <input type="text" name="phone" value="<?=$_SESSION['user']['phone']?>" placeholder="เบอร์โทรศัพท์" required>
        <button type="submit" name="save">บันทึกข้อมูล</button>
    </form>

    <div class="back">
        <a href="shop.php">← กลับหน้าหลัก</a>
    </div>
</div>

</body>
</html>
