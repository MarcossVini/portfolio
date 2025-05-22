<?php

namespace App\Models;

abstract class BaseModel
{
    protected $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function save()
    {
        // Logic to save the model to the database
    }

    public function delete()
    {
        // Logic to delete the model from the database
    }

    public function find($id)
    {
        // Logic to find a model by its ID
    }

    public function all()
    {
        // Logic to retrieve all models
    }
}