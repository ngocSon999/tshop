<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\SettingServiceInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    protected SettingServiceInterface $settingService;

    public function __construct(SettingServiceInterface $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('_token', '_method');
            if (!empty($data)) {
                $this->settingService->update($data, $id);
                DB::commit();
            }

            Session::flash('success', 'Setting updated successfully.');

            return response()->json([
                'code' => 200,
                'message' => 'Setting updated successfully.',
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            Session::flash('error', 'Failed to update setting: ' . $e->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'Failed to update setting: ' . $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $this->settingService->delete($id);

        return redirect()->route('admin.setting.index')->with('success', 'Setting deleted successfully.');
    }

    public function list(Request $request): JsonResponse
    {
        $data = $this->settingService->getListDataTable($request);

        return response()->json($data);
    }
}
