<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->client->request('GET', '/es');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->client->request('GET', '/en');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testProductos()
    {
        $this->client->request('GET', '/es/productos');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->client->request('GET', '/en/productos');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testProductoByCategoria()
    {
        $this->client->request('GET', '/es/juegos-y-consolas/productos');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->client->request('GET', '/en/juegos-y-consolas/productos');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testProductoByCategoria404()
    {
        $this->client->request('GET', '/es/no-existe/productos');
        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());

        $this->client->request('GET', '/en/no-existe/productos');
        $this->assertEquals(404, $this->client->getResponse()->getStatusCode());
    }
}
