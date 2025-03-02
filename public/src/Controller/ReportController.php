<?php

namespace Controller;

class ReportController implements BaseControllerInterface
{
    public function __construct(public GeneratorInterface $reportGenerator)
    {
    }

    // Action: endpoint.
    public function getReport(\DateTime $from, \DateTime $to) {
        // Validate input.

        try {
            if ($this->reportGenerator->generate()) {
                // TODO: Notify.
            }
        } catch (\Exception $exception) {
            // TODO: log error.
        }
    }
}