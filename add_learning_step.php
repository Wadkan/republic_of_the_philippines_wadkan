<?php
include __DIR__ . '/classes/LearningStep.php';
$learning_steps_list = LearningStep::get_instance()->add($_POST['topic'], $_POST['is_learned'], $_POST['step'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));

/* Redirect to a different page in the current directory that was requested */
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
// header("Location: http://$host$uri/$extra");
header("refresh:3;url=http://" . $host . $uri . "/" . $extra);
exit;
