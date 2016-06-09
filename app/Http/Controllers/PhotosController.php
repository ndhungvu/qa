<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class PhotosController extends Controller
{
    public $thumbs = array(
        'A' => '120X120',
        'B' => '400X150',
        'C' => '400X300',
        'D' => '1400X500'
    );

    public function postUploadImage() {
        $file = Input::file('image');
        if (!empty($file)) {
            $fileSize = @$file->getSize();
            if ( ! $fileSize || ! $file->getMimeType()) {
                return response()->json([
                        'status' => false,
                        'message'=> 'Upload image is fail.'
                    ]);
            }
            $imageName = md5(time());
            $mimetype = preg_replace('/image\//', '', $file->getMimeType());
            $pathUpload = 'uploads/tmp/';
            if (!file_exists($pathUpload)) {
                mkdir($pathUpload, 0777);
            }
            Input::file('image')->move($pathUpload, $imageName.'.'.$mimetype);
            $strImage = '/'.$pathUpload.$imageName.'.'.$mimetype;
            return response()->json([
                        'status' => true,
                        'data'  => $strImage,
                        'message'=> 'Upload image is successful.'
                    ]);
        }
        return response()->json([
                        'status' => false,
                        'data'  => $strImage,
                        'message'=> 'Upload image is fail.'
                    ]);
    }

    public function postResizeImage($image_root_path, $thumb_type = 'A', $path = 'uploads/images/') {
        $thumb = explode("X", $this->thumbs[$thumb_type]);
        $width = $thumb[0];
        $height = $thumb[1];
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        /*Get file name of image root*/
        $path_parts = pathinfo($image_root_path);        
        $file_name = $path_parts['filename'];
        $ext = $path_parts['extension'];
        $path = $path.$file_name.'-'.$width.'x'.$height.'.'.$ext;
        if(Image::make($image_root_path)->resize($width, $height)->save($path))
            return true;
        return false;
    }

    public function postYoutubePhoto() {
        $url = $file = Input::get('_link');
        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
            $values = $id[1];
        } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
            $values = $id[1];
        } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
            $values = $id[1];
        } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
            $values = $id[1];
        }
        else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $url, $id)) {
            $values = $id[1];
        } else {   
            return response()->json([
                        'status' => false,
                        'message'=> 'Đã xảy ra lỗi, vui lòng thử lại.'
                    ], 500);
            exit;
        }

        $path_image_tmp = 'http://img.youtube.com/vi/'. $values.'/0.jpg';

        $image = time().'.png';
        $path_image_new = public_path().'/uploads/images/'.$image;

        $content = file_get_contents($path_image_tmp);            
        if(file_put_contents($path_image_new, $content)) {
            return response()->json([
                        'status' => true,
                        'data' => '/uploads/images/'.$image,
                        'message'=> 'Lấy ảnh tử link youtubethành công.'
                    ]);
        }
    }
}
