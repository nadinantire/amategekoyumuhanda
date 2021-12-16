//save new sector
$('#sector_save').on("click", function (){
    var name = $('#sector_name').val(); 
    var phone1 = $('#sector_phone1').val(); 
    var phone2 = $('#sector_phone2').val(); 
    var email = $('#sector_email').val();
    if(name.length < 2){
        alert("Enter valid Sector Name");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'district/Operations.php',
         data: {
         'action': 'createSector',
         'name': name,
         'phone1': phone1,
         'phone2': phone2,
         'email': email,
         },
         success: function (data){
             if(data.trim() === "true"){
                 location.assign(SITEURL+"district/sectors");
             }else{
                 console.log(data)
             }
         }
         
     })
    }
 });
 //save new province admin
 $('#sector_admin_save').on("click", function (){
     
     var name = $('#admin_name').val();
     var username = $('#admin_username').val();
     var deparment = $('#sector').val();
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
          url: SITEURL+'district/Operations.php',
          data: {
          'action': 'createSectorAdmin',
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
                  location.assign(SITEURL+"district/sectors/"+deparment+"/staffs");
              }else{
                  console.log(datum)
              }
          }
          
      })
     }
  });