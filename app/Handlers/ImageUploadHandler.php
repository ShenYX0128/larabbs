<?php

namespace App\Handlers;

class ImageUploadHandler
{
    //只允许以下后缀名的图片文件上传
    protected $allowed_ext = ['png','jpg','gif','jpeg'];

    public function save($file,$folder,$file_prefix)
    {
        // 文件后缀名
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        if(! in_array($extension, $this->allowed_ext)) {
            return false;
        }
        $folder_name = "uploads/images/$folder/".date('Ym/d',time());
        $upload_path = public_path().'/'.$folder_name;

        $filename = $file_prefix. '_' . time() . '_' .str_random(10) . '.' . $extension;

        $file->move($upload_path,$filename);

        return [
            'path' => config('api.url')."/$folder_name/$filename"
        ];

    }
}
