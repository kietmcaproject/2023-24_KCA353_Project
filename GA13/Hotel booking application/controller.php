<?php
  session_start();
//   error_reporting(E_ALL & ~ E_NOTICE);
  include('textlocal.class.php');

  class Controller
{
    function __construct() {
      $this->processMobileVerification();
    }
    function processMobileVerification()
    {
        switch ($_POST["action"])
        {
            case "send_otp":

                $mobile_number = $_POST['mobile_number'];
                $apiKey = urlencode('NDQ0ZjQ3NTc0YzcwMzk0ODdhNTY3ODUyNWEzNTcyNmU=');
                $Textlocal = new Textlocal(false,false,$apiKey);

                $numbers = array(
                    $mobile_number
                );
                $sender = 'TXTLCL';
                $otp = mt_rand(10000,99999);
                $_SESSION['session_otp'] = $otp;
                $message = "Your One Time Password is " . $otp;

                try{
                    $response = $Textlocal->sendSms($numbers,$message,$sender);
                    
                    require_once("verification-form.php");
                    exit();
                }
                catch(Exception $e){
                    die('Error: '.$e->getMessage());
                }
                break;

            case "verify_otp":
                $otp = $_POST['otp'];

                if($otp == $_SESSION['session_otp']) {
                    unset($_SESSION['session_otp']);
                    echo json_encode(array("type"=>"success","message"=>"Your Mobile number is Verified!"));
                }
                else{
                    echo json_encode(array("type"=>"error", "message"=>"Mobile number Verification Failed"));
                }
                break;
        }
    }
}
$controller = new Controller();
?>

