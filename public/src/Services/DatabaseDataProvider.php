<?php

use DataProvider\DataProviderInterface;

require_once(__ROOT__.'/www/src/Services/DataProviderInterface.php');
class DatabaseDataProvider implements DataProviderInterface
{
    public function __construct(public \PDO $connection) {}

    public function fetchData($offset = 0, $limit = 10): array
    {
        $sql = 'SELECT * from transactions LIMIT :offset, :limit';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $transaction) {
           $transactions[$transaction['ID']]['id'] = $transaction['ID'];
           $transactions[$transaction['ID']]['amount'] = $transaction['amount'];
           $transactions[$transaction['ID']]['created'] = $transaction['created'];
        }

       return $transactions;
    }
}