<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;


class UploadFile {

    private $image;

    public function __construct($image = '')
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function uploadImage($request)
    {
        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->input('name').'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('image', $newName);
        }
        $request['image'] = $newName;

        return $newName;
    }

    public function updateImage($request)
    {
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $foto = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $foto);
            $request['cover'] = $foto;
        }

        return $foto;
    }

    public function updateImageAll($request)
    {
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $image = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('image', $image);
            $request['image'] = $image;
        }
    }

    public function updateFotoAll($request)
    {
        if($request->file('foto')){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('foto')->storeAs('foto', $newName);
            $request['cover'] = $newName;
        }
    }

    public function uploadFoto($request)
    {
        $foto = '';
        if($request->file('foto')){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $foto = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('foto')->storeAs('foto', $foto);
        }
        $request['foto'] = $foto;

        return $foto;
    }

    public function uploadFilePDF($request)
    {
        $nama_file = '';
        if($request->file('file')){
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $file->storeAs('e-book', $file->getClientOriginalName());
        }
        return $nama_file;
    }

    public function uploadFileVideo($request)
    {
        $nama_video = '';
        if($request->file('video')){
            $file = $request->file('video');
            $nama_video = $file->getClientOriginalName();
            $file->storeAs('video', $file->getClientOriginalName());
        }

        return $nama_video;
    }

    public function updateFilePDF($request)
    {
        if($request->file('file')){
            if($request->oldFile){//apabila penyimpanan file lama dihapus
                Storage::delete('e-book/'.$request->oldFile);
            }
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $file->storeAs('e-book', $file->getClientOriginalName());
            $request['file'] = $nama_file;
        } else {
            $nama_file = $request->oldFile;
        }

        return $nama_file;
    }

    public function updateFileVideo($request)
    {
        if($request->file('video')){
            if($request->oldVideo){//apabila penyimpanan gambar lama ada
                Storage::delete('video/'.$request->oldVideo);
            }
            $file = $request->file('video');
            $nama_video = $file->getClientOriginalName();
            $file->storeAs('video', $file->getClientOriginalName());
            $request['video'] = $nama_video;
        } else {
            $nama_video = $request->oldVideo;
        }

        return $nama_video;
    }


    public function uploadGallery($request)
    {
        $gallery = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $gallery = $request->nama.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('gallery', $gallery);
        }
        $request['images'] = $gallery;

        return $gallery;
    }

    public function updateGallery($request)
    {
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $gallery = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('gallery', $gallery);
            $request['images'] = $gallery;
        }
    }
}
