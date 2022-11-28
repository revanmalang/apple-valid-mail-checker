<?php
date_default_timezone_set('Asia/Jakarta');
$token = "75762f0098f3f9e5a9b3ef2d457adac4_"; //TOKEN LU

$banner = "\e[36;1m                                                                                 
                                                                                 
           #         ######   
           #    #             
  ######   #    #  ########## 
           #    #  #        # 
           #######        ##  
##########      #       ##    
                #     ##      
                              
                                                                                 
[#] Apple Valid Mail [#]    
                                   
Coded by : Revan AR                  
Team     : IndoSec                   
Github   : https//github.com/revan-ar/\n\n\e[0;1m";
sleep(3);
echo $banner;
sleep(2);
echo "Masukan List : ";
$file = trim(fgets(STDIN));
$get = file_get_contents($file);
echo "\n\n[+] RESULT [+]\n";

if(empty($get)) {
	echo "File ".$file." tidak ada\n";
	}else{
		$exp = explode("\n", $get);
for ($i=0; $i <= count($exp) - 1; $i++) {
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://mytools.mohona.tv/api.php");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$exp[$i]."&token=".$token);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 6.0.1; ASUS_X00AD Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36");
	$gas = curl_exec($ch);
	curl_close($ch);
	
	if (!empty(preg_match("/NOT VALID/", $gas))) {
    	echo $i+1 .". [".date('d-m-y H:i:s')."] ".$exp[$i]." => \e[31;1mNOT VALID\e[0;1m\n";
    }else if ($gas == "token salah\n") {
    	echo $i+1 .". Token salah\n";
}else {
    	echo $i+1 .". [".date('d-m-y H:i:s')."] ".$exp[$i]." => \e[32;1mVALID\e[0;1m\n";
    	$file = "valid_apple.txt";
			  touch($file);
			  $o = fopen($file, 'a');
			  fwrite($o, $exp[$i]."\n");
			  fclose($o);
    	
		}
		
	
	}
}
