$(document).ready(function() { 
    $('.loaded').css("display","inline-block");
    $('.unloaded').css("display","none");
});
//edit payment
$('#edit_payment').on("click", function(){
    //date_paid
    var date_paid = $('#date_paid2').val();
    var amount =  $('#amount2').val();
    var expected =  $('#expected').val();
    var date = new Date(date_paid);
    var household_id = $('#household').val();
    var to = $('#phone').val();
    var agent = $('#agent').val();
    var language = $('input[name="language2"]:checked').val();
    var service  = $('#service').val();
    var status = $('#status').val();
    console.log(amount);
    if(amount > 1 && household_id.length > 5 && language.length > 1 && service > 0){
        if(isValidDate(date)){
            $('#edit_payment').hide();
            $.ajax({

                type: 'post',
                url: SITEURL+'agent/Operations.php',
                data: {
                'action': 'AddPayment',
                'household': household_id,
                'date_paid': date_paid,
                'to':to,
                'status':status,
                'language':language,
                'agent': agent,
                'expected': expected,
                'service': service,
                'amount': amount,
                'type': 'edit'
                },
                
                success: function (data){
                    
                   if(data.trim() === "true"){
                       location.assign(SITEURL+"agent/households/"+household_id);
                   }else{
                        $('#edit_payment').show();
                        alert(data);
                    }
                }
                
            })
        }else{
            alert("Please Select Valid date.");
        }

    }else{
        alert("Please enter valid Informations");
    }
    
});
//save payment
$('#save_payment').on("click", function(){
    //date_paid
    var date_paid = $('#date_paid').val();
    
    var amount =  $('#amount').val();
    var expected =  $('#expected').val();
    var date = new Date(date_paid);
    var household_id = $('#household').val();
    var to = $('#phone').val();
    var agent = $('#agent').val();
    var language = $('input[name="language"]:checked').val();
    var service  = $('#service').val();
    var status = $('#status').val();
    if(amount <= expected){
        if(amount > 1 && household_id.length > 5 && language.length > 1 && service > 0){
            if(isValidDate(date)){
                $('#save_payment').hide();
                $.ajax({
                    type: 'post',
                    url: SITEURL+'agent/Operations.php',
                    data: {
                    'action': 'AddPayment',
                    'household': household_id,
                    'date_paid': date_paid,
                    'to':to,
                    'status':status,
                    'language':language,
                    'agent': agent,
                    'expected': expected,
                    'service': service,
                    'amount': amount,
                    'type': 'save'
                    },
                    
                    success: function (data){
                        
                       if(data.trim() === "true"){
                           location.assign(SITEURL+"agent/households/"+household_id);
                       }else{
                            $('#save_payment').show();
                            alert(data);
                        }
                    }
                    
                })
            }else{
                alert("Please Select Valid date.");
            }
    
        }else{
            alert("Please enter valid Informations");
        }
    }else{
        alert("Please enter Amount Below " + expected);
    }
    
});
function isValidDate(d) {
    return d instanceof Date && !isNaN(d);
}
//save new household
$('#agent_household_save').on("click", function(){
    var name = $('#names').val();
    var nid = $('#nid').val(); 
    var ubudehe = $('#ubudehe').val();
    var phone1 = $('#phone1').val(); 
    var phone2 = $('#phone2').val();  
    var village = $('#village').val();
    var cell = $('#cell').val();
    var sector = $('#sector').val();
    var district = $('#district').val();
    var province = $('#province').val();
    
    if(name.length < 2 || ubudehe.length < 1 ){
        alert("Enter Valid Household Info");
    }else{

     $.ajax({

         type: 'post',
         url: SITEURL+'agent/Operations.php',
         data: {
         'action': 'CreateHousehold',
         'name': name,
         'ubudehe': ubudehe,
         'nid': nid,
         'phone1': phone1,
         'phone2': phone2,
         'village' : village,
         'cell': cell,
         'district': district,
         'sector': sector,
         'province': province,
         },
         
         success: function (data){
            if(data.trim() === "true"){
                location.assign(SITEURL+"agent/households");
            }else{
                 console.log(data)
             }
         }
         
     })
    }

});