<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LiveClassCreateRequest;
use App\Http\Requests\LiveClassUpdateRequest;
use App\Http\Resources\LiveClassesCollection;
use App\Services\LiveClassService;
use App\Zoom\Zoom;
use Illuminate\Http\Request;

class LiveClassesController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        return view('admin.pages.liveclasses.index');
    }

    /**
     * fetch paginated list of live classes
     */
    public function paginatedList()
    {
        try {
            $perPage = request('perPage') ?? 5;
            $pageNumber = request('pageNumber') ?? 1;
            $timezone_offset = request('timezone') ?? 0;

            $service = new LiveClassService();
            $meetings = $service->getPaginatedList($perPage, $pageNumber, $timezone_offset);

            return response()->json($meetings);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * show create page for live class
     */
    public function create()
    {
        return view('admin.pages.liveclasses.create');
    }

    /**
     * save a meeting
     */
    public function store(LiveClassCreateRequest $request)
    {
        try {
            $request->save();

            return response()->json([
                'message' => "Successfully saved the meeting",
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * show edit page for meeting
     */
    public function edit($liveclass_id, LiveClassService $service)
    {
        try {
            $meeting = $service->get($liveclass_id);

            return view('admin.pages.liveclasses.edit', compact('meeting'));
        } catch (\Throwable $th) {
            abort(404);
        }
    }

    /**
     * update a live class meeting
     */
    public function update($liveclass_id, LiveClassUpdateRequest $request)
    {
        try {
            $request->update($liveclass_id);

            return response()->json([
                'message' => "Successfully updated the meeting",
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * delete a meeting
     */
    public function destroy($liveclass_id, LiveClassService $service)
    {
        try {
            $service->delete($liveclass_id);

            return response()->json([
                'message' => "Successfully deleted the live class",
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Something went wrong!",
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
