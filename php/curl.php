<!-- 
                ------------------------ All curl function --------------------------

curl_init — To initialize the cURL session for the URL
curl_exec — After a cURL session has been created and all of the session's options have been
curl_close — Used to close the session of cURL

curl_copy_handle() ====  This function is used to copy a cURL handle with all its preferences.
curl_errno() ==== This function returns the last error number from the cURL session.
curl_error() ====  This function returns the string containing the last error for the present session.
curl_escape() === This function is used to encode the URL of the given string.
curl_pause — Pause and unpause the session connection
curl_reset — Reset all options of a libcurl session handle
curl_file_create() ==== This function is used to create a cURL file object.
curl_getinfo() ==== This function returns the information of the specific transfer.
curl_multi_add_handle() ==== This function connects the cURL_handle to the cURL_multi_handle.
curl_multi_close() === This function is used to close multiple sets of cURL handles.
curl_multi_info_read() ==== This function receives current transfer information.
curl_multi_exec() ===== This function executes the sub-connections of the present cURL session.
curl_setopt_array() ===== This function sets the multiple options for the cURL session.
curl_version ===== This function returns the cURL version information.
curl_strerror() ==== This function returns the string describing the given error. -->




<?php

    // $curl = curl_init();

    // $url = "https://www.google.com";
    // curl_setopt($curl, CURLOPT_URL, $url);        // url for data fatch or send 
    // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);        // check ssl verification 
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);       // result store in value, return data not show in page

    // $result = curl_exec($curl);      // execute the curl 
    // echo $result;

    // curl_close($curl);   // curl close 


?>


<!--    ..............................  cURL post method  send data....................................    -->

<?php

    // // $data = array("num1"=>3);
    // $data = array("num1"=>3,"num2"=>31);
    // $string = http_build_query($data);   // data convert url value type with & operator 
    // $url = "localhost/mps/data.php";

    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $url);                                         // url for data fatch or send 
    // curl_setopt($ch, CURLOPT_POST, true);                // post method request
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $value = curl_exec($ch); 
    // echo $value;

    // curl_close($ch); 
?>


<!--  ................................ curl opt can written with array function ..................               -->


<?php

    $data = array("num1"=>3,"num2"=>31);
    $string = http_build_query($data);
    $url = "localhost/mps/data.php";

    $ch = curl_init();

    curl_setopt_array($ch,
    array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $string
    ));

    curl_exec($ch); 
    curl_close($ch); 


?>