<?php 
    session_start();

    if(isset($_SESSION['id']) && isset($_SESSION['user_names'])){ 
    ?>
        <!DOCTYPE html>

            <html>
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-widht,initial-scale-1.0">
                    <title>primo Login</title>
                    <link rel="stylesheet" href="style5.css">
                    <link rel="icon" type="image/x-icon" href="icon.png">
                </head>

                <body>
                        <header>
                            <div>
                                <img class="logo" src="icon2.png">
                            </div>
                            
                            <?php if(isset($_GET['error'])) {?>
                                <p class="error"> <?php echo $_GET['error']; ?></p>
                            <?php }?>

                            <nav class="navigation">
                                <a href="#">Home</a>
                                <a href="#">About</a>
                                <a href="#">Help</a>
                                <button class="userBtn" onclick="showoption()"><img src="user.png" class="userImg" >  User</button>
                            </nav>
                        </header>

                        

                        <div class="selection" style="position: absolute;">
                            <label for='esercizi'>Esercizi</label>
                            <select name='esercizi' id='esercizi'>
                                <option value="petto" >Petto</option>
                                <option value="schiena">Schiena</option>
                                <option value="gambe">Gambe</option>
                                <option value="bicipiti">Bicipiti</option>
                                <option value="tricipiti">Tricipiti</option>
                                <option value="spalle">Spalle</option>
                            </select>
                        </div>
                        <div class="user-options" style="display: none" id="user-option">
                            <a href="#">account</a>
                            <a href="logout.php">log out</a>
                        </div>
                    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                    <script src="script5.js"></script>
                </body>
            </html>
        <?php
    } else {
        header('Location: index.php?error=error');
        exit();
    }
?>