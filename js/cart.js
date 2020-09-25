/* ======================================= ALL CART CRUD OPERATIONS STARTS FROM CATEGORY PAGE ===================================== */
$(document).ready(function(){
    $(".addItem").click(function(e){
         e.preventDefault();
         var $form = $(this).closest(".cart-submit");
         var pid =  $form.find(".pid").val();

         $.ajax({
            url : "action.php",
            method : "POST",
            data : {pid : pid},
            success : function(response)
            {
                $("#message").html(response);
            },
            error : function(response)
            {
                $("#message").html(response);
            }
         });
    });

    // Product price increase/decerease according to quantity

    $(".QtyItem").on("change" , function(){
        
        var el = $(this).closest("tr");
        var price = el.find(".pprice").val();
        var pid = el.find(".product_id").val();
        var qty = el.find(".QtyItem").val();
        location.reload(true);
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {qty : qty , pro_id : pid , price:price},
            success : function(response)
            {
                $("#message").html(response);
            },
            error : function(response)
            {
                $("#message").html(response);
            }
        });
    });
})

/* ======================================= ALL CART CRUD OPERATIONS ENDS FROM CATEGORY PAGE ===================================== */

/* ======================================= ALL WISHLIST CRUD OPERATIONS STARTS CATEGORY PAGE ===================================== */
$(document).ready(function(){
   // ADD ITEM TO WISHLIST
   $(".addWish").click(function(e){
      e.preventDefault();
      var w_for = $(this).closest(".cart-submit");
      var pro_id = w_for.find(".pid").val();
      
      $.ajax({
        url : "action.php",
        method : "POST",
        data : {p_id : pro_id},
        success : function(response)
        {
            $("#message").html(response);
        },
        error : function(response)
        {
            $("#message").html(response);
        }
      });
  });

  $(".AddCart").click(function(e){
     e.preventDefault();

     var $form = $(this).closest(".add_to_cart");
     var pid = $form.find(".pid").val();

     $.ajax({
         url : "action.php",
         method : "POST",
         data : {pid : pid},
         success : function(response)
         {
            $(".response").html(response);
         },
         error : function(response)
         {
            $(".response").html(response);
         }
     });
  });
})

/* ======================================= ALL WISHLIST CRUD OPERATIONS ENDS FROM CATEGORY PAGE ===================================== */


/* ======================================= ALL CART CRUD OPERATIONS STARTS FROM SUB-CATEGORY PAGE ===================================== */

$(document).ready(function(){
     $(".addCartItem").click(function(e){
        e.preventDefault();

        var data = $(this).closest(".sub-cart-submit");
        var pid = data.find(".product_id").val();

        $.ajax({
           url : "action.php",
           method : "POST",
           data : {pid : pid},
           success : function(response)
           {
              $(".result").html(response);
           },
           error : function(response)
           {
            $(".result").html(response);
           }
        })
     })

     $(".addWishItem").click(function(e){
         e.preventDefault();
         var data = $(this).closest(".sub-cart-submit");
         var p_id = data.find(".product_id").val();
         
         $.ajax({
            url : "action.php",
            method : "POST",
            data : {p_id : p_id},
            success : function(response)
            {
                $(".result").html(response);
            },
            error : function(response)
            {
                $(".result").html(response); 
            }
         });
     })
});


/* ======================================= PAY FORM VALIDATION AND PASSING DATA ===================================== */

	     /* ======================================== THIS SCRIPT IS FOR VALIDATION ================================== */
        
const ship_form = document.getElementById("ship_add");    
const add_1 = document.getElementById("state");
const add_2 = document.getElementById("city");
const add_3 = document.getElementById("address");
const add_4 = document.getElementById("pin_code");

ship_form.addEventListener('submit' , (e) =>{
     e.preventDefault();
     check();
});

const check = () =>{
     const s = state.value.trim();
     const c = city.value.trim();
     const a = address.value.trim();
     const pc = pin_code.value.trim();

     if((!a.match(/^[A-Za-z0-9, ]{4,30}$/)) || (!pc.match(/^[0-9]{6}$/)))
     {
         alert("Please input valid address or pincode");
         return false;
     }
     else
     {
        go_ahead(s, c, a ,pc);
     }
}

const go_ahead = (s , c , a , pc) =>{
    $.ajax({
        url : "action.php",
        method : "POST",
        data : {state : s , city : c , address : a , p_code : pc},
        success : function(response)
        {
            $("#response").html(response);
            $("#ship_add").trigger("reset");
        },
        error : function(response)
        {
            $("#response").html(response); 
        }
    })
}

		