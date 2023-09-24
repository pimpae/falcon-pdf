<?php
    @header("Access-Control-Allow-Origin: *");
    @header("Access-Control-Allow-Methods: POST");
    @header("Access-Control-Allow-Credentials: true");
    @header("Content-Type: application/json; charset=UTF-8");
    @header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    include '../pdfparser/autoload.php';
    $parser = new \Smalot\PdfParser\Parser(); 


    if(isset($_GET["uploadPDF"])) {      
        @ob_end_clean();
        @header('Content-type: application/json');

        $fileName = basename($_FILES["pdf_file"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
          
        $allowTypes = array('pdf'); 
        if(in_array($fileType, $allowTypes)){  
            //include 'pdfparser/autoload.php';  
            $parser = new \Smalot\PdfParser\Parser();  
            $file = $_FILES["pdf_file"]["tmp_name"];  
            $pdf = $parser->parseFile($file);  
            $text = $pdf->getText();  
            $pdfText = nl2br($text); 
        }else{ 
            $statusMsg = '<p>Sorry, only PDF file is allowed to upload.</p>'; 
        } 

       

        $str = $pdfText;
        $arr = explode("\n", $str);  
        //var_dump($arr); 
        $adv_no = str_replace("  ","",$arr[22]); 
        $text2 = strpos($arr[77],"เบอร์โทรศัพท์ผู้แจ้งเหตุ"); 
        if ($text2 === false) {  
            $drv_name = $arr[81]; 
            $drv_tel = str_replace("  ","",$arr[82]);  
        }
        else{
            $drv_name = $arr[79]; 
            $drv_tel = str_replace("  ","",$arr[80]);  
        } 
        
        $text15 = strpos($arr[45],"สิ้นสุด"); 
        if ($text15 === false) {  
            $car_license = $arr[44];   
            $car_brand_id = $arr[46]; 
            $accident_date = substr($arr[47],0,10);  
        }
        else{
            $car_license = $arr[42]; 
            $car_brand_id = $arr[44]; 
            $accident_date = substr($arr[49],0,10);  
        }  


        $text16 = strpos($arr[51],"จังหวัด"); 
        if ($text16 === false) {  
            $car_province_id = $arr[56];   
        }
        else{
            $car_province_id = $arr[54];  
        } 
        $text20 = count($arr)-12; 
        $venue = $arr[$text20];  

        $text7 = strpos($arr[31],"-");
        if ($text7 == false) {
            $insure_no = $arr[33];  
            $insure_start_date = $arr[35];  
        }
        else{
            $insure_no = $arr[31];  
            $insure_start_date = substr($arr[33],0,10);  
        }

        $text16 = strpos($arr[45],"สิ้นสุด"); 
        if ($text16 === false) {  
            $coachwork_no = $arr[42];  
        }
        else{
            $coachwork_no = $arr[40];
        }
        $insure_type_id = $arr[27];


        $tex11 = strpos($arr[36],"-");
        if ($tex11 == false) {
            $Deduct = $arr[38];   
        }
        else{
            $Deduct = $arr[36];   
        }
        
        $insure_name = $arr[29]; 

        $text21 = count($arr)-9;
        $acc_type_id = $arr[$text21];  

        $text26 = count($arr)-1;
        $notify_name = $arr[$text26];  
        
        $text28 = count($arr)-10; 
        $text_area_comment = $arr[$text28];  


        $response = array(
            "adv_no" => str_replace("<br />","",$adv_no),
            "drv_tel" => str_replace("<br />","", $drv_tel),
            "drv_name" => str_replace("<br />","", mb_substr($drv_name, 0, 10, 'utf-8')), 
            "car_license" => str_replace("<br />","",$car_license),
            "car_brand_id" => str_replace("<br />","",$car_brand_id), 


            
            "car_province_id" => str_replace("<br />","",$car_province_id),
            "insure_no" => str_replace("<br />","",$insure_no),
            "insure_start_date" => str_replace("<br />","",$insure_start_date),
            "coachwork_no" => str_replace("<br />","",$coachwork_no),
            "insure_type_id" => str_replace("<br />","",$insure_type_id), 
            
            "insure_name" => str_replace("<br />","", mb_substr($insure_name, 0, 10, 'utf-8')), 
            "accident_date" => str_replace("<br />","",mb_substr($accident_date, 0, 10, 'utf-8')),  
            "acc_type_id" => str_replace("<br />","", mb_substr($acc_type_id, 0, 10, 'utf-8')), 
            
            "notify_name" => str_replace("<br />","", mb_substr($notify_name, 0, 10, 'utf-8')), 
            "text_area_comment" => str_replace("<br />","", mb_substr($text_area_comment, 0, 10, 'utf-8')), 
            "venue" => str_replace("<br />","",mb_substr($venue, 0, 10, 'utf-8'))

            
        );

        echo json_encode($response); 
    } 

 

?>