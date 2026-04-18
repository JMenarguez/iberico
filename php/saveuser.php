<?php
header('Access-Control-Allow-Origin: *');
$target_path="../";
$fileName='User.json';
$target_path=$target_path.$fileName;
file_put_contents($target_path, $json_datos);
if(move_uploaded_file($_FILES['file']['tmp_name'],$target_path))
{
    $vector = array();
    $vector[] = array(
        "file"=>$fileName,
    );
    
    header('Content-type:application/json');
  echo json_encode($vector);
}else
{
  header('Content-type:application/json');
  $data=['success'=>false,
  'message'=>'upload failed'];
  echo json_encode($data);
}
return $fileName;
?>