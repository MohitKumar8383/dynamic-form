<?php
	
	if(!function_exists('pr')){
		function pr($data){
			echo "<pre>";
			print_r($data);
			echo "<pre>";
		}
	}

	if(!function_exists('AdminView')){
		function AdminView($data){
			if(isset($data['topheading']) && !empty($data['topheading'])){
				 $view = view('Admin/include/header',$data['topheading']);
			}else{
				 $view = view('Admin/include/header');
			}
			 if(isset($data['data']) && !empty($data['data'])){
			 	$view_data['data'] = $data['data'];
			 	$view .=  view('Admin/'.$data['view'],$view_data);
			 }else{
			 	$view .=  view('Admin/'.$data['view']);
			 }
			 $view .= view('Admin/include/footer');
			return $view;
		}
	}
?>