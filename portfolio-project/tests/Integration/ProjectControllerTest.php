<?php

use PHPUnit\Framework\TestCase;

class ProjectControllerTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        // Initialize the ProjectController before each test
        $this->controller = new \src\Controllers\ProjectController();
    }

    public function testIndex()
    {
        // Simulate a request to the index method
        $response = $this->controller->index();

        // Assert that the response is an array
        $this->assertIsArray($response);
        // Further assertions can be added based on expected output
    }

    public function testShow()
    {
        // Simulate a request to the show method with a valid project ID
        $response = $this->controller->show(1);

        // Assert that the response is an array and contains expected keys
        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertArrayHasKey('title', $response);
        // Further assertions can be added based on expected output
    }

    public function testShowInvalidId()
    {
        // Simulate a request to the show method with an invalid project ID
        $response = $this->controller->show(999);

        // Assert that the response indicates a not found status
        $this->assertNull($response);
    }
}