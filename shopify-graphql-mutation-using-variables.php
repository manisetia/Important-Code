<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://c171f4c609be2f7660c611505e7f676c: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@primary-dressinventory.myshopify.com/admin/api/unstable/graphql.json',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"query":"mutation deleteProductMedia($id: ID!, $mediaIds: [ID!]!) {\\r\\n  productDeleteMedia(productId: $id, mediaIds: $mediaIds) {\\r\\n    deletedMediaIds\\r\\n    product {\\r\\n      id\\r\\n    }\\r\\n    mediaUserErrors {\\r\\n      code\\r\\n      field\\r\\n      message\\r\\n    }\\r\\n  }\\r\\n}","variables":{"id":"gid://shopify/Product/7567589703930","mediaIds":["gid://shopify/MediaImage/29316625694970"]}}',
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>
