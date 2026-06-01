<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadImageService
{
    public function uploadImage(UploadedFile $file): bool
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        if ($user->image) {

            $oldPath = str_replace('/storage/', '', $user->image);

            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $path = $file->store('avatars', 'public');

        $user->image = '/storage/' . $path;

        return $user->save();
    }

    public function deleteUserImage($user): bool
    {
        if (!$user->image) {
            return false;
        }

        $path = str_replace('/storage/', '', $user->image);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $user->image = null;

        return $user->save();
    }
}
