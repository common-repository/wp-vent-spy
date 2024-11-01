<?php

function cURLcheckBasicFunctions()
{
  if( !function_exists("curl_init") &&
      !function_exists("curl_setopt") &&
      !function_exists("curl_exec") &&
      !function_exists("curl_close") ) return false;
  else return true;
}

/*
 * Returns string status information.
 * Can be changed to int or bool return types.
 */
function cURLdownload($url, $file)
{
  //if( !cURLcheckBasicFunctions() ) return "UNAVAILABLE: cURL Basic Functions";
  $ch = curl_init();
  if($ch)
  {
    $fp = fopen($file, "w");
    if($fp)
    {
      if( !curl_setopt($ch, CURLOPT_URL, $url) ) return "FAIL: curl_setopt(CURLOPT_URL)";
      if( !curl_setopt($ch, CURLOPT_FILE, $fp) ) return "FAIL: curl_setopt(CURLOPT_FILE)";
      if( !curl_setopt($ch, CURLOPT_HEADER, 0) ) return "FAIL: curl_setopt(CURLOPT_HEADER)";
      if( !curl_exec($ch) ) return "FAIL: curl_exec()";
      curl_close($ch);
      fclose($fp);
      return "SUCCESS: $file [$url]";
    }
    else return "FAIL: fopen()";
  }
  else return "FAIL: curl_init()";
}
#http://nadeausoftware.com/articles/2007/06/php_tip_how_get_web_page_using_curl
function cURLget_webpage($url)
{
$options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "vent-spy", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 3,      // timeout on connect
        CURLOPT_TIMEOUT        => 12,      // timeout on response
        CURLOPT_MAXREDIRS      => 3,       // stop after 3 redirects
    );
		
		$ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $header;
}

?>