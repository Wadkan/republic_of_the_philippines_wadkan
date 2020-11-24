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

    static function get_instance(): LearningStep
    {
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
        return $stmt->fetch();
    }

    function save($array_values): int
    {
        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO learning_step (id, topic, is_learned, step, created, last_updated)
            VALUES (:id, :topic, :is_learned, :step, :created, :last_updated)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $array_values['id'], 'topic' => $array_values['topic'], 'is_learned' => $array_values['is_learned'], 'step' => $array_values['step'], 'created' => $array_values['created'], 'last_updated' => $array_values['last_updated']]);

        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            print_r($pdo->errorInfo());
        }

        return $this->get_last_id()['ID'];
    }
}


function add_new()
{
    $next_id = LearningStep::get_instance()->get_last_id()['ID'] + 1;
    $array_values['id'] = $next_id;
    $array_values['topic'] = 'asdf';
    $array_values['is_learned'] = TRUE;
    $array_values['step'] = 999;
    $array_values['created'] = "2020-11-11 10:10:10";
    $array_values['last_updated'] = "2020-11-11 10:10:10";

    echo LearningStep::get_instance()->save($array_values);
}

echo add_new();