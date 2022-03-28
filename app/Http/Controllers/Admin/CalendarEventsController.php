<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CalendarEvents\CreateCalendarEventRequest;
use App\Http\Resources\CalendarEventsCollection;
use App\Models\CalendarEvent;
use Illuminate\Http\Request;

class CalendarEventsController extends Controller
{
    public function store(CreateCalendarEventRequest $request)
    {
        try {
            $request->save();
            return response()->json([
                'message' => "Successfully created the calendar event!"
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function destroy(CalendarEvent $event)
    {
        try {
            $event->delete();
            return response()->json([
                'message' => "Successfully deleted the event!"
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
