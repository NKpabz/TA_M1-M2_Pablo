<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function index()
    {
        return view('pages/welcome');
    }

    public function tasks()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->where('is_archived', 0)->findAll();

        return view('tasks/index', $data);
    }

    public function profile()
    {
        return view('pages/profile');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $taskModel = new TaskModel();

        $rules = [
            'title'     => 'required',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel->save([
            'title'       => $this->request->getPost('title'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $data['task'] = $taskModel->find($id);

        if (empty($data['task'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Task not found: ' . $id);
        }

        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();

        $rules = [
            'title'     => 'required',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();
        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks');
    }
}