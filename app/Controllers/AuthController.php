<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        // Simple plain text comparison matching your database setup
        if (!$user || $password !== $user['password']) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        $session->set([
            'id'        => $user['id'],
            'username'  => $user['username'],
            'logged_in' => true
        ]);

        return redirect()->to('/tasks');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}