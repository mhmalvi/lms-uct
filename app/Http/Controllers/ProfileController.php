<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteAvatarRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * 
     */
    private function getUser()
    {
        return auth('admin')->check() ? Admin::with('info')->findOrFail(Auth::guard('admin')->id())
            : User::with('info')->findOrFail(Auth::id());
    }

    /**
     * 
     */
    public function edit()
    {
        $user = new UserResource(
            $this->getUser()
        );

        return view('pages.edit_profile', compact('user'));
    }

    /**
     * 
     */
    public function update(UpdateProfileRequest $request)
    {
        try {
            $request->update(
                $this->getUser()
            );

            return response()->json([
                'message' => "Successfully updated your profile!",
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
    public function avatarUpdate(UpdateAvatarRequest $request)
    {
        try {
            $user = auth('admin')->check() ? auth('admin')->user() : auth()->user();
            $request->update($user);

            return response()->json([
                'message' => "Successfully updated your avatar",
                'avatar' => auth()->user()->avatar_url,
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * 
     */
    public function avatarDelete(DeleteAvatarRequest $request)
    {
        try {
            $user = auth('admin')->check() ? auth('admin')->user() : auth()->user();
            $request->delete($user);

            return response()->json([
                'message' => "Successfully deleted your avatar!",
                'avatar' => auth()->user()->avatar_url,
            ], 202);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
