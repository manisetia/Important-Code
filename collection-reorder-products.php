<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://primary-dressinventory.myshopify.com/admin/api/unstable/graphql.json',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"query":"mutation collectionReorderProducts($id: ID!, $moves: [MoveInput!]!) {\\r\\n  collectionReorderProducts(id: $id, moves: $moves) {\\r\\n    job {\\r\\n      id\\r\\n    }\\r\\n    userErrors {\\r\\n      field\\r\\n      message\\r\\n    }\\r\\n  }\\r\\n}\\r\\n","variables":{"id":"gid://shopify/Collection/396828246266","moves":{"id":"gid://shopify/Product/7567589671162","newPosition":"48"}}}',
  CURLOPT_HTTPHEADER => array(
    'x-shopify-access-token: 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',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
