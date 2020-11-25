<?php
include __DIR__ . '/classes/LearningStep.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    LearningStep::get_instance()->delete($id);
}

include __DIR__ . '/redirect.php';
