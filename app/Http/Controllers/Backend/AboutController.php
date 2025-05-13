<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\AboutServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    protected AboutServiceInterface $aboutService;
    public function __construct(AboutServiceInterface $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.about.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->aboutService->create($request->all());
            DB::commit();

            return redirect()->route('admin.about.index')->with('success', 'About created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create About: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.about.edit', [
            'about' => $this->aboutService->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $this->aboutService->update($request->all(), $id);
            DB::commit();

            return redirect()->route('admin.about.index')->with('success', 'About updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to update About: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $this->aboutService->delete($id);

        return redirect()->route('admin.about.index')->with('success', 'About deleted successfully.');
    }

    public function list(Request $request): JsonResponse
    {
        $data = $this->aboutService->getListDataTable($request);

        return response()->json($data);
    }
}
