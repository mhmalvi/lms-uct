<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarEventsCollection;
use App\Models\CalendarEvent;

class CalendarEventsController extends Controller
{
    public function getList()
    {
        try {

            return new CalendarEventsCollection(
                CalendarEvent::all()
            );
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error_code' => 500,
            ], 500);
        }
    }
}
