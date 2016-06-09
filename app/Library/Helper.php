<?php 
namespace App\Library;
 
class Helper{ 
	public static function dump($data) {
		echo '<pre>'; print_r($data); echo '<pre>'; exit;
	}

	/*This is function create slug of title*/	
	public static function slug($model, $value)
	{
    	$slug = \Illuminate\Support\Str::slug($value);
    	$slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());
    	return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
	}

    public static function levels() {
        $levels = array(
                    '0' => 'Beggining',
                    '1' => 'Intermediate',
                    '2' => 'Advanced'
                );
        return $levels;
    }

	function resizeImage($image_root_path, $thumb_type = 'A', $path = 'uploads/image/') {
	    switch ($thumb_type) {
			case 'A':			
				$width = '120';
				$height = '120';
				break;
			case 'B':
				$width = '400';
				$height = '150';
				break;
			case 'C':
				$width = '400';
				$height = '300';
				break;
			case 'D':
				$width = '1400';
				$height = '600';
				break;
		}
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

	function getThumbImage($image, $thumb_type = 'A', $path = 'uploads/image/') {
	   switch ($thumb_type) {
			case 'A':
				$type = '-120x120';
				break;
			case 'B':
				$type = '-400x150';
				break;
			case 'C':
				$type = '-400x300';
				break;
			case 'D':
				$type = '-1400x600';
				break;
		}
	    
	    /*Get file name of image root*/
	    $path_parts = pathinfo($image);        
	    $file_name = $path_parts['filename'];
	    $ext = $path_parts['extension'];

	    $path = $path.$file_name.$type.'.'.$ext;
	    
	    return $path;
	}

	/*Crawler */
	public static function crawler_tv24($url)
    {
        if(!empty($url)) {
            $rand = rand (1,5);
            switch ($rand) {
                case '1':
                    $email = 'ndhungvu@gmail.com';
                    $password = 'qaz123';                   
                    break;
                case '2':
                    $email = 'ndhungvu01@gmail.com';
                    $password = 'qaz123';                   
                    break; 
                case '3':
                    $email = 'ndhungvu02@gmail.com';
                    $password = 'qaz123';                  
                    break; 
                case '4':
                    $email = 'ndhungvu03@gmail.com';
                    $password = 'qaz123';                   
                    break;                
                default:
                    $email = 'ndhungvutv@gmail.com';
                    $password = 'qaz123'; 
                    break;
            }
            define('EMAIL', $email);
            //The password of the account.
            define('PASSWORD', $password);
            //Set a user agent. This basically tells the server that we are using Chrome ;)
            define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
            //Where our cookie information will be stored (needed for authentication).
            define('COOKIE_FILE', 'cookie.txt');
            //URL of the login form.
            define('LOGIN_FORM_URL', 'http://tv24.vn/account/login');
            //Login action URL. Sometimes, this is the same URL as the login form.
            define('LOGIN_ACTION_URL', 'http://tv24.vn/account/login');
            //An associative array that represents the required form fields.
            //You will need to change the keys / index names to match the name of the form
            //fields.
            $postValues = array(
                'Email' => EMAIL,
                'Password' => PASSWORD
            );
            //Initiate cURL.
            $curl = curl_init();
            //Set the URL that we want to send our POST request to. In this
            //case, it's the action URL of the login form.
            curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);
            //Tell cURL that we want to carry out a POST request.
            curl_setopt($curl, CURLOPT_POST, true);
            //Set our post fields / date (from the array above).
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
            //We don't want any HTTPS errors.
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            //Where our cookie details are saved. This is typically required
            //for authentication, as the session ID is usually saved in the cookie file.
            curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIE_FILE);
            //Sets the user agent. Some websites will attempt to block bot user agents.
            //Hence the reason I gave it a Chrome user agent.
            curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
            //Tells cURL to return the output once the request has been executed.
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            //Allows us to set the referer header. In this particular case, we are 
            //fooling the server into thinking that we were referred by the login form.
            curl_setopt($curl, CURLOPT_REFERER, LOGIN_FORM_URL);
            //Do we want to follow any redirects?
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
            //Execute the login request.
            curl_exec($curl);
            //Check for errors!
            if(curl_errno($curl)){
                throw new Exception(curl_error($curl));
            }
            //We should be logged in by now. Let's attempt to access a password protected page
            curl_setopt($curl, CURLOPT_URL, $url);
            //Use the same cookie file.
            curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIE_FILE);
            //Use the same user agent, just in case it is used by the server for session validation.
            curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
            //We don't want any HTTPS / SSL errors.
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            //Execute the GET request and print out the result.
            $html = curl_exec($curl);
            //echo '<pre>'; print_r($html); echo '<pre>'; exit;
            //preg_match_all('/<[\s]*meta[\s]*(name|property)="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $html, $match);

            if(!empty($html)) {
            	return $html;
            }else {
                return null;
            }
        }else {
           return null;
        }
    }
}