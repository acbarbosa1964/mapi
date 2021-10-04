<?php
	include_once('autoload.php');
	$GF->request('pcloud','CLASSES');
	
	$mp3 = new GF_musicmp3_ru('your_pcloud_email@mailsac.com','your_secret_password');
	$data = $mp3->router();
	
	if($_REQUEST['r'] == 'album_download' || $_REQUEST['r'] == 'all_albums_download') {
		$title = @$_REQUEST['n'];
		if(empty($title)) $title = md5($data);
		$ret = $mp3->router('send_text_to_pcloud', array(
				'text' => $data,
				'title' => $title,
				'type' => '.bat',
				'path'  => 'files'
			)
		);
		j($ret);
	}

	j($data);
?>
