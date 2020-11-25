<?php
include __DIR__ . '/classes/LearningStep.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    LearningStep::get_instance()->set_as_learnt($id);
}

include __DIR__ . '/redirect.php';
