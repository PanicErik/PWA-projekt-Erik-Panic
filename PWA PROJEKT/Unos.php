<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Unos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>

<script type="text/javascript">

window.addEventListener('DOMContentLoaded', (event) => {
            const form = document.forms['form'];

            form.addEventListener('submit', (event) => {
                const naslovInput = form.elements['naslov'];
                const naslovValue = naslovInput.value.trim();
                const naslovError = document.getElementById('poruka_naslov');

                if (naslovValue.length < 5 || naslovValue.length > 30) {
                    naslovInput.classList.add('is-invalid');
                    naslovError.textContent = 'Naslov vijesti mora imati između 5 i 30 znakova.';
                    naslovError.style.color = "red";
                    naslovInput.style.borderColor = "red";
                    event.preventDefault();
                } else {
                    naslovInput.classList.remove('is-invalid');
                    naslovError.textContent = '';
                }

                const kratkiSadrzajInput = form.elements['kratki_sadržaj'];
                const kratkiSadrzajValue = kratkiSadrzajInput.value.trim();

                if (kratkiSadrzajValue.length < 10 || kratkiSadrzajValue.length > 100) {
                    kratkiSadrzajInput.classList.add('is-invalid');
                    kratkiSadrzajInput.nextElementSibling.classList.add('error');
                    kratkiSadrzajInput.nextElementSibling.textContent = 'Kratki sadržaj vijesti mora imati između 10 i 100 znakova.';
                    kratkiSadrzajInput.nextElementSibling.style.color = "red";
                    kratkiSadrzajInput.style.borderColor = "red";
                    event.preventDefault();
                } else {
                    kratkiSadrzajInput.classList.remove('is-invalid');
                    kratkiSadrzajInput.nextElementSibling.classList.remove('error');
                    kratkiSadrzajInput.nextElementSibling.textContent = '';
                }

                const vijestInput = form.elements['vijest'];
                const vijestValue = vijestInput.value.trim();

                if (vijestValue.length === 0) {
                    vijestInput.classList.add('is-invalid');
                    vijestInput.nextElementSibling.classList.add('error');
                    vijestInput.nextElementSibling.textContent = 'Unesite tekst vijesti.';
                    vijestInput.nextElementSibling.style.color = "red";
                    vijestInput.style.borderColor = "red";
                    event.preventDefault();
                } else {
                    vijestInput.classList.remove('is-invalid');
                    vijestInput.nextElementSibling.classList.remove('error');
                    vijestInput.nextElementSibling.textContent = '';
                }

                const slikaInput = form.elements['image'];
                const slikaValue = slikaInput.value;

                if (slikaValue === '') {
                    slikaInput.classList.add('is-invalid');
                    slikaInput.nextElementSibling.classList.add('error');
                    slikaInput.nextElementSibling.textContent = 'Odaberite sliku.';
                    event.preventDefault();
                } else {
                    slikaInput.classList.remove('is-invalid');
                    slikaInput.nextElementSibling.classList.remove('error');
                    slikaInput.nextElementSibling.textContent = '';
                }

                const kategorijaInput = form.elements['tip'];
                const kategorijaValue = kategorijaInput.value;

                if (kategorijaValue === '') {
                    kategorijaInput.classList.add('is-invalid');
                    kategorijaInput.nextElementSibling.classList.add('error');
                    kategorijaInput.nextElementSibling.textContent = 'Odaberite kategoriju.';
                    event.preventDefault(); 
                } else {
                    kategorijaInput.classList.remove('is-invalid');
                    kategorijaInput.nextElementSibling.classList.remove('error');
                    kategorijaInput.nextElementSibling.textContent = '';
                }
            });
        });
</script>


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

<form enctype="multipart/form-data" name="form" method="POST" action="skripta.php">

    <div class="container-fluid">
        <div class="row">
            <label for="naslov">Naslov:</label>
        <div class="row">    
            <input type="text" name="naslov" id="naslov">
        </div>
        <div class="row">    
            <span id="poruka_naslov" class="error"></span>
        </div>
    </div>

    <hr>
    
    <div class="container-fluid">
        <div class="row">
            <lable for="kratki_sadržaj">Kratki sadržaj vijesti (do 100 znakova):</lable>
        </div>
        <div class="row">
            <textarea rows="5" name="kratki_sadržaj" id="kratki_sadržaj"></textarea>
            <span id="poruka_ks" class="error"></span>
        </div>
    </div>

    <hr>

    <div class="container-fluid">
        <div class="row">
            <lable for="vijest">Vijest:</lable>
        </div>
        <div class="row">
            <textarea rows="15" name="vijest" id="vijest"></textarea>
            <span id="poruka_vijest" class="error"></span>
        </div>
    </div>

    <hr>

    <div class="container-fluid">
        <div class="row">
            <lable for="tip">Tip vijesti:</lable>
        </div>
        <div class="row">
            <select name="tip" id="tip">
                <option value="Politik">
                    Politik
                </option>
                <option value="Gesundheit">
                    Gesundheit 
                </option>
            </select>
        </div>
    </div>

    <hr>
    
    <div class="container-fluid">
        <div class="row">
            <lable for="image">Slika:</lable>
        </div>
        <div class="row">
            <input type="file" accept="image/*" name="image" id="image">
        </div>
    </div>
    

    <hr>

    <lable for="kutija">Prikaži vijest javno?</lable>
    <input type="checkbox" name="kutija" id="kutija">

    <hr>

    <div class="container-fluid">
        <div class="row">
            <input type="submit" name="submit" id="submit" value="Pošalji">
        </div>
    </div>
    
</form>






<footer>
    <div class="footer">
        <p>Nachrichten vom 17.05.2019 | stern.de GmbH | Home</p>
    </div>
</footer>


</body>
</html>