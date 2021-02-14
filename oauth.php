<?php
    $client_id = "client_id";
    $client_secret = "client_secret";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://oauth.iitd.ac.in/token.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "client_id=".$client_id."&client_secret=".$client_secret."&grant_type=authorization_code&code=". $_GET["code"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = json_decode(curl_exec($ch));
    curl_close($ch);

    if (isset($result->access_token)){
        //Login Successful
        //Get user login id
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://oauth.iitd.ac.in/resource.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=".$result->access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result1 = json_decode(curl_exec($ch));
        curl_close($ch);
        $login_id = $result1->user_id;}
    else{
        //Login Failure
        
    }
?>