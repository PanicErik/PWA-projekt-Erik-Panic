<?php session_start();?>
<?php $dbc = mysqli_connect('localhost', 'root', '', 'baza1') or
die('Error connecting to MySQL server.'. mysqli_connect_error()); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Projekt</title>
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
$div1 = "<div class='Drugi'>
<div class='container-fluid'>
    <div class='row'>
        <div class='col-lg-4'>";

$div2 ="</div>
</div>
</div>
</div>";

$div3 = "<div class='col-lg-4'>";
$div4 = "</div>";

?>



<br>
<br>
<br>





<div class="drugi">
    <h2>
        <div class="boris">
            <a href="Podnaslovi/Politik.php">
                POLITIK >
            </a>
        </div>
    </h2>
</div>

<br>
<?php 
$brojač = 1;
$query = "SELECT * FROM baza1 WHERE arhiva=1 AND kategorija='Politik' LIMIT 3"; 

$result = mysqli_query($dbc, $query);


while($row = mysqli_fetch_array($result)) {
    
?>




<?php 

if ($brojač < 4){
    $id = $row["id"];
    if ($brojač==1){
    echo $div1;
    echo "<div class='kontejnet'>";
    echo "<div class='slika'>";
    echo "<img src='pictures/".$row['slika']."' width='200vw' height='100vh'>";
    echo "</div>";
    echo "<a class='crveni' href='clanak.php?id=$id'>".$row['naslov']."</a>";
    echo "<h6>".$row['sazetak']."</h6>";
    echo "</div>";  
    echo $div4;
    }

    else {
        echo $div3;
        echo "<div class='kontejnet'>";
        echo "<div class='slika'>";
        echo "<img src='pictures/".$row['slika']."' width='200vw' height='100vh'>";
        echo "</div>";
        echo "<a class='crveni' href='clanak.php?id=$id'>".$row['naslov']."</a>";
        echo "<h6>".$row['sazetak']."</h6>";
        echo "</div>"; 
        echo $div4;
        if ($brojač == 3){
            echo $div2;
        } 

    }
    $brojač = $brojač + 1;
}






?>

<?php }?>



<br>
<br>
<br>

<div class="drugi">
    <h2>
        <div class="boris">
            <a href="Podnaslovi/Drugi.php">
                GESUNDHEIT >
            </a>
        </div>
    </h2>
</div>

<br/>

<?php 
$brojač = 1;
$query = "SELECT * FROM baza1 WHERE arhiva=1 AND kategorija='Gesundheit' LIMIT 3"; 

$result = mysqli_query($dbc, $query);


while($row = mysqli_fetch_array($result)) {
    
?>




<?php 



if ($brojač < 4){
    $id = $row["id"];
    if ($brojač==1){
    echo $div1;
    echo "<div class='kontejnet'>";
    echo "<div class='slika'>";
    echo "<img src='pictures/".$row['slika']."' width='200vw' height='100vh'>";
    echo "</div>";
    echo "<a class='crveni' href='clanak.php?id=$id'>".$row['naslov']."</a>";
    echo "<h6>".$row['sazetak']."</h6>";
    echo "</div>";  
    echo $div4;
    }

    else {
        echo $div3;
        echo "<div class='kontejnet'>";
        echo "<div class='slika'>";
        echo "<img src='pictures/".$row['slika']."' width='200vw' height='100vh'>";
        echo "</div>";
        echo "<a class='crveni' href='clanak.php?id=$id'>".$row['naslov']."</a>";
        echo "<h6>".$row['sazetak']."</h6>";
        echo "</div>"; 
        echo $div4;
        if ($brojač == 3){
            echo $div2;
        } 

    }
    $brojač = $brojač + 1;
}



?>

<?php }?>

<footer>
    <div class="footer">
        <p>Nachrichten vom 17.05.2019 | stern.de GmbH | Home</p>
    </div>
</footer>

<?php mysqli_close($dbc); ?>
</body>
</html>