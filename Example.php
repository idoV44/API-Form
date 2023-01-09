<?php


//the api url for connection
$api_url = "https://example.tld";


function submit_ticket($act, $trademark_symbol, $urls,  $destination_ips, $providerCaseId, $comments, $agent_name,$reg_num, $reg_office)
{
        global $api_url;

if($act=="abuse_trademark"){
	$api_url = "https://example.tld/tm";
}


//using fresh CURL
        $curl = curl_init();

//Putting the token of Example services
        $headers2 = array(
                                'CF-Access-Client-Id:****',
								'CF-Access-Client-Secret:****',
								'Content-Type:application/json',
                                );

//lets send the "Package"
        $data2 = array(
                            'urls'              => $urls,
                            'trademark_symbol'  => $trademark_symbol,
                            'destination_ips'   => $destination_ips,
                            'agent_name'         => $agent_name,
                            'comments'           => $comments,
                            'act'        => $act,
							'trademark_number'    =>$reg_num,
							'trademark_office' =>$reg_office,
							'name' => "Ex1",
							'Ex12' => "2",
							'Ex13' => "3",
							'email' => "ex@example.tld",
							'email2' => "ex@example.tld",
							'company' => "Example",
							'agree' => 1,
							'signature' => "Example"
                        );


       $data2_json = json_encode($data2);
	   
        $curl = curl_init();
//transfer the data
        curl_setopt_array($curl, array(
                                                CURLOPT_RETURNTRANSFER => 1,
                                                CURLOPT_URL => $api_url,
                                                CURLOPT_CUSTOMREQUEST => "POST",
                                                CURLOPT_POSTFIELDS => $data2_json,
                                                CURLOPT_HTTPHEADER => $headers2,
                                                CURLOPT_SSL_VERIFYPEER => false
                                                        )
        );

        $resp = curl_exec($curl);
		
        // we want to get the http status
		$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		//we will cut the string so we can get only the values we wish
		$problem=strstr( $resp, 'msg":' );
		$problem=strstr( $problem, ' ');
		$problem=strstr( $problem, '"err_code"', true );
		$true=strstr( $resp, '"example":' );
		$true=strstr( $true, ' ');
		$true=strstr( $true, '}', true );

		//print if success
		if ($http_code!= 200) {
					echo "There is a problem: ", $problem;
					$true="";
			}else{
					echo "\r\n The attack is successfully sent!";
				}
			curl_close($curl);
		
		//return the ticket id of Example.
        return $true;
}


 
?>
