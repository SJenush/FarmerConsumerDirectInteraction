$(document).ready(function () {
    $('.trig_pop').click(function (e) { 
        var id = $(this).attr('id');
        $('#pop_name').html($('#name_'+id).html());
        $('#pop_des').html($('#des_'+id).html());
        $('#pop_cost').html($('#cost_'+id).html());
        $('#pop_quant').html($('#quant_'+id).html());
        $('#pop_farmer').html($('#farmer_'+id).html());
        $('#pop_img').attr('src', $('#img_'+id).attr('src'));
        $('#pop_quant').attr('quant', $('#quant_'+id).attr('val'));
        $('#pop_quant').attr('val', $('#cost_'+id).attr('val'));
        $('#pop_quant').attr('p_id', $('#name_'+id).attr('val'));
    });
    $('#in_quant').on('input', function () {
        var ptn=/^\d+(\.\d{1,2})?$/;
        var quant=$(this).val();
        var price=$('#pop_quant').attr('val');
        var tot_quant=$('#pop_quant').attr('quant');
        //console.log(tot_quant);
        if(ptn.test(quant)){
            $('#pop_msg').html("");
            if(quant>parseFloat(tot_quant)){
                $('#pop_msg').html("Entered Quantity not available!");
                $('#pop_cost').html("₹"+price);
            }else{
                $('#pop_cost').html("₹"+(price*quant));
            }
        }else{
            $('#pop_msg').html("Only two decimals allowed!");
            $('#pop_cost').html("₹"+price);
        }
    });
    $('#btn_cart').click(function (e) { 
        $.ajax({
            type: "post",
            url: "addToCart.php?prod_id="+$('#pop_quant').attr('p_id')+"&prod_quant="+$('#in_quant').val()+"&prod_price="+$('#pop_cost').html().substring(1)+"&user="+$('#pop_quant').attr('user'),
            dataType:'json',
            success: function (response) {
                console.log(response['msg']);
                if(response['status']==-1){
                    $('#pop_err').html(response['msg']);
                }else if(response['status']==1){
                    alert("Product added to cart!");
                    window.location.href = "cart.php";
                }
            },
        });
        
    });
});