<!DOCTYPE html>
<html lang="en">
<?php

session_start();

$erorrs = array(
    "username" => NULL,
    "password" => NULL
);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectform";

$conn = mysqli_connect($servername , $username ,$password , $dbname);

function check_login($conn) {
    if (key_exists("username", $_SESSION) and key_exists("password", $_SESSION))
    {
        $sql = "select * from signin where username = '".$_SESSION["username"]."' and password = '".$_SESSION["password"]."'";

        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0)
        {
            header("location: index.php");
        }
    }
}

check_login($conn);

if(isset($_POST["submit"]))
{
    $user = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from signin where username = '$user' and password = '$password'";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if ($result->num_rows > 0)
        {
            
            $_SESSION["username"] = $user;
            $_SESSION["password"] = $password;
            header("location: index.php");
        }
    else
        {
            echo "error";
        }
       
    }

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        * {
            padding: 0px;
            margin: 0px;
            font-family: sans-serif;
            background-color: rgb(238, 238, 238);
        }

        .link {
            margin-top: 20px;
            background-color: white;
        }

        a {
            text-decoration: none;
            background-color: white;
        }

        a:hover {
            color: black;
            text-decoration: underline;
        }

        form {
            background-color: white;
            width: 600px;
            text-align: center;
            padding: 20px;
            height: 500px;
            box-shadow: 10px 10px 20px -5px;
            margin-top: 70px;
            border-radius: 10px;
        }

        input:-webkit-autofill {
            -webkit-text-fill-color: $black;
            -webkit-box-shadow: 0 0 0px 1000px rgb(238, 238, 238) inset;
        }
        
        

        .a3 {
            width: 400px;
            height: 35px;
            margin: 4px;
            border-radius: 5px;
            padding: 7px;
            background-color: white;
            
        }

        .a4 {
            background-color: #27AA0D;
            width: 415px;
            height: 40px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .a4:hover {
            background-color: rgb(0, 155, 0);
        }

        .head {
            background-color:rgb(238, 238, 238);
            width: 200px;
            margin: auto;
            padding: 17px;
            margin-bottom: 50px;
            border-radius: 10px;
            margin-top: 30px;


            font-size: larger;

        }

        form{
            text-align: center;
            margin: auto;
            margin-top: 80px;
        }

        span {
        }

        .error {
            color: red;
        }

        @media(max-width:700px) {

            form{
                width: 300px;
            }
            .a3{
                width: 250px;
                height: 30px;
                
            }
            .a4{
                width: 270px;
                height: 40px;
            }
        }
    </style>

</head>

<body>
    <div class="form">
        <form method="post">

            <p class="head"><b>Sign in Here</b></p>
            <input class="a3" type="text"  name="username" id="username" placeholder="Username" required>
   
            <input class="a3" type="password" name="password" id="password" placeholder="Password" required>
            <br>
            <br><br>
            <input class="a4" type="submit"  name="submit" value="Sign in">
            <p class="link">Don't have an account</p><br>
            <a href="signup.php">Sign up here</a>
        </form>
    </div>
</body>

</html>