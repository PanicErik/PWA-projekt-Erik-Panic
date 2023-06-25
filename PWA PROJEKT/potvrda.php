<?php session_start();?>

<?php $dbc = mysqli_connect('localhost', 'root', '', 'baza1') or
die('Error connecting to MySQL server.'. mysqli_connect_error()); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>potvrda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                    <div class="boris">
                        <img src="Stern.png" width="80px" height="100px">
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-2">
                                <h1 class="text-right">stern</h1>
                            </div>
                        </div>
                        <div class="navigacija">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <a href="indeks.php">Home</a>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <a href="Unos.php">Formular</a>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <a href="registracija.php">Registracija</a>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <a href="Podnaslovi/administrator.php">Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>                          
        </div>
    </nav>
</header>

<?php 


if (isset($_POST["submit"])){
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($_POST["prava"])){
        $admin = 1;
    }
    else{
        $admin = 0;
    }
}

$sql = "SELECT username FROM korisnik WHERE username = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
if(mysqli_stmt_num_rows($stmt) > 0){
 echo '<script>alert("Korisnik već postoji")</script>';
 echo "    

<br><br><br><br>
<div class=boris>
<div class='container-fluid'>
<div class='row'>
    <h2>    
     <a href='registracija.php'>Nazad na registraciju ></a>
    <h2>
</div>
</div>
</div>"
;
}

else {
$hashedPassword = password_hash($password, CRYPT_BLOWFISH);
$stmt = mysqli_prepare($dbc, "INSERT INTO korisnik (ime, prezime, username, password, admin) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $username, $hashedPassword, $admin);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
echo "    

<br><br><br><br>
<div class=boris>
<div class='container-fluid'>
<div class='row'>
    <h2>
        <form name='form' method='POST' action='Podnaslovi/administrator.php'>
            <input type='submit' name='submit' id='submit' value='Dovrši >'>
        </form>
    <h2>
</div>
</div>
</div>"
;

$_SESSION["username"] = $username;
$_SESSION["passowrd"] = $hashedPassword;
$_SESSION["admin"] = $admin;
}
?>




<footer>
    <div class="footer">
        <p>Nachrichten vom 17.05.2019 | stern.de GmbH | Home</p>
    </div>
</footer>

<?php mysqli_close($dbc); ?>
</body>
</html>
