<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClassroomsCollection;
use App\Models\Classroom;
use App\Models\ClassroomMember;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ClassroomsController extends Controller
{
    public function index()
    {
        return view('user.pages.classrooms.index');
    }

    public function getPaginatedList()
    {
        try {
            $classroom_members = ClassroomMember::with('classroom')
                ->where('user_id', auth()->user()->id)
                ->limit(request('items'))
                ->latest()
                ->get();

            $classrooms = [];
            foreach ($classroom_members as $member) {
                array_push($classrooms, $member->classroom);
            }

            return new ClassroomsCollection(
                $this->paginate($classrooms, 5, null, ['path' => '/student/classrooms/list'])
            );
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    private function paginate($items, $perPage = 5, $page = null, $options = [])
    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function show(Classroom $classroom)
    {
        $classroom->load('posts.user');
        return view('user.pages.classrooms.show', compact('classroom'));
    }
}
