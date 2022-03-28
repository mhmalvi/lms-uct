<?php

namespace App\Http\Requests\Admin\CalendarEvents;

use App\Models\CalendarEvent;
use Illuminate\Foundation\Http\FormRequest;

class CreateCalendarEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'date' => 'required',
        ];
    }

    public function save()
    {
        $start_date = date('Y-m-d', strtotime($this->date[0]));
        if (!$this->date[1]) {

            $end_date = date('Y-m-d', strtotime($this->date[0]));
        } else {
            $end_date = date('Y-m-d', strtotime($this->date[1]));
        }

        if (
            strtotime($this->start_time) > strtotime($this->end_time)
        ) {
            $temp = $this->start_time;
            $this->start_time = $this->end_time;
            $this->end_time = $temp;
        }

        CalendarEvent::create([
            'title' => $this->title,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'color' => $this->color
        ]);
    }
}
