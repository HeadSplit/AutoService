<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class UploadImageService
{
    public function uploadImage($file)
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads/avatars', $fileName, 'public');

        $user = Auth::user();
        $user->image = 'uploads/avatars/' . $fileName;

        $user->save();

        return true;
    }

    public function deleteUserImage(User $user)
    {
        if (!$user->image) {
            Log::warning("Попытка удалить аватар, которого нет у пользователя ID: {$user->id}");
            return false;
        }

        $imagePath = public_path('uploads/avatars' . $user->image);

        if (!File::exists($imagePath)) {
            $user->image = null;
            return $user->save();
        }

        if (File::delete($imagePath)) {
            $user->image = null;
            return $user->save();
        }

        Log::error("Ошибка удаления файла {$imagePath} для пользователя ID: {$user->id}");
        return false;
    }
}
