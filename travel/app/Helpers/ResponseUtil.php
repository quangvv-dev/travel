<?php
/**
 * Created by PhpStorm.
 * User: tungltdev
 * Date: 17/01/2019
 * Time: 10:25
 */

namespace App\Helpers;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ResponseUtil
{
    public static function jsonApi($code, $message, $data, $is_validate)
    {
        return [
            'code'        => $code,
            'is_validate' => $is_validate,
            'msg'         => $message,
            'data'        => $data,
        ];
    }

    public static function upload(UploadedFile $file, $destination)
    {
        $folder = $destination;
        $destination = public_path('uploads') . '/' . $destination;
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }
        $extension = $file->getClientOriginalExtension();
        $name = $file->getClientOriginalName();
        $file_name = str_slug(substr($name, 0, strrpos($name, "."))) . '_' . time() . '.' . $extension;
        $data = $file->move($destination, $file_name);
        return $file_name;
    }
}
