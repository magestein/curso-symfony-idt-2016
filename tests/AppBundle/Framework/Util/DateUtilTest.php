<?php

namespace Tests\AppBundle\Framework\Util;

use AppBundle\Framework\Utils\DateUtil;

class DateUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFecha()
    {
        $util = new DateUtil();
        $now = new \DateTime();

        $this->assertEquals($now->format('d/m/Y'), $util->getFecha());
    }
}