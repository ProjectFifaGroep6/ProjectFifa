<?php
if(isset( $_SESSION['login_user'] ))
{
    echo "<a href=\"logout.php\"><span style='color:#000; margin:0 5px;'>Log Out</span></a>";
}
else{

}
?>
<a href="logout.php"><span style='color:#000; margin:0 5px;'>Log Out</span></a>
