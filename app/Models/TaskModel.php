<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];

    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))->findAll();
    }

    public function getAllTasksOrdered()
    {
        return $this->orderBy('task_date', 'ASC')->findAll();
    }
}