<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project extends Element
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity=Task::class)
     */
    protected $tasks;
    
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * @return Task|null
     */
    public function getTasks(): ?Task
    {
        return $this->tasks;
    }
    
    /**
     * @param  Task|null $tasks
     * @return self
     */
    public function setTasks(?Task $tasks): self
    {
        $this->tasks = $tasks;

        return $this;
    }
}
