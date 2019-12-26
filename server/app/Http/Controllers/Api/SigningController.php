<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Annotation;
use Request as rq;
use App\User;
use Mail;
use App\Recipient;
use App\Mail\SendMailSigned;
use App\Document;
use App\DocumentDetail;

class SigningController extends Controller
{
     /**
     * 
     * Upload file to storage
     * 
     * @param Request $request
     * 
     * 
     */
    public function upload(Request $request) 
    {
      $signBase = $request->sign_image;
      if (false === $signBase) {
        return response()->json([
          'errors' => 'Can\'t load image: '
        ], 422);
      }

      // Define Location and Filename
      $destinationPath = storage_path().'/app/public/signstamps/';
      // $ext = '.png';      
      $newWidth = 100;
      $targetFile = $destinationPath;

      // Uploading to Storage
      $signResized = $this->resize(($newWidth + 50),  $targetFile, $signBase, 'sign');
     
      /** Update Annotation */
      $annotation = Annotation::find($request->annotation_id);
        if ($annotation == null) {
            return response(null, 404);
        }

      $annotation->image_url = 'signstamps/' . $signResized;

      $annotation->save();

      $url = env('APP_URL', 'http://localhost:8000') . "/images/" . $annotation->image_url;
      $annotation->image_url = $url;
    //   echo "Start <br/>"; echo '<pre>'; print_r($url);echo '</pre>';exit("End Data");

      $response = $this->successfulMessage(201, 'Successfully updated', true, 1, $annotation);

      return response(json_encode($response));

    }

    public function storeValue(Request $request)
    {
      $sign_value = $request->all() ;

      
      if (false === $sign_value) {
        return response()->json([
          'errors' => 'Can\'t load image: '
        ], 422);
      }

      
      $annotation_data = [];

       foreach ($sign_value as $value) {
        $annotation = Annotation::find($value['annotation_id']);
        $annotation_data = $annotation;
        if ($annotation == null) {
            return response(null, 400);
        }
        $annotation->value = $value['value'];
        $annotation->save();
       }
       


        $creator = $annotation = User::find($annotation_data['creator_id']);
        $actor = $annotation = Recipient::find($annotation_data['actor_id']);
        $document_data = Document::find($annotation_data['doc_id']);

        $document_data_de = DocumentDetail::find($document_data['document_id']);

        $info['subject'] =  'Completed: '.$document_data_de['name'];
        $info['message'] = "";
        $info['url_root'] = rq::root();
        $info['recipients'] = [];

        $url = rq::root().'/api/pdf/export?recipient_id='.$actor['id'].'&document_id='.$document_data['document_id'];

        $info['url_document'] = $url;
        
        //  echo "11111";
        // echo "Start <br/>"; echo '<pre>'; print_r($creator['email']);echo '</pre>';exit("End Data"); 

        Mail::to($actor['email'] )->send(new SendMailSigned($info));

        
        $response = $this->successfulMessage(201, 'Successfully updated', true, 1, []);

        return response(json_encode($response));

    }

    public function store(Request $request)
    {
      $signBase = $request->uploaded_url;
      
      if (false === $signBase) {
        return response()->json([
          'errors' => 'Can\'t load image: '
        ], 422);
      }

      // Defina Location and Filename
      $destinationPath = storage_path().'/app/public/signstamps/';
      $newWidth = 100;
      $targetFile = $destinationPath;

      // Uploading to Storage
      $signResized = $this->resize(($newWidth + 50),  $targetFile, $signBase, 'sign');

        /** Update Annotation */
        $annotation = Annotation::find($request->annotation_id);
        if ($annotation == null) {
            return response(null, 400);
        }

        $annotation->image_url = 'signstamps/' . $signResized;

        $annotation->save();

        $url = env('APP_URL', 'http://localhost:8000') . "/images/" . $annotation->image_url;
        $annotation->image_url = $url;
        $response = $this->successfulMessage(201, 'Successfully updated', true, 1, $annotation);

        return response(json_encode($response));

    }


      private function successfulMessage($code, $message, $status, $count, $payload)
    {
      return [
        'code' => $code,
        'message' => $message,
        'success' => $status,
        'count' => $count,
        'data' => $payload,
      ];
    }


    /** Reference Imagepng */
    protected function resize($newWidth, $targetFile, $originalFile, $type) 
    {
        $info = getimagesize($originalFile);
        $mime = $info['mime'];
    
        switch ($mime) {
        case 'image/jpeg':
            $image_create_func = 'imagecreatefromjpeg';
            $image_save_func = 'imagejpeg';
            $new_image_ext = 'jpg';
            break;

        case 'image/png':
            $image_create_func = 'imagecreatefrompng';
            $image_save_func = 'imagepng';
            $new_image_ext = 'png';
            break;

        case 'image/gif':
            $image_create_func = 'imagecreatefromgif';
            $image_save_func = 'imagegif';
            $new_image_ext = 'gif';
            break;

        default: 
            return response(null, 400);
        }
    
        $img = $image_create_func($originalFile);
        list($width, $height) = getimagesize($originalFile);
    
        $newWidth = $width;
        $newHeight = $height;
        
        $tmp = imagecreatetruecolor($newWidth, $newHeight);

        $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
        imagefill($tmp, 0, 0, $transparent);
        imagesavealpha($tmp, true); //transparent bg

        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
        // Create folder if not exist
        $destinationPath = storage_path().'/app/public/signstamps/';
        if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0755, true);
        }

        $new_filename = date('YmdHis') . '_' . $type . '_signstamp';
        $targetFile = $targetFile . $new_filename;
        if (file_exists($targetFile)) {
        unlink($targetFile);
        }

        $image_save_func($tmp, "$targetFile.$new_image_ext");
        imagedestroy($tmp);

        return "$new_filename.$new_image_ext";
    }








}
