<?php

interface ReportFormatterInterface
{
    public function format(array $data);

    public function getFileType(): string;
}