<?php

namespace App\Http\Requests\Admin\Classrooms;

use App\Models\Classroom;
use App\Models\ClassroomMember;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RemoveTeachersRequest extends FormRequest
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
            'removed_teacher_list' => 'required',
        ];
    }

    public function remove(Classroom $classroom)
    {
        $ids = User::whereIn('uuid', $this->removed_teacher_list)->get()->pluck('id');

        ClassroomMember::whereIn('user_id', $ids)
            ->get()->filter(function ($member) {
                return $member->user->user_type == 'teacher';
            })
            ->each(function ($teacher_member) {
                $teacher_member->delete();
            });
    }
}
