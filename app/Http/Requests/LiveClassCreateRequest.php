<?php

namespace App\Http\Requests;

use App\Services\LiveClassService;
use App\Zoom\Zoom;

class LiveClassCreateRequest extends LiveClassRequest
{
    public function save()
    {
        $service = new LiveClassService();

        return $service->create($this);
    }
}
