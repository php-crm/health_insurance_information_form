<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $email=$_POST['email'];
	$phone=$_POST['phone'];
  $dob=$_POST['dob'];
  $address=$_POST['address'];
	$city=$_POST['city'];
  $state=$_POST['state'];
  $zip_code=$_POST['zip_code'];
  $country=$_POST['country'];

  $spouse_name=$_POST['spouse_name'];
	$spouse_dob=$_POST['spouse_dob'];
  $children_name=$_POST['children_name'];
  $children_dob=$_POST['children_dob'];
  $employer_insurance=$_POST['employer_insurance'];
  $medicare=$_POST['medicare'];
  $any_mess=$_POST['any_mess'];


  $field1="<b>Date Of Birth:</b> ".$dob."<br>"."<b>Address: </b>"."<br>"."Street: ".$address."<br>"."City: ".$city."<br>"."State: ".$state."<br>"."Zip Code: ".$zip_code."<br>"."Country: ".$country."<br>"."<b>Spouse Name:</b> ".$spouse_name."<br>"."<b>Spousen Date Of Birth:</b> ".$spouse_dob."<br>"."<b>Children Name:</b> ".$children_name."<br>"."<b>Children Date Of Birth:</b> ".$children_dob."<br>"."<b>Does your employer offer health insurance?:</b> ".$employer_insurance."<br>"."<b>Do you receive Medicare?:</b> ".$medicare."<br>"."<b>Any Message:</b> ".$any_mess;

}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>