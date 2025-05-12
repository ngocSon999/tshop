<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Services\Impl\UserServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);

            $this->userService->create($data);
            DB::commit();

            return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd(234);
        $user = $this->userService->findById($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'User not found.');
        }

        return view('backend.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userService->findById($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'User not found.');
        }

        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
            $this->userService->update($data, $id);
            DB::commit();

            return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $user = $this->userService->findById($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'User not found.');
        }
        if ($user->id == auth()->user()->id) {
            return redirect()->route('admin.user.index')->with('warning', 'You cannot delete your own account.');
        }

        $this->userService->delete($id);

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }

    public function list(Request $request): JsonResponse
    {
        $filter = [
            'filter' => [
                'searchColumns' => [
                    'name', 'email', 'phone'
                ],
            ]
        ];

        $request->merge($filter);
        $data = $this->userService->getListDataTable($request);

        return response()->json($data);
    }
}
