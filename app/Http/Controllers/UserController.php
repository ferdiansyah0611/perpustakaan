<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|max:255',
            'address' => 'nullable|string|max:1000',
            'no_telp' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        $this->userRepository->create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->getById($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,'.$id.'|max:255',
            'password' => 'nullable|string|min:8|max:255',
            'address' => 'nullable|string|max:1000',
            'no_telp' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        $this->userRepository->updateById($id, $data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $this->userRepository->deleteById($id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('name', 'like', '%' . $query . '%')->limit(10)->get();

        return response()->json($users);
    }
}