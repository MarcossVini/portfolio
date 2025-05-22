<?php

use PHPUnit\Framework\TestCase;
use App\Models\Project;

class ProjectTest extends TestCase
{
    protected $project;

    protected function setUp(): void
    {
        $this->project = new Project();
    }

    public function testProjectCreation()
    {
        $this->project->setName('Test Project');
        $this->project->setDescription('This is a test project.');

        $this->assertEquals('Test Project', $this->project->getName());
        $this->assertEquals('This is a test project.', $this->project->getDescription());
    }

    public function testProjectValidation()
    {
        $this->project->setName('');
        $this->assertFalse($this->project->validate());

        $this->project->setName('Valid Project');
        $this->assertTrue($this->project->validate());
    }
}