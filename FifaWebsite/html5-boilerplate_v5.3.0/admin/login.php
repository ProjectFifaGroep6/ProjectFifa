<?php
session_start();
$error = '';
if (isset( $_POST['submit'] )) {
    if (empty( $_POST['username'] ) || empty( $_POST['password'] )) {
        $message = "Fill in both fields";
        header("Location:login.php");
    }
    else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $connection = new PDO('mysql:host=localhost;dbname=project_fifa', 'root', '');

        $username = stripslashes($username);
        $password = stripslashes($password);


        $query = $connection->prepare("SELECT * FROM tbl_admins WHERE password='$password' AND username='$username'");
        $connection->prepare('$query');
        $query->execute();
        $rows = $query->fetchColumn();
        if ($rows == 1) {
            $_SESSION['login_user'] = $username;
            $message = "Welcome $username";
            header("Location:acp.php");
        } else {
            $message = "Wrong Username or Password";
            header("Location:index.php");
        }
        $connection=null;
    }
}
require ('header.php');
?>

<header>
    <nav>
        <ul>
            <li id="login">
                <?php
                if(isset( $_SESSION['login_user'] ))
                {
                    header("Location:acp.php");
                }
                elseif(!isset( $_SESSION['login_user'] ))
                {
                    $output = '<h3>Log in </h3>';
                    $output .= '<div id="">';
                    $output .= '<form method="post" action="login.php">';
                    $output .= '<div class="inputs">';
                    $output .= '<input id="username" type="text" name="username" placeholder="Username" required>';
                    $output .= '<input id="password" type="password" name="password" placeholder="Password" required>';
                    $output .= '</div>';
                    $output .= '<div class="inputs">';
                    $output .= '<input type="submit" id="submit" name="submit" value="Log in">';
                    $output .= '</div>';
                    $output .= '</form>';
                    $output .= '</div>';
                    echo $output;
                }
                ?>
            </li>
        </ul>
    </nav>
</header>

<?php
require ('footer.php');
?>


