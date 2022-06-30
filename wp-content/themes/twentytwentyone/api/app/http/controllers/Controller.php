<?php

namespace App\Http\Controllers;

require dirname(__DIR__, 3) . "/vendor/autoload.php";
require dirname(__DIR__, 3) . "/vendor/illuminate/routing/Controller.php";
require dirname(__DIR__, 7) . "/wp-admin/includes/image.php";

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * This variable contains the active status.
     * @var boolean
     */
    public $activeStatus = 1;

    /**
     * This function is used to format the response that we sent to the end user.
     * @param $status boolean with the status of the request.
     * @param $message array with the message that we sent to the end user
     * @param $data array with the data obtained the request.
     * @return array with the response formatted.
     */
    public function response($status, $message = [], $data = []) : array
    {
        if($message["type"] == "success"){
            $message["code"] = 200;
        }else if($message["type"] == "error"){
            $message["code"] = 500;
        }else if($message["code"] == "warning"){
            $message["code"] = 300;
        }

        return array(
            "transaction" => array("status" => $status),
            "message" => $message,
            "data" => $data
        );
    }

    /**
     * This function is used from upload files to wordpress and return the url that it sent.
     * @param File $file with the file that we upload to wordpress
     * @return string with the url of the file that we upload to wordpress.
     */
    public function uploadImages($file) : string
    {

        $wordpress_upload_dir = wp_upload_dir();
        $profilePicture = $file;
        $newFilePath = $wordpress_upload_dir["path"] . "/" . $profilePicture["name"];
        $newFileMime = mime_content_type($profilePicture["tmp_name"]);

        if (move_uploaded_file($profilePicture["tmp_name"], $newFilePath)) {
            $upload_id = wp_insert_attachment(
                array(
                    "guid" => $newFilePath,
                    "post_mime_type" => $newFileMime,
                    "post_title" => preg_replace("/\.[^.]+$/", "", $profilePicture["name"]),
                    "post_content" => "",
                    "post_status" => "inherit"
                ),
                $newFilePath
            );

            wp_update_attachment_metadata(
                $upload_id,
                wp_generate_attachment_metadata($upload_id, $newFilePath),
            );

        }

        return $wordpress_upload_dir["url"] . "/" . basename($newFilePath);
    }

    
}