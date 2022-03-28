<?php

namespace App\Services;

use App\Http\Requests\LiveClassCreateRequest;
use App\Http\Requests\LiveClassUpdateRequest;
use App\Http\Resources\LiveClassesCollection;
use App\Http\Resources\LiveClassResource;
use App\Zoom\Zoom;

class LiveClassService
{
    private Zoom $zoom;

    public function __construct()
    {
        $this->zoom = new Zoom();
    }
    /**
     * Get a meeting's information
     * @param int meeting_id
     */
    public function get($meeting_id)
    {
        $meeting = $this->zoom->get($meeting_id);
        return new LiveClassResource($meeting);
    }

    /**
     * Get a paginated list of meetings
     * @param int $per_page
     * @param int $page_number
     */
    public function getPaginatedList($per_page, $page_number)
    {
        $meetings = $this->zoom->meetings($per_page, $page_number);

        $meetings_collection = collect($meetings->meetings);

        $data = [
            'page_count' => $meetings->page_count,
            'page_number' => $meetings->page_number,
            'per_page' => $meetings->page_size,
            'total_records' => $meetings->total_records,
            'data' => new LiveClassesCollection($meetings_collection),
        ];

        return $data;
    }

    /**
     * Create a meeting
     * @param int $meeting_id
     * @param \App\Http\Requests\LiveClassCreateRequest
     */
    public function create(LiveClassCreateRequest $request)
    {
        return $this->zoom->create($request);
    }

    /**
     * Update a meeting
     * @param int $meeting_id
     * @param \App\Http\Requests\LiveClassUpdateRequest $request
     */
    public function update($meeting_id, LiveClassUpdateRequest $request)
    {
        return $this->zoom->update($meeting_id, $request);
    }

    /**
     * Delete a meeting
     * @param int $meeting_id
     */
    public function delete($meeting_id)
    {
        return $this->zoom->destroy($meeting_id);
    }
}
