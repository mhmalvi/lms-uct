<?php

namespace App\Http\Requests;

use App\Models\Classroom;
use Illuminate\Support\Facades\Storage;

class DeleteClassroomRequest extends ClassroomRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    public function delete(Classroom $classroom)
    {
        if ($classroom->cover_photo) {
            $this->deleteCoverPhoto($classroom);
        }

        $classroom->delete();
    }
}
