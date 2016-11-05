<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageControllerTest extends WebTestCase
{
    private $mockRequest;
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
        $this->mockRequest = $this->createMock(Request::class);
    }

    public function testIndexActionSuccess()
    {
        $crawler = $this->client->request('GET', '/languages');

        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        $this->assertContains('pol', $this->client->getResponse()->getContent());
    }
}
