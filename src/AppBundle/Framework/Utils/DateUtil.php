<?php

namespace AppBundle\Framework\Utils;

use Monolog\Logger;
use Symfony\Bundle\MonologBundle\MonologBundle;

class DateUtil
{
    /**
     * @var $logger Logger
     */
    private $logger = '';

    public function getFecha()
    {
        $fecha = date('d/m/Y');

        $this->logger->debug('------------------------------' . $fecha);

        return $fecha;
    }

    public function setLogger($logger)
    {
        $this->logger = $logger;
    }
}