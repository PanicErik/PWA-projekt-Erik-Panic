<?php session_start(); ?>
<?php $dbc = mysqli_connect('localhost', 'root', '', 'baza1') or
die('Error connecting to MySQL server.'. mysqli_connect_error()); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
<script type="text/javascript">

window.addEventListener('DOMContentLoaded', (event) => {
            const form = document.forms['form'];

            form.addEventListener('submit', (event) => {
                const usernameInput = form.elements['username'];
                const usernameValue = usernameInput.value.trim();
                const usernameError = document.getElementById('poruka_username');

                if (usernameValue.length < 1) {
                    usernameInput.classList.add('is-invalid');
                    usernameError.textContent = 'Upiši username';
                    usernameError.style.color = "red";
                    usernameInput.style.borderColor = "red";
                    event.preventDefault();
                } else {
                    usernameInput.classList.remove('is-invalid');
                    usernameError.textContent = '';
                }
                const passwordInput = form.elements['password'];
                const passwordValue = usernameInput.value.trim();
                const passwordError = document.getElementById('poruka_password');

                if (passwordValue.length < 1) {
                    passwordInput.classList.add('is-invalid');
                    passwordError.textContent = 'Upiši password';
                    passwordError.style.color = "red";
                    passwordInput.style.borderColor = "red";
                    event.preventDefault();
                } else {
                    passwordInput.classList.remove('is-invalid');
                    passwordError.textContent = '';
                }
                const imeInput = form.elements['ime'];
                const imeValue = usernameInput.value.trim();
                const imeError = document.getElementById('poruka_ime');

                if (imeValue.length < 1) {
                    imeInput.classList.add('is-invalid');
                    imeError.textContent = 'Upiši ime';
                    imeError.style.color = "red";
                    imeInput.style.borderColor = "red";
                    event.preventDefault();
                } else {
                    imeInput.classList.remove('is-invalid');
                    imeError.textContent = '';
                }

                const prezimeInput = form.elements['prezime'];
                const prezimeValue = usernameInput.value.trim();
                const prezimeError = document.getElementById('poruka_prezime');

                if (prezimeValue.length < 1) {
                    prezimeInput.classList.add('is-invalid');
                    prezimeError.textContent = 'Upiši prezime';
                    prezimeError.style.color = "red";
                    prezimeInput.style.borderColor = "red";
                    event.preventDefault();
                } else {
                    prezimeInput.classList.remove('is-invalid');
                    prezimeError.textContent = '';
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

<br>

<form name="form" method="POST" action="potvrda.php">
    <div class="container-fluid">
        <div class="row">
            <label for="ime">Ime:</label>
        </div>
        <div class="row">    
            <input type="text" name="ime" id="ime">
        </div>
        <div class="row">
            <span id="poruka_ime" class="error"><span>
        </div>
    </div>
    <hr>

    <div class="container-fluid">
        <div class="row">
            <label for="ime">Prezime:</label>
        </div>
        <div class="row">    
            <input type="text" name="prezime" id="prezime">
        </div>
        <div class="row">
            <span id="poruka_prezime" class="error"><span>
        </div>
    </div>

    <hr>

    <div class="container-fluid">
        <div class="row">
            <label for="username">Username:</label>
        </div>
        <div class="row">    
            <input type="text" name="username" id="username">
        </div>
        <div class="row">
            <span id="poruka_username" class="error"><span>
        </div>
    </div>

    <hr>
    <div class="container-fluid">
        <div class="row">
            <label for="pasword">Password:</label>
        <div class="row">    
            <input type="password" name="password" id="password">
        </div>
        <div class="row">
            <span id="poruka_password" class="error"><span>
        </div>
    </div>
    <hr>
    <lable for="prava">Admin prava</lable>
    <input type="checkbox" name="prava" id="prava">
    <hr>
    <div class="container-fluid">
        <div class="row">
            <input type="submit" name="submit" id="submit" value="Registracija">
        </div>
    </div>
    
</form>



<footer>
    <div class="footer">
        <p>Nachrichten vom 17.05.2019 | stern.de GmbH | Home</p>
    </div>
</footer>

<?php mysqli_close($dbc); ?>
</body>
</html>