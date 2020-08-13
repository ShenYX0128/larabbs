<?php

namespace App\Handlers;

use Image;

class ImageUploadHandler
{
    //只允许以下后缀名的图片文件上传
    protected $allowed_ext = ['png','jpg','gif','jpeg'];

    public function save($file,$folder,$file_prefix,$max_width = false)
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
        if($max_width && $extension != 'gif') {
            $this->reduceSize($upload_path . '/' . $filename,$max_width);
        }
        return [
            'path' => config('api.url')."/$folder_name/$filename"
        ];

    }

    public function reduceSize($file_path, $max_width)
    {
        // 实例化
        $image = Image::make($file_path);


        $image->resize($max_width,null,function ($constraint) {
            //设定宽度是$max_width,高度等比例双方缩放
            $constraint->aspectRatio();

            //防止截图时图片尺寸变大
            $constraint->upsize();
        });
        //对图片修改后进行保存
        $image->save();
    }
}
