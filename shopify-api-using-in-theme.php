  var cu_code =  localStorage.getItem("customer_code");
  if(cu_code != undefined){
    $(".customer_name").text(localStorage.getItem("customer_name"));
    $("input.customer_code").val(cu_code);
    var customer_code = cu_code;
    if(customer_code != ''){
      var data = {
        action:"check_customer",
        customer:customer_code
      			};
      var get_data = $.post("/a/staff",data);
      get_data.done(function(res){
        var result = JSON.parse(res);
        if(result['status'] == 'success'){
        	var customer_name = result['customer_name'];
          $(".customer_name").text(customer_name);
           localStorage.setItem("customer_id",result['customer_id']);
           localStorage.setItem("customer_name",result['customer_name']);
           localStorage.setItem("customer_code",customer_code);
          
          var urll = "https://f47d6cfe1a54ae53e7d4cd0ca1f1158b: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@goodwill-staff.myshopify.com/admin/orders.json?customer_id="+result['customer_id']+"&limit=10&status=any";
          
            var api_url = "https://goodwill-staff.myshopify.com/admin/orders.json?customer_id="+result['customer_id']+"&limit=10&status=any";
            fetch(api_url, {
                method: 'GET',
                credentials: 'same-origin',
                redirect: 'follow',
                agent: null,
                headers: {
                    "Content-Type": "text/plain",
                    'Authorization': 'Basic ' + btoa('f47d6cfe1a54ae53e7d4cd0ca1f1158b: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'),
                },
                timeout: 5000
            }).then(response => {
               var data = response.json();
              console.log(data);
              
           
              
               var promise = Promise.resolve(data);
               promise.then(function(result1) {
    updatePrices(result1);
            htt = '<table><tr><th>Date</th><th>Order No</th><th>Amount</th></tr></table>';
            $('.Orders_list').append(htt);  
   	
            for (var i = 0; i < result1['orders'].length; i++) {             
              $('.customerid b').html(customer_code);
              id = result1['orders'][i].id;
              creatat = result1['orders'][i].created_at;
              cc1 = new Date(creatat).toLocaleDateString();
              cc = getDateString(new Date(cc1), "d-M-y");
			  amount = result1['orders'][i].current_subtotal_price;
              name = result1['orders'][i].name;
              email = result1['orders'][i].email;              
              $('.customername b').html(customer_name);
              cls = '.order_item_'+i;
              clss = 'order_item_'+i;
              htm = '<tr><td>'+cc+'</td><td><a href="#" data-class="'+clss+'">'+name+'</a></td><td>Qr '+amount+'</td></tr>';
              $('.Orders_list table').append(htm);
              hl = '<table class="order_item_'+i+'" style="display:none;"><tr><th>ID</th><th>Item Name</th><th>Price</th><th>Qty</th><th>Total</th></tr></table>';              
              $('.Orders_list1').append(hl);
              var pid = 1;
              for(j=result1['orders'][i].line_items.length;j--;) {
                productid = result1['orders'][i].line_items[j].product_id;
                productname = result1['orders'][i].line_items[j].name;
                productprice = result1['orders'][i].line_items[j].price;
                productqty = result1['orders'][i].line_items[j].quantity;
                producttotal = '';
                  reslt = '<tr><td>'+pid+'</td><td>'+productname+'</td><td>'+productprice+'</td><td>'+productqty+'</td><td>'+producttotal+''+productprice+'</td></tr>';
                  $(cls).append(reslt);
                pid = pid + 1;
              }
              rlt = '<tr><td colspan="4" style="text-align:right;"><b>Total</b></td><td><b>'+amount+'</b></td><tr>';
              $(cls).append(rlt);
              
            }
            if(result1['orders'].length == 0) {
              $('.Orders_list').html('');
              $('.customerid b').html(result['customer_id']);
              $('.customername b').html(result['customer_name']);
              $('.Orders_list').append('<br><b>No Orders Found..<b>');
            }
            $('.order_showbtn').show();
           });
          }); 
          
          var api_url1 = "https://goodwill-staff.myshopify.com/admin/customers/"+result['customer_id']+".json";
            fetch(api_url1, {
                method: 'GET',
                credentials: 'same-origin',
                redirect: 'follow',
                agent: null,
                headers: {
                    "Content-Type": "text/plain",
                    'Authorization': 'Basic ' + btoa('f47d6cfe1a54ae53e7d4cd0ca1f1158b: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'),
                },
                timeout: 5000
            }).then(response => {
               var data1 = response.json();
               var promise1 = Promise.resolve(data1);
               promise1.then(function(result2) {
               rs = result2['customer'].tags;
               note = ', '+result2['customer'].note;
               if(note == '') {
                   localStorage.removeItem("customer_note"); 
               } else {
                   $('.code_tagg span').html(note);
                   localStorage.setItem("customer_note",note);  
               }  
                 if(rs.indexOf("credit") >= 0) {
                   $('.code_tagg.code_tagg-1').show();                  
                   $('.code_tagg.code_tagg-2').hide();
                   $('.code_tagg.code_tagg-3').hide();
                   $('ul#products-grid .item.product').hide();
                   $('ul#products-grid .item.product.credit-list').show();
                   localStorage.setItem("customer_py_1",'credit');
                 } else if(rs.indexOf("cash") >= 0) {
                   $('.code_tagg.code_tagg-1').hide();                  
                   $('.code_tagg.code_tagg-2').show();
                   $('.code_tagg.code_tagg-3').hide();
                   $('ul#products-grid .item.product').hide();
                   $('ul#products-grid .item.product.cash-list').show();
                   localStorage.setItem("customer_py_1",'cash');
                 } else {
                   $('.code_tagg.code_tagg-1').hide();                  
                   $('.code_tagg.code_tagg-2').hide();
                   $('.code_tagg.code_tagg-3').show();
                   $('.code_tagg.code_tagg-3 span').html($('.code_tagg.code_tagg-3 span').html().replace(',',' '));
                   $('ul#products-grid .item.product').show();
                   localStorage.removeItem("customer_py_1");
                 }
            });
          });
        }
      });
    }
    
    
  }
  
  
  
