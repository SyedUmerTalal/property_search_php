<?php
ob_start();
if($_POST){
    $myPage = $_POST['page'] ?? 1;
    $view = $myPage + 1;
    $city = $_POST['city'] ? "pba__city_pb__c=".$_POST['city'].'&' : '';
    $type = $_POST['property_type'] ? "pba__Propertytype__c=".$_POST['property_type'].'&' : '';
    $range = $_POST['range'];
    $sqft = $_POST['sqft'] ? "pba__totalarea_pb__c=[0;".$_POST['sqft']."]".'&':'';
    $bed = $_POST['bed'] ? "pba__Bedrooms_pb__c=[0;".$_POST['bed']."]".'&':'';
    $bath = $_POST['bath'] ? "pba__FullBathrooms_pb__c=[0;".$_POST['bath']."]".'&':'';
    $keyword = $_POST['keyword'] ? 'name=%25'.$_POST['keyword'].'%25&': '';
    $url = 'https://skyviewdubai.secure.force.com/pba__WebserviceListingsQuery?token=e4d5d730d6c48df0baaae2ee71916325&fields=name;id;pba__Propertytype__c;pba__totalarea_pb__c;pba__Description_pb__c;pba__city_pb__c;pba__neighborhood_pb__c;pba__FullBathrooms_pb__c;pba__Bedrooms_pb__c;pba_uaefields__Broker_s_Listing_ID__c;pba__ListingPrice_pb__c&itemsperpage=10&page='.$myPage.'&pba__ListingPrice_pb__c=[0;'.$range.']&'.$city.'&'.$type.'&'.$sqft.'&'.$bed.'&'.$keyword.'&'.$bath.'debugmode=false&format=json';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    if(!empty($result))
    {
        $json = json_decode($result);
        $data = [];
        if($json->listings)
        {
            // foreach($json as $row)
            // {
            //     $data[] = $row;
            // }
            $dd = array(
                'content'=>$json,
                'page'=>$view,
            );
            echo json_encode($dd);
        }
        else
        {
            $dd = array(
                'content'=>$data,
                'page'=>$view,
            );
            echo json_encode($dd);
        }
    }
    else
    {
        $dd = array(
            'content'=>$data,
            'page'=>$view,
        );
        echo json_encode($dd);
    }
}
ob_end_flush(); 
?>