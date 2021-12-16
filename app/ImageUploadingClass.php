<?php
/*
Author: Niyonkuru Elisa

Copyright: 2017

*/
//defining ImageUploadingClass() Class
class ImageUploadingClass{
    //defining array variable to store response/errors from database 
    public $response = array();
    //getting requirement info for uploading photo
    public function ImageUpload($imgExtension = [],$imgSize,$newPath,$name){
            //uploading user post picture
        if(!$_FILES[$name]['name']){

            $response['error'] = true;
            $response['message'] = "Ntabwo wahisemo ifoto!";

            return $response;
            
        }else{
            //if image is selected
            $allowed_ext = $imgExtension;//allowed extensions

            $dev_parts_news = explode(".",$_FILES[$name]['name']);

            $ext = end($dev_parts_news);//spilt file name into array

            if(!in_array($ext,$allowed_ext)){//chack if image has allowed extenstion.
                $extension = "";
                for($i = 0;$i<count($allowed_ext); $i++){ $extension  .= $allowed_ext[$i]." , ";}
                $response['error'] = true;
                $response['message'] = " Iyi foto ntabwo yemewe. Koresha ".$extension." Instead!";

                return $response;
            }else{

                if($_FILES[$name]["size"] > $imgSize){//check image size 1000000 means 1000KB or 1MB

                    $response['error'] = true;
                    $response['message'] = "Ifoto ni nini!";

                    return $response;
                }else{
                    
                    $new_name = md5(rand(1000000,1)).'.'.$ext;//rename file before uploding

                    $path = $newPath.$new_name;

                    if(!move_uploaded_file($_FILES[$name]['tmp_name'],$path)){

                        $response['error'] = true;
                        $response['message'] = "Ifoto ifite ikibazo,Koresha indi!";
                        $response['path'] = $path;

                        return $response;
                    }else{
        
                        $response['error'] = false;
                        $response['message'] = $new_name;
                        $_FILES[$name]['name'] == '';

                        return $response;
                        
                    }
                }

            }
        }
    }
}

$uploadImage = new ImageUploadingClass();
?>