<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\ContactServiceInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    protected ContactServiceInterface $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->contactService->findAll();

        return view('backend.contact.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->contactService->create($request->all());
            DB::commit();

            return redirect()->route('web.contact')->with('success', 'Contact created successfully.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to Create contact: ' . $e->getMessage());
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
        return view('backend.contact.edit', [
            'contact' => $this->contactService->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $this->contactService->update($request->all(), $id);
            DB::commit();

            return redirect()->route('admin.contact.index')->with('success', 'Contact updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to update Contact: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $this->contactService->delete($id);

        return redirect()->route('admin.contact.index')->with('success', 'Contact deleted successfully.');
    }

    public function list(Request $request): JsonResponse
    {
        $data = $this->contactService->getListDataTable($request);

        return response()->json($data);
    }

    /**
     * @throws Exception
     */
    public function updateStatus(Request $request): JsonResponse
    {
        $data = $this->contactService->updateStatus($request->all());

        return response()->json($data);
    }
}
