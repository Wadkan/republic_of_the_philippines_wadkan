<?php
// TODO: does not work with namespace
//namespace db_handler;

class LearningStep
{
    function get_pdo()
    {
        $host = 'localhost';
        $user = 'php_test';
        $password = 'SzevaszTavasz123';
        $dbname = 'intro_to_php';

        // Set DSN data source name
        $connection = null;
        try {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
            $connection = new PDO($dsn, $user, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully<br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . '<br>';
        }
        return $connection;
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

    function save(array $values): int
    {
        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO learning_step (id, topic, is_learned, step, created, last_updated)
            VALUES (:id, :topic, :is_learned, :step, :created, :last_updated)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $values['id'], 'topic' => $values['topic'], 'is_learned' => $values['is_learned'], 'step' => $values['step'], 'created' => $values['created'], 'last_updated' => $values['last_updated']]);
        return $this->get_last_id()['ID'];
    }

    function find(int $id): object
    {
        $pdo = $this->get_pdo();
        $sql = 'SELECT * FROM learning_step WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject();
    }

    function all(): array
    {
        $pdo = $this->get_pdo();
        $sql = 'SELECT * FROM learning_step';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function update(int $id, array $values): void
    {
        $pdo = $this->get_pdo();
        $sql = 'UPDATE learning_step
                SET topic = :topic,
                is_learned = :is_learned,
                step = :step,
                created = :created,
                last_updated = :last_updated        
                WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute = (['topic' => $values['topic'], 'is_learned' => $values['is_learned'], 'step' => $values['step'], 'created' => $values['created'], 'last_updated' => $values['last_updated']]);
    }

    function update2($id, $topic, $is_learned, $step, $created, $last_updated): void
    {
        $pdo = $this->get_pdo();
        $sql = 'UPDATE learning_step
                SET topic = :topic,
                is_learned = :is_learned,
                step = :step,
                created = :created,
                last_updated = :last_updated        
                WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'topic' => $topic, 'is_learned' => $is_learned, 'step' => $step, 'created' => $created, 'last_updated' => $last_updated]);
    }

    function delete(int $id): void
    {
        $pdo = $this->get_pdo();
        $sql = 'DELETE FROM learning_step WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        echo $id . ' has removed successfully.';
    }

    function list_learning_steps()
    {
        $pdo = $this->get_pdo();
        $sql = 'SELECT * FROM learning_step';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function add($topic, $is_learned, $step, $created, $last_updated): void
    {
        try {
            $pdo = $this->get_pdo();
            $sql = 'INSERT INTO learning_step (topic, is_learned, step, created, last_updated)
                    VALUES (:topic, :is_learned, :step, :created, :last_updated)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['topic' => $topic, 'is_learned' => $is_learned, 'step' => $step, 'created' => $created, 'last_updated' => $last_updated]);
            $last_id = $pdo->lastInsertId();
            echo 'The last id is: ' . $last_id . '.';

        } catch (PDOException $e) {
            echo "Error in SQL: " . $e->getMessage();
        }
    }

    function set_as_learnt(int $id): void
    {
        try {
            $pdo = $this->get_pdo();
            $sql = 'UPDATE learning_step SET is_learned = TRUE WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $last_id = $pdo->lastInsertId();
            echo 'Entry with ' . $last_id . ' id updated to learnt.';
        } catch (PDOException $e) {
            echo "Error in SQL: " . $e->getMessage();
        }
    }
}


/*
 * CALL FUNCTIONS
 */

function add_new()
{
    $next_id = LearningStep::get_instance()->get_last_id()['ID'] + 1;
    $values['id'] = $next_id;
    $values['topic'] = 'apple';
    $values['is_learned'] = TRUE;
    $values['step'] = 999;
    $values['created'] = "2020-11-11 10:10:10";
    $values['last_updated'] = "2020-11-11 10:10:10";
    try {
        echo LearningStep::get_instance()->save($values);
    } catch (PDOException $e) {
        echo "Error in SQL: " . $e->getMessage();
    }
}

//echo add_new();

function find_one()
{
    $id_ = 133;
    $find_one = LearningStep::get_instance()->find($id_);
    if ($find_one) {
        foreach ($find_one as $k => $v) {
            echo $k . "--> " . $v . ' < br>';
        }
    } else {
        echo 'No result for ' . $id_ . ' . ';
    }

}

//find_one();

function print_all_rows(): void
{
    $all = LearningStep::get_instance()->all();
    foreach ($all as $row) {
        foreach ($row as $k => $v) {
            echo $k . " -> " . $v;
        }
        echo ' < br>';
    }
}

//print_all_rows();

function not_working_update()
{
    $id = 2;
    $values['topic'] = 'update_';
    $values['is_learned'] = 0;
    $values['step'] = 10;
    $values['created'] = '2020 - 01 - 01 11:11:11';
    $values['last_updated'] = '2020 - 01 - 01 11:11:11';
    LearningStep::get_instance()->update($id, $values);
}

function working_update()
{
    $id = 5;
    $topic = 'updated';
    $is_learned = 0;
    $step = 1;
    $created = '2020 - 01 - 01 11:11:11';
    $last_updated = '2020 - 01 - 01 11:11:11';
    LearningStep::get_instance()->update2($id, $topic, $is_learned, $step, $created, $last_updated);
}

//working_update();
//not_working_update();


//LearningStep::get_instance()->delete(16);

// LearningStep::get_instance()->list_learning_steps();
