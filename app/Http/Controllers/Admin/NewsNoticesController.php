<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsNoticeCreateRequest;
use App\Http\Requests\Admin\NewsNoticeDeleteRequest;
use App\Http\Requests\Admin\NewsNoticeUpdateRequest;
use App\Http\Resources\NewsNoticesCollection;
use App\Models\NewsNotice;

class NewsNoticesController extends Controller
{
    /**
     *
     */
    public function index()
    {
        return view('admin.pages.news_notices.index');
    }

    public function paginatedList()
    {
        try {
            $items = request('items') ?? 5;
            $data = NewsNotice::where('title', 'LIKE', '%' . request('search') . '%');
            if (request()->filled('post_type')) {
                $data = $data->where('post_type', request('post_type'));
            }
            if (request()->filled('post_status')) {
                $status = request('post_status') == 'published';
                $data = $data->where('is_published', $status);
            }
            $data = $data->paginate($items);
            return new NewsNoticesCollection($data);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $this->error
            ], 500);
        }
    }

    /**
     *
     */
    public function create()
    {
        return view('admin.pages.news_notices.create');
    }

    /**
     *
     */
    public function store(NewsNoticeCreateRequest $request)
    {
        try {
            $request->save();

            return response()->json([
                'message' => 'Successfully create the news/notice',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $this->error
            ], 500);
        }
    }

    /**
     *
     */
    public function edit(NewsNotice $news_notice)
    {
        return view('admin.pages.news_notices.edit', compact('news_notice'));
    }

    /**
     *
     */
    public function update(NewsNotice $news_notice, NewsNoticeUpdateRequest $request)
    {
        try {
            $old_slug = $news_notice->slug;
            $new_data = $request->update($news_notice);

            return response()->json([
                'message' => "Successfully updated the news/notice",
                'redirect_back' => ($new_data->slug == $old_slug) ? false : true,
                'index_page' => route('admin.news_and_notices.index'),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     *
     */
    public function destroy(NewsNoticeDeleteRequest $request, NewsNotice $newsNotice)
    {
        try {
            $request->delete($newsNotice);

            return response()->json([
                'message' => "Successfully deleted the news/notice",
            ], 202);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $this->error,
            ], 500);
        }
    }
}
