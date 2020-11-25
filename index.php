<?php
//namespace db_handler;
include __DIR__ . '/classes/LearningStep.php';

echo '<a href=add.html>Add new record</a>';
echo '<br><br>';

$learning_steps_list = LearningStep::get_instance()->list_learning_steps();
$headers = ['id', 'topic', 'is_learned', 'step', 'created', 'last_updated'];

echo '<table border="1">';
echo '<thead>';
echo '<tr>';
foreach ($headers as $header) {
    echo '<td>' . $header . '</td>';
}
echo '</tr>';
echo '</thead>';

echo '<tbody>';

foreach ($learning_steps_list as $row) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td><td>' . $row['topic'] . '</td><td>' . $row['is_learned'] . '</td><td>' . $row['step'] . '</td><td>' . $row['created'] . '</td><td>' . $row['last_updated'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
