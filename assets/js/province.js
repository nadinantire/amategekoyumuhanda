//save new province
$('#district_save').on("click", function (){
   var name = $('#district_name').val(); 
   var phone1 = $('#district_phone1').val(); 
   var phone2 = $('#district_phone2').val(); 
   var email = $('#district_email').val();
   var department = $('#deparment').val();
   if(name.length < 2){
       alert("Enter valid District Name");
   }else{
    $.ajax({
        type: 'post',
        url: SITEURL+'province/Operations.php',
        data: {
        'action': 'createDistrict',
        'name': name,
        'department': department,
        'phone1': phone1,
        'phone2': phone2,
        'email': email,
        },
        success: function (data){
            if(data.trim() === "true"){
                location.assign(SITEURL+"province/districts");
            }else{
                console.log(data)
            }
        }
        
    })
   }
});
//save new province admin
$('#district_admin_save').on("click", function (){
    
    var name = $('#admin_name').val();
    var username = $('#admin_username').val();
    var deparment = $('#district').val();
    var nid = $('#admin_nid').val(); 
    var phone1 = $('#admin_phone1').val(); 
    var phone2 = $('#admin_phone2').val(); 
    var email = $('#admin_email').val();
    var password = $('#admin_pass').val();
    var confirm_password = $('#admin_conf_pass').val();
    
    if(name.length < 2 || username.length < 2 || nid.length < 10 || password.length < 5 || password != confirm_password ){
        alert("Enter Valid Info");
    }else{

     $.ajax({
         type: 'post',
         url: SITEURL+'province/Operations.php',
         data: {
         'action': 'createDistrictAdmin',
         'name': name,
         'username': username,
         'nid': nid,
         'deparment': deparment,
         'phone1': phone1,
         'phone2': phone2,
         'email': email,
         'password': password,
         },
         success: function (datum){
             if(datum == 1){
                 location.assign(SITEURL+"province/districts/"+deparment+"/staffs");
             }else{
                 console.log(datum)
             }
         }
         
     })
    }
 });