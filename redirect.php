<?php
echo '<br>Redirecting to home...';
/* Redirect to a different page in the current directory that was requested */
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
// header("Location: http://$host$uri/$extra");
header("refresh:2;url=http://" . $host . $uri . "/" . $extra);
exit;