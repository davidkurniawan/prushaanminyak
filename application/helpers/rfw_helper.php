<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Rune's Custom helper
 * Mod 16/10/2013
 * ~~~~~~~~~~~~~~~~~~~~~ 
 * use at your own risk
 **/

// oEmbed function, refer to http://oembed.com/
if ( ! function_exists('RFw_oembed')){
	function RFw_oembed($target_url, $type = 'youtube'){
        $format = '';
	    switch($type){
            case 'youtube':
                $url = 'http://www.youtube.com/oembed?url=';
                $format = '&format=json';
                break;
            case 'flickr':
                $url = 'http://flickr.com/services/oembed?url=';
                break;
            case 'viddler':
                $url = 'http://lab.viddler.com/services/oembed/?url=';
                break;
            case 'qik':
                $url = 'http://qik.com/api/oembed.xml?url=';
                break;
            case 'revision3':
                $url = 'http://revision3.com/api/oembed/?url=';
                $format = '&format=json';
                break;
            case 'hulu':
                $url = 'http://www.hulu.com/api/oembed.xml?url=';
                break;
            case 'vimeo':
                $url = 'http://vimeo.com/api/oembed.json?url=';
                break;
            case 'collegehumor':
                $url = 'http://www.collegehumor.com/oembed.xml?url=';
                break;
            case 'jest':
                $url = 'http://www.jest.com/oembed.json?url=';
                break;
            case 'oohembed':
                $url = 'ttp://oohembed.com/oohembed/?url=';
                break;
            case 'polleverywhere':
                $url = 'http://polleverywhere.com/services/oembed?url=';
                $format = '&format=json';
                break;
            case 'myopera':
                $url = 'http://my.opera.com/service/oembed/?url=';
                break;
            case 'embedly':
                $url = 'http://api.embed.ly/1/oembed?url=';
                break;
            case 'ifixit':
                $url = 'http://www.ifixit.com/Embed?url=';
                $format = '&format=json';
                break;
            case 'smugmug':
                $url = 'http://api.smugmug.com/services/oembed/?url=';
                break;
            case 'slideshare':
                $url = 'http://www.slideshare.net/api/oembed/2?url=';
                $format = '&format=json';
                break;
            case 'wordpress':
                $url = 'http://public-api.wordpress.com/oembed/1.0/?format=json&url=';
                break;
            case 'chirbit':
                $url = 'http://chirb.it/oembed.json?url=';
                break;
            case 'circuitlab':
                $url = 'https://www.circuitlab.com/circuit/oembed/?format=json&url=';
                break;
            default:
                $url = 'http://www.youtube.com/oembed?url=';
                break;
	    }
        $full_url = $format?$url.urlencode($target_url).$format:$url.urlencode($target_url);
	    $result = json_decode(file_get_contents($full_url), 'true');
        $result['link'] = $target_url;
        $expl = explode('=',$target_url);
        if(!empty($expl[1])){ $result['vlink'] = $expl[1]; }
		return $result;
	}
}

// wrap link with anchor ex: http://www.google.com/ -> <a href="http://www.google.com/">http://www.google.com/</a>
if ( ! function_exists('RFw_convert_link')){
	function RFw_convert_link($text){
        $text = preg_replace('%(((f|ht){1}tp://)[-a-zA-^Z0-9@:\%_\+.~#?&//=]+)%i',
        '<a href="\\1" target="_blank">\\1</a>', $text);
        $text = preg_replace('%([[:space:]()[{}])(www.[-a-zA-Z0-9@:\%_\+.~#?&//=]+)%i',
        '\\1<a href="http://\\2" target="_blank">\\2</a>', $text);
        return $text;
    }
}

