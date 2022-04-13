<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('fileuploadCI')){
    function fileuploadCI($filename,$path,$newname){
        $image=$_FILES[$filename]['name'];
		

		$CI =& get_instance();
		$config=array(
			'upload_path' => $path,
			'allowed_types' => '*',
			'max_size'=>'100000000',
			'file_name'=>$newname
		);
		$CI->load->library('upload',$config);
		$CI->upload->initialize($config);
		if ($CI->upload->do_upload($filename)) {
			return '1';
		} else {
			return 'Not Uploaded';
		}
    }
}
?>