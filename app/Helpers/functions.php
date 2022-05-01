<?php

if (!function_exists('uploadImage')) {
    /**
     * upload image in specific directory "storage"
     * @param $upload
     * @param $path
     * @param null $resize_width
     * @param null $resize_height
     * @return string
     */
    function uploadImage($upload, $path, $resize_width = null, $resize_height = null): string
    {
        $checkPath = 'app/public/'.$path;
        if (!file_exists(storage_path($checkPath))) {
            mkdir(storage_path($checkPath), 0755, true);
        }
        $filename = rand() . time() . '.' . $upload->getClientOriginalExtension();
        $upload->move(public_path('uploads/'.$path),$filename);
        return $filename;
    }
}

if (!function_exists('deleteImage')) {
    /**
     * delete image
     * @param $path
     * @return int
     */
    function deleteImage($file ,$path): int
    {
        if (file_exists($path.'/'.$file)) {
            $delete = $file->delete(public_path('uploads/'.$path));
            if ($delete) {
                return 1;
            }
        }
        return 0;
    }
}