// create list from text, separated by newline "\n"
if ( ! function_exists('RFw_nl2list')){
	function RFw_nl2list($text){
        $result = '<ul><li>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</li>\n<li>"),trim($text,"\n\r")).'</li></ul>';
        return $result;
    }
}
if ( ! function_exists('mail_split')){
    function mail_split($string = ""){
       if(!$string) return false;
       $string = str_replace("\r","",$string);
       $emails = explode("\n",$string);
       return $emails;
    }
}
if ( ! function_exists('double_mail_split')){
    function double_mail_split($string = ""){
       if(!$string) return false;
       $string = str_replace("\r","",$string);
       $emails = explode("\n",$string);
       foreach ($emails as $key => $value) {
            $data = explode(':', $value);
            $mail[$key]['email_name'] = $data[0];
            $mail[$key]['email_email'] = $data[1];


        }

       return $mail;
    }
}
// character limiter, force text to cut even it's not end of the word
if ( ! function_exists('RFw_character_limiter')){
    function RFw_character_limiter($string = '',$limit = 0){
        $ci =& get_instance();
        $result = $string;
        if($string){
            if(strlen($string)>$limit){
                $result = substr($string, 0, $limit).'...';
                return $result;
            }
        }
        return $result;
    }
}

// random string
if ( ! function_exists('RFw_random')){
	function RFw_random($length = 6, $salt = 'Rune'){
        $random = substr(str_shuffle(strtolower(sha1(rand().time().$salt))),0, $length);
        return $random;
    }
}

// resize with extra orientation, ex: set to 800x600, if potrait = 600x800, landscape = 800x600
if ( ! function_exists('RFw_resize')){
	function RFw_resize($image, $width, $height, $folder = '', $orientation = 'single', $keep_ratio = TRUE){
		if ($image){
            if($orientation=='single'){
                if ($image['image_width'] > $width || $image['image_height'] > $height){
                    $config = array(
                    	'height'		=> $height,
                    	'width'			=> $width,
                    	'source_image'	=> $image['full_path'],
                    	'new_image'		=> $image['file_path'].$folder,
                    	'maintain_ratio'=> $keep_ratio
                    );
                }else{
                    $config = array(
                    	'height'		=> $image['image_height'],
                    	'width'			=> $image['image_width'],
                    	'source_image'	=> $image['full_path'],
                    	'new_image'		=> $image['file_path'].$folder,
                    	'maintain_ratio'=> $keep_ratio
                    );
                }
            }else{
                if($image['image_width']>$image['image_height']){
                    if ($image['image_width'] > $width || $image['image_height'] > $height){
                        $config = array(
                        	'height'		=> $height,
                        	'width'			=> $width,
                        	'source_image'	=> $image['full_path'],
                        	'new_image'		=> $image['file_path'].$folder,
                        	'maintain_ratio'=> $keep_ratio
                        );
                    }else{
                        $config = array(
                        	'height'		=> $image['image_height'],
                        	'width'			=> $image['image_width'],
                        	'source_image'	=> $image['full_path'],
                        	'new_image'		=> $image['file_path'].$folder,
                        	'maintain_ratio'=> $keep_ratio
                        );
                    }
                }else{
                    if ($image['image_width'] > $height || $image['image_height'] > $width){
                        $config = array(
                			'height'		=> $width,
                			'width'			=> $height,
                			'source_image'	=> $image['full_path'],
                			'new_image'		=> $image['file_path'].$folder,
                			'maintain_ratio'=> $keep_ratio
                		);
                    }else{
                        $config = array(
                        	'height'		=> $image['image_height'],
                        	'width'			=> $image['image_width'],
                        	'source_image'	=> $image['full_path'],
                        	'new_image'		=> $image['file_path'].$folder,
                        	'maintain_ratio'=> $keep_ratio
                        );
                    }
                }
            }
            if($config){
				$config['quality'] = '100%';
                $ci =& get_instance();
    			$ci->load->library('image_lib');
                $ci->image_lib->clear();
    			$ci->image_lib->initialize($config);
    			$ci->image_lib->resize();
    			return $image;
            }
		}
	}
}

