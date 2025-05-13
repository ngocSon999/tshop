<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\SliderServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    protected SliderServiceInterface $sliderService;

    public function __construct(SliderServiceInterface $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->sliderService->create($request->all());
            DB::commit();

            return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to create slider: ' . $e->getMessage());
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
        $slider = $this->sliderService->findById($id);

        return view('backend.slider.edit', [
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $this->sliderService->update($request->all(), $id);
            DB::commit();

            return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to update slider: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $this->sliderService->delete($id);

        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
    }

    public function list(Request $request): JsonResponse
    {
        $data = $this->sliderService->getListDataTable($request);

        return response()->json($data);
    }
}
