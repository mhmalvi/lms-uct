<?php

namespace App\Http\Requests;

use App\Services\LiveClassService;

class LiveClassUpdateRequest extends LiveClassRequest
{
    public function update($meeting_id)
    {
        $service = new LiveClassService();

        return $service->update($meeting_id, $this);
    }
}