// resize only width/height, make sure ratio is TRUE
if ( ! function_exists('RFw_resize_side')){
	function RFw_resize_side($image, $length, $folder = '', $orientation = 'width', $keep_ratio = TRUE){
		if ($image){
            if($orientation=='width'){
                if ($image['image_width'] > $length){
                    $config = array(
                    	'height'		=> $image['image_height'],
                    	'width'			=> $length,
                    	'source_image'	=> $image['full_path'],
                    	'new_image'		=> $image['file_path'].$folder,
                    	'maintain_ratio'=> $keep_ratio
                    );
                }else{
                    $config = array(
                    	'height'		=> $image['image_height'],
                    	'width'			=> $image['image_width'],
                    	'source_image'	=> $image['full_path'],
                    	'new_image'		=> $image['file_path'].$folder,
                    	'maintain_ratio'=> $keep_ratio
                    );
                }
            }else{
                if ($image['image_height'] > $length){
                    $config = array(
                    	'height'		=> $length,
                    	'width'			=> $image['image_width'],
                    	'source_image'	=> $image['full_path'],
                    	'new_image'		=> $image['file_path'].$folder,
                    	'maintain_ratio'=> $keep_ratio
                    );
                }else{
                    $config = array(
                    	'height'		=> $image['image_height'],
                    	'width'			=> $image['image_width'],
                    	'source_image'	=> $image['full_path'],
                    	'new_image'		=> $image['file_path'].$folder,
                    	'maintain_ratio'=> $keep_ratio
                    );
                }
            }
            if($config){
				$config['quality'] = '100%';
                $ci =& get_instance();
    			$ci->load->library('image_lib');
                $ci->image_lib->clear();
    			$ci->image_lib->initialize($config);
    			$ci->image_lib->resize();
    			return $image;
            }
		}
	}
}

// crop image, do i need to tell moar?
if ( ! function_exists('RFw_crop')){
    function RFw_crop($image, $width, $height, $folder = ''){
        $ci =& get_instance();
        $img_path = $image['file_path'].$image['raw_name'].$image['file_ext'];
        $thumb_path = $image['file_path'].$folder;
        if($folder){ $img_thumb = $image['file_path'].$folder.'/'.$image['raw_name'].$image['file_ext'];
        }else{ $img_thumb = $image['file_path'].$image['raw_name'].$image['file_ext']; }
        $config = array(
            'image_library'     => 'gd2',
            'source_image'      => $img_path,
            'new_image'         => $thumb_path,
            'create_thumb'      => FALSE,
            'maintain_ratio'    => TRUE,
			'quality'			=> '100%'
        );
        $img = @getimagesize($img_path);
        $_width = $img[0];
        $_height = $img[1];
        $width_ratio = $_width/$width;
        $height_ratio = $_height/$height;
        $img_type = '';
        if($width_ratio>$height_ratio){
            $config['width'] = round($_width/$height_ratio);
            $config['height'] = $height;
            $img_type = 'landscape';
        }else if($width_ratio<=$height_ratio){
            $config['width'] = $width;
            $config['height'] = round($_height/$width_ratio);
            $img_type = 'potrait';
        }
        $ci->load->library('image_lib');
        $ci->image_lib->initialize($config);
        $ci->image_lib->resize();

        // reconfigure the image lib for cropping
        $conf_new = array(
            'image_library'     => 'gd2',
            'source_image'      => $img_thumb,
            'create_thumb'      => FALSE,
            'maintain_ratio'    => FALSE,
			'quality'			=> '100%',
            'width'             => $width,
            'height'            => $height
        );
        if ($img_type == 'landscape'){
            $conf_new['x_axis'] = ($config['width'] - $width) / 2 ;
            $conf_new['y_axis'] = 0;
        }else if($img_type == 'potrait'){
            $conf_new['x_axis'] = 0;
            $conf_new['y_axis'] = ($config['height'] - $height) / 2;
        }else{
            $conf_new['x_axis'] = 0;
            $conf_new['y_axis'] = 0;
        }
        $ci->image_lib->clear();
        $ci->image_lib->initialize($conf_new);
        $ci->image_lib->crop();
    }
}

if ( ! function_exists('RFw_file_upload')){
	function RFw_file_upload($file, $folder = '', $type = 'txt|doc|docx|xls|xlsx|pdf|gif|jpg|jpeg|png'){
		$ci =& get_instance();
		$config = array(
			'upload_path'	=> $folder,
			'allowed_types'	=> $type
		);
				
		$ci->load->library('upload');
		$ci->upload->initialize($config);
		
		if ($ci->upload->do_upload($file)){
			return $ci->upload->data();
		}
        //echo $ci->upload->display_errors();
	}
}

