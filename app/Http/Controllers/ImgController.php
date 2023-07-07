<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use    App\Models\Image;
use Illuminate\Support\Facades\Auth;
class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "img index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('img.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function upload(Request $request)
    {

        $request->validate([
            'alt' => 'required',
            'title' => 'required',
            'caption' => 'required',
            'description' => 'required',
        ]);
      // return "img store";

       // Проверяем, был ли передан файл
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $newFileName = 'img_';
        $ext=$image->getClientOriginalExtension();
        // Сохраняем файл в папку storage/img с новым именем
       

        // Создаем новую запись в базе данных
        $newImage =  Image::create([
            'name' => '',
            'path' => '',
            'extension' => $ext,
            'size' => $image->getSize(),
            'height' => getimagesize($image)[1],
            'width' => getimagesize($image)[0],
            'mime_type' => $image->getMimeType(),
            // Добавьте другие поля в соответствии с вашей моделью
            'user_id' => Auth::id(), // Пример для сохранения идентификатора пользователя
            'alt'=> $request->get('alt'),
            'title'=> $request->get('title'),
            'caption'=> $request->get('caption'),
            'description'=> $request->get('description'),
            // storage/app/public/Img/$newFileName
            'url'=>'',
         ]);

        $newImage->name = $newFileName.$newImage->id.'.'.$ext;
        $path = $image->storeAs('Img',$newFileName.$newImage->id.'.'.$ext);
        $newImage->path = $path;
        $newImage->url = 'app/Img/'.$newFileName.$newImage->id.'.'.$ext;
        $newImage->save();

        

        // Дополнительные действия после сохранения изображения

        return redirect()->route('post.create')->with('success', 'Изображение успешно загружено.');
    }

    return redirect()->route('post.create')->with('error', 'Ошибка при загрузке изображения.');
 

        
    }

    /**
     * Display the specified resource.
     */
    public function show($filename)
    {
        $filePath = storage_path('app/Img/' . $filename);
        if (file_exists($filePath)) {
            return response()->file($filePath);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
