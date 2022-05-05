<?php
$pro_handle = $_GET['handle'];
$query = '{
    products(first:1, query: "'.$pro_handle.'") {
        edges {
            node {
              id
              handle
    variants(first: 90) {
          edges {
            node {
              legacyResourceId
              barcode
                metafields(first:7) {
                  edges {
                      node {
                          namespace
                          key
                          value
                      }
                  }
              }
              inventoryItem {
                        id
                        legacyResourceId
                    }
            }
          }
        }   
        
        
        }
          }
      pageInfo {
        hasNextPage
      }
    }
  }';



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
  CURLOPT_POSTFIELDS =>$query,
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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',
    'Content-Type: application/graphql',
    'Cookie: _master_udr=eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaEpJaWxtWmpFMU9ERTNOQzB3WXpZd0xUUmxPR1l0WVRCbFpDMHdNemd3TkRCak5HTXdNRGtHT2daRlJnPT0iLCJleHAiOiIyMDI0LTA1LTA1VDA5OjM5OjUzLjAxN1oiLCJwdXIiOiJjb29raWUuX21hc3Rlcl91ZHIifX0%3D--0ca4035759fdeeea4360ed8986f31d483e11ab3d; _secure_admin_session_id=6a97cbbceee8dc93775c8c5097f19fdd; _secure_admin_session_id_csrf=6a97cbbceee8dc93775c8c5097f19fdd; identity-state=BAhbCkkiJTQxNjZiYzM3N2MwYjM4ODU5MmFlOTVhYTdhNTc3NWYyBjoGRUZJIiU3NmRkNGQzNWFiNGQxZDYwYWNiOGRkZDE4NzA5ZDhhNAY7AEZJIiVjNzhhYWYwOGI0OTFiY2Y2ZmVjNzg1YmY1YTllZjQwOAY7AEZJIiVkNjRlYzVmNDA1NWU1OTI1ZmU1Yzk3OGY4YzA3MzI5OQY7AEZJIiU4MjBiMTAxNDc5MDljODNmZTQxZDk1OGU4ZTlmYzUyMQY7AEY%3D--9482cb2d95c1971b4f014308918e93039fba34e4; identity-state-4166bc377c0b388592ae95aa7a5775f2=BAh7DEkiDnJldHVybi10bwY6BkVUSSJCaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9sb2dpbgY7AFRJIhFyZWRpcmVjdC11cmkGOwBUSSJOaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9pZGVudGl0eS9jYWxsYmFjawY7AFRJIhBzZXNzaW9uLWtleQY7AFQ6DGFjY291bnRJIg9jcmVhdGVkLWF0BjsAVGYXMTY1MTc0NDE5NS40NTYwNzc2SSIKbm9uY2UGOwBUSSIlNjQ1NTgxMzc5NjYwZjU1MDZiZjFlYjdhMGVhMDFhNWEGOwBGSSIKc2NvcGUGOwBUWw9JIgplbWFpbAY7AFRJIjdodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL2Rlc3RpbmF0aW9ucy5yZWFkb25seQY7AFRJIgtvcGVuaWQGOwBUSSIMcHJvZmlsZQY7AFRJIk5odHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3BhcnRuZXJzLmNvbGxhYm9yYXRvci1yZWxhdGlvbnNoaXBzLnJlYWRvbmx5BjsAVEkiMGh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvYmFua2luZy5tYW5hZ2UGOwBUSSJCaHR0cHM6Ly9hcGkuc2hvcGlmeS5jb20vYXV0aC9tZXJjaGFudC1zZXR1cC1kYXNoYm9hcmQuZ3JhcGhxbAY7AFRJIjxodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3Nob3BpZnktY2hhdC5hZG1pbi5ncmFwaHFsBjsAVEkiN2h0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvZmxvdy53b3JrZmxvd3MubWFuYWdlBjsAVEkiPmh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvb3JnYW5pemF0aW9uLWlkZW50aXR5Lm1hbmFnZQY7AFRJIg9jb25maWcta2V5BjsAVEkiDGRlZmF1bHQGOwBU--e42ecc3f4c04b42550360063d6f8d59ae9c65057; identity-state-76dd4d35ab4d1d60acb8ddd18709d8a4=BAh7DEkiDnJldHVybi10bwY6BkVUSSJCaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9sb2dpbgY7AFRJIhFyZWRpcmVjdC11cmkGOwBUSSJOaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9pZGVudGl0eS9jYWxsYmFjawY7AFRJIhBzZXNzaW9uLWtleQY7AFQ6DGFjY291bnRJIg9jcmVhdGVkLWF0BjsAVGYXMTY1MTc0NDIwNS45NDYxNzc1SSIKbm9uY2UGOwBUSSIlYzI2NzVhNmQ1M2NkMjM2YmY0ZGU4ZTQ4MjM1MzVmMTIGOwBGSSIKc2NvcGUGOwBUWw9JIgplbWFpbAY7AFRJIjdodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL2Rlc3RpbmF0aW9ucy5yZWFkb25seQY7AFRJIgtvcGVuaWQGOwBUSSIMcHJvZmlsZQY7AFRJIk5odHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3BhcnRuZXJzLmNvbGxhYm9yYXRvci1yZWxhdGlvbnNoaXBzLnJlYWRvbmx5BjsAVEkiMGh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvYmFua2luZy5tYW5hZ2UGOwBUSSJCaHR0cHM6Ly9hcGkuc2hvcGlmeS5jb20vYXV0aC9tZXJjaGFudC1zZXR1cC1kYXNoYm9hcmQuZ3JhcGhxbAY7AFRJIjxodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3Nob3BpZnktY2hhdC5hZG1pbi5ncmFwaHFsBjsAVEkiN2h0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvZmxvdy53b3JrZmxvd3MubWFuYWdlBjsAVEkiPmh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvb3JnYW5pemF0aW9uLWlkZW50aXR5Lm1hbmFnZQY7AFRJIg9jb25maWcta2V5BjsAVEkiDGRlZmF1bHQGOwBU--2dbb39dac2a8bd86700e7f9037710eecca3ccb27; identity-state-820b10147909c83fe41d958e8e9fc521=BAh7DEkiDnJldHVybi10bwY6BkVUSSJCaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9sb2dpbgY7AFRJIhFyZWRpcmVjdC11cmkGOwBUSSJOaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9pZGVudGl0eS9jYWxsYmFjawY7AFRJIhBzZXNzaW9uLWtleQY7AFQ6DGFjY291bnRJIg9jcmVhdGVkLWF0BjsAVGYXMTY1MTc0NDIzOC40MzUzOTYySSIKbm9uY2UGOwBUSSIlMzU3YzQ4MWJjZTQ5ZTQ1YjdlOWE3YmUwNGM3NTA3MmYGOwBGSSIKc2NvcGUGOwBUWw9JIgplbWFpbAY7AFRJIjdodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL2Rlc3RpbmF0aW9ucy5yZWFkb25seQY7AFRJIgtvcGVuaWQGOwBUSSIMcHJvZmlsZQY7AFRJIk5odHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3BhcnRuZXJzLmNvbGxhYm9yYXRvci1yZWxhdGlvbnNoaXBzLnJlYWRvbmx5BjsAVEkiMGh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvYmFua2luZy5tYW5hZ2UGOwBUSSJCaHR0cHM6Ly9hcGkuc2hvcGlmeS5jb20vYXV0aC9tZXJjaGFudC1zZXR1cC1kYXNoYm9hcmQuZ3JhcGhxbAY7AFRJIjxodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3Nob3BpZnktY2hhdC5hZG1pbi5ncmFwaHFsBjsAVEkiN2h0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvZmxvdy53b3JrZmxvd3MubWFuYWdlBjsAVEkiPmh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvb3JnYW5pemF0aW9uLWlkZW50aXR5Lm1hbmFnZQY7AFRJIg9jb25maWcta2V5BjsAVEkiDGRlZmF1bHQGOwBU--cccc0bb5f05e6e1907cf1c62da72b6b8263c2c70; identity-state-c78aaf08b491bcf6fec785bf5a9ef408=BAh7DEkiDnJldHVybi10bwY6BkVUSSJCaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9sb2dpbgY7AFRJIhFyZWRpcmVjdC11cmkGOwBUSSJOaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9pZGVudGl0eS9jYWxsYmFjawY7AFRJIhBzZXNzaW9uLWtleQY7AFQ6DGFjY291bnRJIg9jcmVhdGVkLWF0BjsAVGYXMTY1MTc0NDIyMC40OTY5NjgzSSIKbm9uY2UGOwBUSSIlOWFlYTFkNGZiZGRjZmRkYmYyMjgwMGJjNjVmNGFlZDMGOwBGSSIKc2NvcGUGOwBUWw9JIgplbWFpbAY7AFRJIjdodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL2Rlc3RpbmF0aW9ucy5yZWFkb25seQY7AFRJIgtvcGVuaWQGOwBUSSIMcHJvZmlsZQY7AFRJIk5odHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3BhcnRuZXJzLmNvbGxhYm9yYXRvci1yZWxhdGlvbnNoaXBzLnJlYWRvbmx5BjsAVEkiMGh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvYmFua2luZy5tYW5hZ2UGOwBUSSJCaHR0cHM6Ly9hcGkuc2hvcGlmeS5jb20vYXV0aC9tZXJjaGFudC1zZXR1cC1kYXNoYm9hcmQuZ3JhcGhxbAY7AFRJIjxodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3Nob3BpZnktY2hhdC5hZG1pbi5ncmFwaHFsBjsAVEkiN2h0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvZmxvdy53b3JrZmxvd3MubWFuYWdlBjsAVEkiPmh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvb3JnYW5pemF0aW9uLWlkZW50aXR5Lm1hbmFnZQY7AFRJIg9jb25maWcta2V5BjsAVEkiDGRlZmF1bHQGOwBU--7076ed8a5984b4eafb9a50ea77543ddadff2ed18; identity-state-d64ec5f4055e5925fe5c978f8c073299=BAh7DEkiDnJldHVybi10bwY6BkVUSSJCaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9sb2dpbgY7AFRJIhFyZWRpcmVjdC11cmkGOwBUSSJOaHR0cHM6Ly9wcmltYXJ5LWRyZXNzaW52ZW50b3J5Lm15c2hvcGlmeS5jb20vYWRtaW4vYXV0aC9pZGVudGl0eS9jYWxsYmFjawY7AFRJIhBzZXNzaW9uLWtleQY7AFQ6DGFjY291bnRJIg9jcmVhdGVkLWF0BjsAVGYXMTY1MTc0NDIyNS4wNDkyOTY5SSIKbm9uY2UGOwBUSSIlYjUxNjkwMTFjNDkwMDViOWY3YmNjNzEwODhiYzI5YTcGOwBGSSIKc2NvcGUGOwBUWw9JIgplbWFpbAY7AFRJIjdodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL2Rlc3RpbmF0aW9ucy5yZWFkb25seQY7AFRJIgtvcGVuaWQGOwBUSSIMcHJvZmlsZQY7AFRJIk5odHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3BhcnRuZXJzLmNvbGxhYm9yYXRvci1yZWxhdGlvbnNoaXBzLnJlYWRvbmx5BjsAVEkiMGh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvYmFua2luZy5tYW5hZ2UGOwBUSSJCaHR0cHM6Ly9hcGkuc2hvcGlmeS5jb20vYXV0aC9tZXJjaGFudC1zZXR1cC1kYXNoYm9hcmQuZ3JhcGhxbAY7AFRJIjxodHRwczovL2FwaS5zaG9waWZ5LmNvbS9hdXRoL3Nob3BpZnktY2hhdC5hZG1pbi5ncmFwaHFsBjsAVEkiN2h0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvZmxvdy53b3JrZmxvd3MubWFuYWdlBjsAVEkiPmh0dHBzOi8vYXBpLnNob3BpZnkuY29tL2F1dGgvb3JnYW5pemF0aW9uLWlkZW50aXR5Lm1hbmFnZQY7AFRJIg9jb25maWcta2V5BjsAVEkiDGRlZmF1bHQGOwBU--0e4edc2ebc55928e34c8264ecddc86e30a463fa6'
  ),
));



$response = curl_exec($curl);
$json_response = json_decode($response,true);
$products_get = $json_response['data']['products']['edges'];
$barcodes_etas = array();
foreach($products_get as $key=>$value){
    $variants = $value['node']['variants']['edges'];
    //var_dump($variants);
    foreach($variants as $variant_key=>$variant_value){
        $variant_barcode = $variant_value['node']['barcode'];
        $metafield = $variant_value['node']['metafields']['edges'];
        
                foreach($metafield as $metafield_key => $metafield_value){
                    $metafield_key_real = $metafield_value['node']['key'];
                   // var_dump($metafield_key_real);
                            if($metafield_key_real == 'wipdate'){
                                $metafield_value_real = $metafield_value['node']['value'];
                                $barcodes_etas[$variant_barcode] = $metafield_value_real;
                            }

                }

    }
}


echo json_encode($barcodes_etas); 

curl_close($curl);

?>