// multi upload, no comment...
if ( ! function_exists('RFw_multi_upload')){
    function RFw_multi_upload($image, $folder = ''){
        $result = array();
        $ci =& get_instance();
		$config = array(
			'upload_path'	=> $folder,
			'allowed_types'	=> 'gif|jpeg|jpg|png'
		);
		$ci->load->library('upload');
        $ci->upload->initialize($config);
        $files = $_FILES;
        if(!empty($_FILES[$image])){
            $limit = count($_FILES[$image]['name']);
            for($i=0;$i<$limit;$i++){
                $_FILES[$image]['name'] = $files[$image]['name'][$i];
                $_FILES[$image]['type'] = $files[$image]['type'][$i];
                $_FILES[$image]['tmp_name'] = $files[$image]['tmp_name'][$i];
                $_FILES[$image]['error'] = $files[$image]['error'][$i];
                $_FILES[$image]['size'] = $files[$image]['size'][$i];
                if($ci->upload->do_upload($image)){
                    $result[] = $ci->upload->data();
                }
            }
            return $result;
        }
    }
}

// yahoo messenger button, need upgrade
if (!function_exists("RFw_YM")){
    function RFw_YM($yahooid, $img_on_path, $img_off_path, $title) {
        $yahoo_url = "http://opi.yahoo.com/online?u=$yahooid&m=a&t=1";
        if(ini_get('allow_url_fopen')){
            error_reporting(0);
            $yahoo = file_get_contents($yahoo_url);
        }elseif(function_exists('curl_init')){
            $ch = curl_init($yahoo_url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_HEADER, 0);
            $yahoo = curl_exec($ch);
            curl_close($ch);
        }
        $yahoo = trim($yahoo);
        if(empty($yahoo)){
        /* Maybe failed connection.*/
            $imgsrc = $img_off_path;
        }elseif($yahoo == "01"){
            $imgsrc = $img_on_path;
        }elseif($yahoo == "00"){
            $imgsrc = $img_off_path;
        }else{
            $imgsrc = $img_off_path;
        }
        $result = '<a href="ymsgr:sendim?' . $yahooid . '" title="' . $title . '"><img src="' . $imgsrc . '" alt="' . $title . '" /></a>';
        return $result;
    }
}

// dropdown, only leftover. pretend you dont see this..
if ( ! function_exists('RFw_dropdown')){
	function RFw_dropdown($data, $id, $default = '...', $mainWidth = '100', $subWidth = '100'){
        /*
        $data must contain value and name
        
        Stylesheet => style as your own wish
        ~~~~~~~~~~~~~~~~~~~~~
        .customDropdown{ display: inline-block; }
        .customDropdown a{ display: block; text-decoration: none; }
        .customDropdown .dropMain{ cursor: pointer; }
        .customDropdown .dropMenu{ display: none; position: absolute; z-index: 99; }
        
        Javascript => default, modify if you know
        ~~~~~~~~~~~~~~~~~~~~~
        <script type="text/javascript">
        $(function(){
            $('html').on('click', function() { $('.dropMain').next().slideUp(); });
            $('.dropMain').on('click', function(event){ $(this).next().slideToggle(); event.stopPropagation(); });
            $('.customDropdown .dropMenu a').on('click', function(){ $(this).parent().parent().parent().prev().html($(this).text()); $(this).parent().parent().parent().next().val($(this).attr('rel')); });
        });
        </script>
        */
        $result = '<div class="customDropdown"><div class="dropMain" style="width:'.$mainWidth.'px;">'.$default.'</div><div class="dropMenu" style="width:'.$subWidth.'px;"><ul>';
        foreach($data as $val){
            $result .= '<li><a href="javascript:void(0);" rel="'.$val['value'].'">'.$val['name'].'</a></li>';
        }
        $result .= '</ul></div><input id="'.$id.'" class="required" type="hidden" name="'.$id.'" /></div>';
        return $result;
    }
}

/* --- ex area --- */
// display raw data
if ( ! function_exists('pre')){
    function pre($data, $next = 0){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        if(!$next){ exit; }
    }
}