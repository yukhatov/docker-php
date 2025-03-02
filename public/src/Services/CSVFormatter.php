<?php

class CSVFormatter implements ReportFormatterInterface
{
    public function format(array $data)
    {
        // TODO: implementation.
    }

    public function getFileType(): string
    {
        return 'csv';
    }
}