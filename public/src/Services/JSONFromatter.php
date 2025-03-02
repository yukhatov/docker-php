<?php

class JSONFromatter implements ReportFormatterInterface
{
    public function format(array $data)
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getFileType(): string
    {
        return 'json';
    }
}