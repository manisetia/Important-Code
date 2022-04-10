<?php

$url = "https://f144e10537940291d73c0eef308203f1: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@local-primary-store.myshopify.com/admin/api/unstable/graphql.json";

var_dump($url);
/* Member Metafields Shopify */
$graphql_data = '{
products(first: 5, query: "(sku:MAN123) OR (sku:123SE)") {
      edges {
        node {
          id
          handle
        }
      }
      pageInfo {
        hasNextPage
      }
    }
  }';
//Use CURL to send the data	
//open connection
$ch = curl_init();
		
//set the url, number of GET vars, GET data
curl_setopt($ch,CURLOPT_URL, $url);

//Set the curl to POST, not GET	
curl_setopt($ch,CURLOPT_POST, 1);

//Use the php function http_build_query to create a data array to be send with your metadata
curl_setopt($ch,CURLOPT_POSTFIELDS, $graphql_data)
;


curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-type: application/graphql',
    'x-shopify-access-token: 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'
));


//Set your Shopify login tokens
	
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
$get_data = json_decode($result,true);
//$member_id = $get_data['metafield']['id'];

/* End Member Metafields Shopify */

var_dump($get_data);


?>
