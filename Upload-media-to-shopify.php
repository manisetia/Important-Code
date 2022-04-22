<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => '',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"query":"mutation generateStagedUploads($input: [StagedUploadInput!]!) {\\r\\n  stagedUploadsCreate(input: $input) {\\r\\n    stagedTargets {\\r\\n      url\\r\\n      resourceUrl\\r\\n      parameters {\\r\\n        name\\r\\n        value\\r\\n      }\\r\\n    }\\r\\n    mediaUserErrors { code, field, message }\\r\\n  }\\r\\n}\\r\\n","variables":{"input":[{"filename":"watches_comparison.mp4","mimeType":"video/mp4","resource":"VIDEO","fileSize":"899765"},{"filename":"another_watch.glb","mimeType":"model/gltf-binary","resource":"MODEL_3D","fileSize":"456"}]}}',
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
