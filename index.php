<?php
session_start();
include_once("connectdb.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = "";

if (isset($_POST['Submit'])) {

    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // เช็คเบอร์ซ้ำ
    $check = mysqli_query($conn, "SELECT id FROM users WHERE phone='$phone'");

    if (!$check) {
        die("Query Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($check) > 0) {

        $error = "เบอร์โทรนี้ถูกใช้งานแล้ว";

    } else {

        $sql = "INSERT INTO users (name, phone, address, password)
                VALUES ('$name', '$phone', '$address', '$password')";

        if (mysqli_query($conn, $sql)) {

            $_SESSION['name']  = $name;
            $_SESSION['phone'] = $phone;

            header("Location: shop.php");
            exit();

        } else {
            die("Insert Error: " . mysqli_error($conn));
        }
    }
}
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>Bunnii Box | สมัครสมาชิก</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg, #f8c8dc, #f3b6d6);
    height: 100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family: sans-serif;
}

.card-box{
    width:420px;
    background:#fdeaf2;
    border-radius:30px;
    padding:40px;
    box-shadow:0 20px 40px rgba(0,0,0,0.1);
}

.btn-pink{
    background:#ff4da6;
    border:none;
    border-radius:30px;
}
</style>
</head>

<body>

<div class="card-box">

<h3 class="text-center mb-4">🐰 Bunnii Box สมัครสมาชิก</h3>

<?php if ($error): ?>
<div class="alert alert-danger text-center">
    <?= $error ?>
</div>
<?php endif; ?>

<form method="post">
    <div class="mb-3">
        <label>ชื่อ</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>เบอร์โทร</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>ที่อยู่</label>
        <input type="text" name="address" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>รหัสผ่าน</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="d-grid">
        <button type="submit" name="Submit" class="btn btn-pink text-white">
            สมัครสมาชิก
        </button>
    </div>
</form>

</div>

</body>
</html>
