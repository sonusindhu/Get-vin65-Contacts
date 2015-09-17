<?php
$ch = curl_init();
$data = '<soap:Envelope xmlns:soap="https://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="https://www.w3.org/2001/XMLSchema">
<soap:Body>
  <SearchContacts>
    <Request>
      <Security>
        <Username>your username</Username>
        <Password>your password</Password>
      </Security>
      <SortBy>LastName</SortBy>
      <MaxRows>100</MaxRows>
      <Page>1</Page>
    </Request>
  </SearchContacts>
</soap:Body>
</soap:Envelope>'; 
      
curl_setopt($ch, CURLOPT_URL, 'https://webservices.vin65.com/V300/ContactService.cfc?wsdl');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$res = curl_exec($ch);
if ($res === false) {
        echo "Curl error: " . curl_error($ch) . NEWLINE;
} else {
        echo "<pre>";
        print_r($res);
        exit;
        echo "Operation completed successfully" . NEWLINE;
}
curl_close($ch);  
?>