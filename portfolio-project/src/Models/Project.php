<?php

class Project extends BaseModel
{
    protected $table = 'projects';
    protected $fillable = ['title', 'description', 'image', 'link'];

    public function getAllProjects()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getProjectById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function createProject($data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (title, description, image, link) VALUES (:title, :description, :image, :link)");
        return $stmt->execute($data);
    }

    public function updateProject($id, $data)
    {
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE {$this->table} SET title = :title, description = :description, image = :image, link = :link WHERE id = :id");
        return $stmt->execute($data);
    }

    public function deleteProject($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}