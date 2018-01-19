<?php
    session_start();
    if(isset($_POST['submit_form'])){
        $name =  $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $fname =$_POST['fname'];
        $lm_form = $_POST['lm_form'];
        $lm_key =$_POST["lm_key"];
        $lm_redirect=$_POST["lm_redirect"];
        $lm_source=$_POST["lm_source"];}
    if(!empty($name)&&!empty($email)&&!empty($phone)&&!empty($age)&&!empty($fname)){
        $name = test_input($name);
        $email = test_input($email);
        $phone = test_input($phone);
        $age = test_input($age);
        $fname = test_input($fname);
        $lm_form = test_input($lm_form);
        $lm_key = test_input($lm_key);
        $lm_redirect = test_input($lm_redirect);
        $lm_source = test_input($lm_source);
    
        $name = encodeUrl($name);
        $email = encodeUrl($email);
        $phone = encodeUrl($phone);
        $age = encodeUrl($age);
        $fname =encodeUrl($fname);
        $lm_form =encodeUrl($lm_form);
        $lm_key =encodeUrl($lm_key);
        $lm_redirect =encodeUrl($lm_redirect);
        $lm_source =encodeUrl($lm_source);
   
        $name = Utf8($name);
        $email =Utf8($email);
        $phone =Utf8($phone);
        $age = Utf8($age);
        $fname = Utf8($fname);
        $lm_form = Utf8($lm_form);
        $lm_key = Utf8($lm_key);
        $lm_redirect = Utf8($lm_redirect);
        $lm_source = Utf8($lm_source);
        post($name,$email,$phone,$age,$fname,$lm_key,$lm_form,$lm_source,$lm_redirect);
    }else{
        return false;
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;    
    };
    function encodeUrl($data){
        $data = urlencode($data);
        return $data;
    };
    function Utf8($data){
        $data = utf8_encode($data);
        return $data;
    }
    function post($name,$email,$phone,$age,$fname,$lm_form,$lm_key,$lm_source,$lm_redirect){
        //extract data from the post
        //set POST variables
        $url = 'http://api.lead.im/v1/submit';
        $fields = array(
        'lm_form'=> ($lm_form),
        'lm_key'=> ($lm_key),
	    'name' => ($name),
	    'fname' =>($fname),
	    'email' => ($email),
	    'phone' => ($phone),
        'age' =>($age),
        'lm_source'=>($lm_source),
        'lm_redirect'=> ($lm_redirect)
        );
        $fields_string = json_encode ($fields); 

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    // if(curl_error($ch))
    // {
    //     echo 'error:' . curl_error($ch);
    //     exit;
    // }
    if($result == true ){
        $_SESSION["succees"] = "Request successfully submitted!";
        header("location:../index.php");
    }else{
        switch ($result) {
        case -1:
            error_log("The value passed through lm_key parameter is incorrect!", 0);
            $_SESSION["err"] = "The value passed through lm_key parameter is incorrect!".$result;
            header("location:../index.php");
            break;
        case -3:
            error_log("The value passed through lm_form parameter is incorrect!", 0);
            $_SESSION["err"] = "The value passed through lm_form parameter is incorrect!";
            header("location:../index.php");
            break;
        case -4:
            error_log("The value passed through lm_form parameter is not found!", 0);
            $_SESSION["err"] = "The value passed through lm_form parameter is not found!";
            header("location:../index.php");
            break;
        case -5:
            error_log("Channel with ID passed through lm_form parameter is disabled!", 0);
            $_SESSION["err"] = "Channel with ID passed through lm_form parameter is disabled!";
            header("location:../index.php");
            break;
        case -6:
            error_log("unknown mode!", 0);
            $_SESSION["err"] = "unknown mode!";
            header("location:../index.php");
            break;
        case -7:
            error_log("Wrong account!", 0);
            $_SESSION["err"] = "Wrong account!";
            header("location:../index.php");
        break;
            case -8:
            error_log("Disabled account!", 0);
            $_SESSION["err"] = "Disabled account!";
            header("location:../index.php");
            break;
        case -10:
            error_log("Blocked IP!", 0);
            $_SESSION["err"] = "Blocked IP!";
            header("location:../index.php");
            break;
        case -50:
            error_log("Duplicate request!", 0);
            $_SESSION["err"] = "Duplicate request!";
            header("location:../index.php");
            break;
        case -999:
            error_log("Unexpected error. Please contact technical support.!", 0);
            $_SESSION["err"] = "Unexpected error. Please contact technical support.";
            header("location:../index.php");
            break;       
        };
    };
 };

?>

