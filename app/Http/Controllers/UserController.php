<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterRequest;
use App\Http\Requests\UploadImageRequest;
use App\Models\Master;
use App\Models\Order;
use App\Models\User;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(protected UploadImageService $uploadImageService) {}
    public function uploadImage(UploadImageRequest $request)
    {
        $data = $request->validated();
        $file = $data['avatar'];
      return $this->uploadImageService->uploadImage($file)
         ? back()->with('success', 'Аватар успешно обновлен')
         : back()->with('error', 'Ошибка, отправьте другой файл');
    }

    public function deleteImage()
    {
        $user = Auth::user();

        $result = $this->uploadImageService->deleteUserImage($user);

        return $result
            ? back()->with('success', 'Аватар успешно удален.')
            : back()->withErrors(['image' => 'Не удалось удалить аватар.']);
    }

    public function createOrder(Request $request)
    {
        return view('pages.create_order', ['title' => 'Записаться', 'user' => Auth::user()]);
    }

    public function createMaster(MasterRequest $request)
    {
        $user = User::find($request->user_id);
        $user->role = 'мастер';
        $user->updated_at = now();
        $user->save();

        $fileName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/masters', $fileName, 'public');
        }

        Master::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'work_experience' => $request->work_experience,
            'image' => $fileName ? 'uploads/masters/' . $fileName : null,
        ]);

        return redirect()->route('masters')->with('success', 'Мастер успешно добавлен!');
    }


    public function allMasters()
    {
        $title = 'Наши мастера';
        $masters = Master::all();
        return view('pages.masters', compact('masters', 'title'));
    }

    public function deleteMaster(Request $request)
    {
        $user = User::find($request->user_id);

        if (!$user) {
            return redirect()->route('masters')->with('error', 'Пользователь не найден!');
        }


        $user->role = 'пользователь';
        $user->save();


        $master = Master::where('user_id', $request->user_id)->first();

        if (!$master) {
            return redirect()->route('masters')->with('error', 'Мастер не найден!');
        }

        Order::where('master_id', $master->id)->delete();

        $master->delete();

        return redirect()->route('masters')->with('success', 'Мастер успешно удален!');
    }

}
