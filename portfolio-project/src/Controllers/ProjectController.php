<?php

namespace App\Controllers;

use App\Models\Project;

class ProjectController extends BaseController
{
    public function index()
    {
        $projects = Project::all();
        $this->render('projects/index', ['projects' => $projects]);
    }

    public function show($id)
    {
        $project = Project::find($id);
        if (!$project) {
            // Handle project not found
            http_response_code(404);
            echo "Project not found.";
            return;
        }
        $this->render('projects/show', ['project' => $project]);
    }

    public function create()
    {
        // Logic to show the create project form
        $this->render('projects/create');
    }

    public function store($data)
    {
        // Logic to handle storing a new project
        $project = new Project($data);
        if ($project->save()) {
            // Redirect to the project index or show page
            header('Location: /projects');
            exit;
        } else {
            // Handle validation errors
            $this->render('projects/create', ['errors' => $project->getErrors()]);
        }
    }
}