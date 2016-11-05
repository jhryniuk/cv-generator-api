<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EmployeeControllerTest extends WebTestCase
{
    private $mockRequest;
    private $postData = [];
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
        $this->mockRequest = $this->createMock(Request::class);
    }

    public function testIndexActionSuccess()
    {
        $crawler = $this->client->request('GET', '/employee');

        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        $this->assertContains('John', $this->client->getResponse()->getContent());
    }

    public function testAddActionSuccess()
    {
        $this->postData = [
            'firstName' => 'firstname',
            'lastName' => 'lastname',
            'username' => 'username',
            'jobTitle' => 'tester',
            'experience' => 'greatest',
            'education' => 'test',
            'hobbies' => 'bunjy jumping',
            'email' => 'test@gmail.com'
        ];
        $crawler = $this->client->request('POST', '/employee', $this->postData, [], ['CONTENT_TYPE' => 'application/json']);

        $this->assertEquals(Response::HTTP_CREATED, $this->client->getResponse()->getStatusCode());
    }
}
