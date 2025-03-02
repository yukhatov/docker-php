<?php

class DataFixtureManager
{
    public function __construct(public \PDO $connection) {}

    public function run()
    {
        $this->seedTransactions(5000);
    }

    protected function seedTransactions($count = 1000) {
        $sql = 'CREATE TABLE IF NOT EXISTS transactions (ID int NOT NULL AUTO_INCREMENT, amount DECIMAL, created DATETIME NOT NULL, PRIMARY KEY (ID));';
        $sql .= 'CREATE INDEX created_index ON transactions (created);';
        $date = '2024-01-29';

        for ($i = 0; $i < $count; $i++) {
            $amout = rand(1, 100);
            $date = date('Y-m-d H:i:s', strtotime("+1 day", strtotime($date)));
            $sql .= "INSERT INTO transactions (amount, created) VALUES ($amout, '$date');";
        }

        $this->connection->exec($sql);
    }
}