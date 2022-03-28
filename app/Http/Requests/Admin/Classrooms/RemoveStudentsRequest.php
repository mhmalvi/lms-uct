<?php

namespace App\Http\Requests\Admin\Classrooms;

use App\Models\Classroom;
use App\Models\ClassroomMember;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RemoveStudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'removed_student_list' => 'required|array',
        ];
    }

    public function remove(Classroom $classroom)
    {
        $ids = User::whereIn('name', $this->removed_student_list)->get()->pluck('id');

        ClassroomMember::whereIn('user_id', $ids)
            ->get()->filter(function ($member) {
                return $member->user->user_type == 'student';
            })
            ->each(function ($student_member) {
                $student_member->delete();
            });
    }
}
