<?php session_start(); ?>
<?php $dbc = mysqli_connect('localhost', 'root', '', 'baza1') or
die('Error connecting to MySQL server.'. mysqli_connect_error()); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Projekt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
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


<br/>
<?php   

if (isset($_POST["submit"])){
    $date = date("Y-m-d");
    $Naslov = $_POST["naslov"];
    $ks = $_POST["kratki_sadržaj"];
    $vijest = $_POST["vijest"];
    $tip = $_POST["tip"];
    $slika = $_FILES["image"]["name"];

    if (isset($_POST["kutija"])){
    $javno = 1;
    }
    else {
        $javno = 0;
    }

}

$query = "INSERT INTO baza1 (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$date', '$Naslov', '$ks', '$vijest', '$slika', '$tip', '$javno')";


$result = mysqli_query($dbc, $query) or die('Error queryng database.');

move_uploaded_file($_FILES["image"]["tmp_name"], "pictures/$slika");

mysqli_close($dbc);

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10">
            <h2><?php echo $ks ?></h2>
        </div>
        <div class="col-xl-2">
            <div class="datum">
                <p><?php echo $date ?></p>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <p><?php echo wordwrap($vijest, 100, "<br>\n", TRUE); ?></p>
        </div>
    </div>
</div>


<div class="slika2">
    <?php echo "<img src='pictures/$slika'>";?>
</div>







<footer>
    <div class="footer">
        <p>Nachrichten vom 17.05.2019 | stern.de GmbH | Home</p>
    </div>
</footer>


</body>
</html>