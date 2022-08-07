$(document).ready(function(){  
    // alert("Hello Javascript"); 
    $(".getpaymentmethod").click(function() {
   var getpaymentmethod= $(this).val();
            // console.log(getpaymentmethod);
         
            var paymentmessage = $(this).attr('rel');
            $('#paymentmessage').text("Thank you for Choosing Cash On Delivery");

            if(getpaymentmethod =="khalti") {
                  $('#paymentmessage').text("Thank you for choosing Khalti For Payment!");
               }

               if(getpaymentmethod =="esewa") {
                $('#paymentmessage').text("Thank you for choosing Esewa For Payment!");
             }

             if(getpaymentmethod =="phonepay") {
                $('#paymentmessage').text("Thank you for choosing Phonepay For Payment!");
             }

});
});

$(document).ready(function(){  
   // alert("Hello Javascript"); 
   $(".getpackagediscount").click(function() {
   var getpackagediscount= $(this).val();
   var getPrice= $('#getprice').val();
      if(getpackagediscount =="Daily") {
         var price = getPrice - (getPrice*15/100);
         $('#show_price').text(price)
         $("#price").val(price)
      }else{
         $("#price").val(getPrice)
         $('#show_price').text(getPrice)

      }

   });
});







function enable(){
   if(document.getElementById('btn_button').disabled == true) {
      $("#btn_button").removeAttr('disabled');
      // document.getElementById('btn_button').enable =true;
   }else {
      $("#btn_button").attr('disabled', true);
      // console.log('disable');
   }
}


//this is done package data add to cart by cookies in ajax 
// $(document).ready(function () {
//    $('.add-to-cart-btn').click(function (e) {
//        e.preventDefault();
// alert('Hello i am ajax'); 
//        $.ajaxSetup({
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            }
//        });

//        var package_id = $(this).closest('.product_data').find('.package_id').val();
//        var package_title = $(this).closest('.product_data').find('.package_title').val();
//        var getpackagediscount = $(this).closest('.product_data').find('.getpackagediscount').val();
//        var package_getprice = $(this).closest('.product_data').find('.package_getprice').val();
//        var package_image = $(this).closest('.product_data').find('.package_image').val();
//        var package_price = $(this).closest('.product_data').find('.package_price').val();
// alert('Hello i am ajax'); 
//        $.ajax({
//            url: "/add-to-cart-ajax",
//            method: "POST",
//            data: {
//                'package_title': package_title,
//                'package_id': package_id,
//                'getpackagediscount': getpackagediscount,
//                'package_getprice': package_getprice,
//                'package_image': package_image,
//                'package_price': package_price,
//            },
//            success: function (response) {
//                alertify.set('notifier','position','top-right');
//                alertify.success(response.status);
//            },
//        });
//    });
// });








// $(document).ready(function(){  
//     function enable(){
//       document.getElementById('btn').disabled= true;
//     }
// });