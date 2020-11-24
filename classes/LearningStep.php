<?php

class LearningStep
{
    function get_pdo()
    {
        $host = 'localhost';
        $user = 'php_test';
        $password = 'SzevaszTavasz123';
        $dbname = 'intro_to_php';

        // Set DSN data source name
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        return new PDO($dsn, $user, $password);
    }

    static function get_instance() : LearningStep{
        return new LearningStep();
    }


    function select_all()
    {
        $pdo = $this->get_pdo();
        $sql = 'SELECT * FROM learning_step;';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function get_last_id()
    {
        $pdo = $this->get_pdo();
        $sql = 'SELECT ID FROM learning_step ORDER BY id DESC LIMIT 1 ;';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function save($array_values): int
    {
        $pdo = $this->get_pdo();
//        $sql = 'INSERT INTO learning_step (id, topic, is_learned, step, created, last_updated)
//            VALUES (?, ?, ?, ?, ?, ?)';
        $sql = 'INSERT INTO learning_step (id)
            VALUES (?)';
        $stmt = $pdo->prepare($sql);
//        $stmt->execute([$array_values['id'], $array_values['topic'], $array_values['is_learned'], $array_values['step'], $array_values['created'], $array_values['last_updated'], $array_values['topic'], $array_values['is_learned'], $array_values['step'], $array_values['created'], $array_values['last_updated']]);
        $stmt->execute([$array_values['id']]);
        return 0;
    }
}


function add_new()
{
    $next_id = LearningStep::get_instance()->get_last_id()[0]['ID'] + 1;
    echo "------->". $next_id;
    $array_values['id'] = $next_id;
    $array_values['topic'] = 'helllllllllo';
    $array_values['is_learned'] = TRUE;
    $array_values['step'] = 999;
    $array_values['created'] = "2020-11-11 10:10:10";
    $array_values['last_updated'] = "2020-11-11 10:10:10";

    $l_inst = new LearningStep();
    $save_inst = $l_inst->save($array_values);
    echo $save_inst;
}

echo add_new();