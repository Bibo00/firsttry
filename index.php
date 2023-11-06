<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-widht,initial-scale-1.0">
        <title>primo Login</title>
        <link rel="stylesheet" href="style10.css">
        <link rel="icon" type="image/x-icon" href="images/icon.png">
    </head>

    <body>
        <header>
            <div>
                <img class="logo" src="images/icon2.png">
            </div>
                
            <?php if(isset($_GET['error'])) {?>
                <p class="error"> <?php echo $_GET['error']; ?></p>
            <?php }?>

            <nav class="navigation">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Help</a>
                <button class="btnLogin" onclick="showlog()">Login</button>
            </nav>
                
        </header>
        <form action="login.php" method="post">
            <div class="wrapper" style="display: none;" id="wrapper">
                <div class="form-box Login">
                    <h2>Login</h2>
                    <div class="inputcred">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>      
                        <input type="text" name="uname" placeholder="username">
                    </div>
                    <div class="inputcred">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" name="password" placeholder="password">
                    </div>
                    <div class="checkbox">
                        <label class="checkstyle">
                            <input type="checkbox" id="check">                            
                            <span class="switch"></span>
                        </label>
                        <label for="check" style="position: relative; left: 40px; top: -40px">Remember me</label>
                    </div>
                    <div class="log">
                        <button class="logbtn" type="submit">Login</button>
                    </div>
                    <div class="register">
                        <p>Don't have an account?<a onclick="showreg()"> Register here</a></p>
                    </div>
                </div>
            </div>
        </form>

        
        
        

        <form action="registration.php" method="post">
            <div class="wrapper" style="display: none;" id="wrapper2">
                <div class="form-box Login">
                    <h2>Registration</h2>
                    <form action="#">
                        <div class="inputcred">
                            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                            <input type="text" name="regname" placeholder="username">
                        </div>
                        <div class="inputcred">
                            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                            <input type="email" name="regmail" placeholder="email">
                        </div>
                        <div class="inputcred">
                            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                            <input type="password" name="regpassword" placeholder="password">
                        </div>
                        <div class="log">
                            <button class="regbtn" type="submit">Submit</button>
                        </div>
                        <div style="position: relative;">
                            <p>Already have an account?<a onclick="showlog()">     Log In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </form>

        <form action="test.php" method="post">
            <div class="porcodio">
                <div class="centerLogo" id="centerLogo" >
                    <h1 >Create</h1><br><br>
                    <h4>your</h4><br><br>
                    <h2> workout</h2><br><br>
                    <input type="submit" class="createBtn"/> 
                </div>


                <div class="container-tot reveal" id="containerEs">
                    <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-input" id="input" name="checklist[]" value="petto">
                        <div class="selection">
                            <span class="checkbox-icon"></span>
                            <img src="images/tick.png" class="tick" >
                            <img src="images/chest_icon_def.png" class="icon">
                            <span class="checkbox-text">Petto</span>
                        </div>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-input" id="input" name="checklist[]" value="schiena">
                        <div class="selection">
                            <span class="checkbox-icon"></span>
                            <img src="images/tick.png" class="tick" >
                            <img src="images/back_icon_def.png" class="icon">
                            <span class="checkbox-text">Schiena</span>
                        </div>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-input" id="input" name="checklist[]" value="bicipiti">
                        <div class="selection">
                            <span class="checkbox-icon"></span>
                            <img src="images/tick.png" class="tick" >
                            <img src="images/bicep_icon_def.png" class="icon">
                            <span class="checkbox-text">Bicipiti</span>
                        </div>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" class="checkbox-input" id="input" name="checklist[]" value="tricipiti">
                        <div class="selection">
                            <span class="checkbox-icon"></span>
                            <img src="images/tick.png" class="tick" >
                            <img src="images/tricep_icon_def.png" class="icon">
                            <span class="checkbox-text">Tricipiti</span>
                        </div>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="checklist[]" value="gambe"  class="checkbox-input" id="input" > 
                        <div class="selection">
                            <span class="checkbox-icon"></span>
                            <img src="images/tick.png" class="tick">
                            <img src="images/leg_icon_def.png" class="icon">
                            <span class="checkbox-text">Gambe</span>
                        </div>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="checklist[]" value="spalle"  class="checkbox-input" id="input" > 
                        <div class="selection">
                            <span class="checkbox-icon"></span>
                            <img src="images/tick.png" class="tick">
                            <img src="images/shoulder_icon_def.png" class="icon">
                            <span class="checkbox-text">Gambe</span>
                        </div>
                    </label>
                </div>
            </div>
            
            
        </from>
       
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="script8.js"></script>
    </body>
</html>