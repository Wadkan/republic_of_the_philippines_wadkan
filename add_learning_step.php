<?php
include __DIR__ . '/classes/LearningStep.php';
LearningStep::get_instance()->add($_POST['topic'], $_POST['is_learned'], $_POST['step'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));

include __DIR__.'/redirect.php';
