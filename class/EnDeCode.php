<?php include 'dbPDO_mng.php';
class EnDeCode extends dbPDO_mng {
    private $msg;
    private $pass;
    private $iv;
    private $method;
    
function sslPrm()
{
return array("1234567812345678","1234567812345678","aes-128-cbc");
}
function sslEnc($msg)
{    $this->msg=$msg;
  list ($this->pass, $this->iv, $this->method)=  $this->sslPrm();
  if(function_exists('openssl_encrypt'))
     return urlencode(openssl_encrypt(urlencode($this->msg), $this->method, $this->pass, true, $this->iv));
  else
     return urlencode(exec("echo \"".urlencode($this->msg)."\" | openssl enc -".urlencode($this->method)." -base64 -nosalt -K ".bin2hex($this->pass)." -iv ".bin2hex($this->iv)));
}
function sslDec($msg)
{    $this->msg=$msg;
  list ($this->pass, $this->iv, $this->method)=  $this->sslPrm();
  if(function_exists('openssl_decrypt'))
     return trim(urldecode(openssl_decrypt(urldecode($this->msg), $this->method, $this->pass, TRUE, $this->iv)));
  else
     return trim(urldecode(exec("echo \"".urldecode($this->msg)."\" | openssl enc -".  $this->method." -d -base64 -nosalt -K ".bin2hex($this->pass)." -iv ".bin2hex($this->iv))));
}
}
