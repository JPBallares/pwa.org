<?php
    session_start();

    

    if(isSet($_POST['login'])) {


        $username = $_POST['username'];
        $password = sha1($_POST['password'] );

        $dataFile = fopen("users.data", "r") or die("Unable to open file!");
        while (!feof($dataFile)){
            list($user, $pass) = explode(',', fgets($dataFile));
            if ($user == $username && $pass == $password) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
    
                header('Location: /member_area.php');
                exit;
            } else {
                echo 'Data does not match <br /> RE-Enter Username and Password';
            }
        }
        fclose($dataFile);

        
    } else {

?>
    <html>
    <head><link rel="stylesheet" type="text/css" href="css.css"></head>
        <body>
                <div id="div1">

                <a href="index.php" id="home">Home</a>
                <a href="Login.php" id="login2">Login</a>
                <a href="register.php" id="register">Register</a> 


        </div>
            <table width="200" border="0" cellspacing="1" align="center">
                <form id="form1" method="post" action="login.php">
                <tr>
                    <td colspan="2"><h2>Members login</h2></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" id="username"/>
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                        <td><input type="password" name="password" id="password"/> </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="login" id="login" value="login" />
                    </td>
                </tr>
                </form>
            </table>
            </body>
    </html>
    <?php
    }


?>