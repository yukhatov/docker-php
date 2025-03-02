<?php

use DataProvider\DataProviderInterface;

class ReportGenerator
{
    public function __construct(
        public DataProviderInterface $dataProvider,
        public ReportFormatterInterface $dataFormatter
    ) {}
    public function generate(): bool
    {
        $offset = 0;
        $limit = 10;

        try {
            $file = fopen(
                'report' . new DateTime('Y-d-m H:i:s') . '.' . $this->dataFormatter->getFileType(),
                'w'
            );

            do {
                $data = $this->dataProvider->fetchData($offset, $limit);
                $formattedData = $this->dataFormatter->format($data);

                if ($file) {
                    fwrite($file, $formattedData);
                }

                $offset += $limit;

            } while (count($data) == 10);

            fclose($file);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}