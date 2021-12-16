
//edit sector info
$('#sector_info_edit_save').on("click", function (){
    var service = $('#service').val();
    var leader_name = $('#leader_name').val();
    var leader_title = $('#leader_title').val();
    var deparment = $('#GUID').val();
    var account_bank = $('#account_bank').val(); 
    var account_name = $('#account_name').val();
    
    if(leader_name.length < 3 || leader_title.length < 3 || service.length < 3){
        alert("Enter Valid Info");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'sector/Operations.php',
         data: {
         'action': 'editSectorInfo',
         'service': service,
         'leader_name': leader_name,
         'leader_title': leader_title,
         'deparment': deparment,
         'account_bank': account_bank,
         'account_name': account_name
         },
         success: function (datum){
             if(datum == 1){
                location.assign(SITEURL+"sector/profile");
             }else{
                 console.log(datum)
             }
         }
         
     })
    }
 });
//edit profile
$('#profile_edit_save').on("click", function (){
    var admin = $('#admin').val();
    var name = $('#names').val();
    var nid = $('#nid').val(); 
    var phone1 = $('#phone1').val(); 
    var phone2 = $('#phone2').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    var email = $('#email').val();
    
    if(name.length < 2){
        alert("Enter Valid Profile Info");
    }else{
        if( (password.length < 5 && password.length != 0) || password != confirm_password && password.length < 5){
            alert("Short Password or Password did not match, 5 Characters Minmum");
        }else{
            $.ajax({
                type: 'post',
                url: SITEURL+'sector/Operations.php',
                data: {
                'action': 'EditProfile',
                'name': name,
                'nid': nid,
                'phone1': phone1,
                'admin': admin,
                'phone2': phone2,
                'email': email,
                'password': password
                },
                
                success: function (data){
                   if(data == 1){
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: '',
                        position: 'center top',
                        showClass: 'lightSpeedIn',
                        hideClass: 'lightSpeedOut',
                        icon: 'bx bx-check-circle',
                        width: 600,
                        msg: 'Profile has been sucessfully changed'
                    });
                       location.assign(SITEURL+"sector/profile");
                   }else if(data == 2){
                    location.assign(SITEURL+"login");
                    }else{
                        console.log(data)
                    }
                }
                
            })
        }
     
    }
})
//delete cell admin
$('#deleteAdmin').on("click", function (){
    var agent = $('#admin').val();
    var cell = $('#cell').val();
    
    $('#deleteAdmin').prop("disabled", true);
    $.ajax({
        type: 'post',
        url: SITEURL+'sector/Operations.php',
        data: {
        'action': 'DeleteAgent',
        'agent': agent,
        },
        success: function (data){
            $('#dismissed2').click();
           if(data.trim() === "true"){
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-check-circle',
                width: 600,
                msg: 'Successfully Deleted Admin'
            });
            setTimeout(function() { 
                location.assign(SITEURL+"sector/cells/"+cell+"/staff");
             }, 2000);
               
           }else{
            Lobibox.notify('danger', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-x-circle',
                width: 600,
                msg: 'Error Occurred'
            });
                $('#deleteAdmin').prop("disabled", false);
                console.log(data)
            }
        }
        
    })
})
//change cell admin status
$('#changeAdminStatus').on("click", function (){
    var agent = $('#admin').val();
    $('#changeAgentStatus').prop("disabled", true);
    $.ajax({
        type: 'post',
        url: SITEURL+'sector/Operations.php',
        data: {
        'action': 'changeAgentStatus',
        'agent': agent,
        },
        success: function (data){
            $('#dismissed').click();
           if(data.trim() === "true"){
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-check-circle',
                width: 600,
                msg: 'Successfully Changed Status'
            });
            setTimeout(function() { 
                location.assign(SITEURL+"sector/cells/agents/"+agent);
             }, 2000);
               
           }else{
            Lobibox.notify('danger', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-x-circle',
                width: 600,
                msg: 'Error Occurred'
            });
                $('#changeAgentStatus').prop("disabled", true);
                console.log(data)
            }
        }
        
    })
})
//edit cell admin
$('#admin_edit_save').on("click", function (){
    var admin = $('#admin').val();
    var name = $('#names').val();
    var nid = $('#nid').val(); 
    var username = $('#username').val();
    var phone1 = $('#phone1').val(); 
    var phone2 = $('#phone2').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    var email = $('#email').val();
    
    if(name.length < 2 || username.length < 3){
        alert("Enter Valid Admin Info");
    }else{
        if(password != confirm_password && password.length < 5){
            alert("Short Password or Password did not match");
        }else{
            $.ajax({

                type: 'post',
                url: SITEURL+'sector/Operations.php',
                data: {
                'action': 'EditAdmin',
                'name': name,
                'username': username,
                'nid': nid,
                'phone1': phone1,
                'admin': admin,
                'phone2': phone2,
                'email': email,
                'password': password
                },
                
                success: function (data){
                   if(data == 1){
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        icon: '',
                        position: 'center top',
                        showClass: 'lightSpeedIn',
                        hideClass: 'lightSpeedOut',
                        icon: 'bx bx-check-circle',
                        width: 600,
                        msg: 'Admin has been sucessfully changed'
                    });
                       location.assign(SITEURL+"sector/cells/staff/"+admin+"/details/");
                   }else{
                        console.log(data)
                    }
                }
                
            })
        }
     
    }
})

//delete cell
$('#deleteCell').on("click", function (){
    var cell = $('#cell').val();
    
    $('#deleteCell').prop("disabled", true);
    $.ajax({
        type: 'post',
        url: SITEURL+'sector/Operations.php',
        data: {
        'action': 'DeleteCell',
        'cell': cell,
        },
        success: function (data){
            $('#dismissed2').click();
           if(data.trim() === "true"){
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-check-circle',
                width: 600,
                msg: 'Successfully Deleted Cell'
            });
            setTimeout(function() { 
                location.assign(SITEURL+"sector/cells");
             }, 2000);
               
           }else if(data.trim() === "data"){
            Lobibox.notify('warning', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-x-circle',
                width: 600,
                msg: 'Can\'t delete cell that has active users'
            });
                $('#deleteCell').prop("disabled", false);
                console.log(data)
            }else{
            Lobibox.notify('danger', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-x-circle',
                width: 600,
                msg: 'Error Occurred'
            });
                $('#deleteCell').prop("disabled", false);
                console.log(data)
            }
        }
        
    })
})
//edit cell
$('#cell_edit_save').on("click", function (){

    var cell = $('#cell').val();
    var name = $('#name').val();
    var email = $('#email').val(); 
    var phone1 = $('#phone1').val(); 
    var phone2 = $('#phone2').val();
    
    if(name.length < 2){
        alert("Enter Valid Cell Name");
    }else{
        $.ajax({

            type: 'post',
            url: SITEURL+'sector/Operations.php',
            data: {
            'action': 'EditCell',
            'name': name,
            'phone1': phone1,
            'cell': cell,
            'phone2': phone2,
            'email': email
            },
            
            success: function (data){
               if(data == 1){
                   location.assign(SITEURL+"sector/cells/"+cell+"/details");
               }else{
                    console.log(data)
                }
            }
            
        })
     
    }
})
//delete agent
$('#deleteAgent').on("click", function (){
    var agent = $('#agent').val();
    var cell = $('#cell').val();
    
    $('#deleteAgent').prop("disabled", true);
    $.ajax({
        type: 'post',
        url: SITEURL+'sector/Operations.php',
        data: {
        'action': 'DeleteAgent',
        'agent': agent,
        },
        success: function (data){
            $('#dismissed2').click();
           if(data.trim() === "true"){
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-check-circle',
                width: 600,
                msg: 'Successfully Deleted Agent'
            });
            setTimeout(function() { 
                location.assign(SITEURL+"sector/cells/"+cell+"/agents");
             }, 2000);
               
           }else{
            Lobibox.notify('danger', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-x-circle',
                width: 600,
                msg: 'Error Occurred'
            });
                $('#deleteAgent').prop("disabled", false);
                console.log(data)
            }
        }
        
    })
})
//change Agent status
$('#changeAgentStatus').on("click", function (){
    var agent = $('#agent').val();
    $('#changeAgentStatus').prop("disabled", true);
    $.ajax({
        type: 'post',
        url: SITEURL+'sector/Operations.php',
        data: {
        'action': 'changeAgentStatus',
        'agent': agent,
        },
        success: function (data){
            $('#dismissed').click();
           if(data.trim() === "true"){
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-check-circle',
                width: 600,
                msg: 'Successfully Changed Status'
            });
            setTimeout(function() { 
                location.assign(SITEURL+"sector/cells/agents/"+agent);
             }, 2000);
               
           }else{
            Lobibox.notify('danger', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-x-circle',
                width: 600,
                msg: 'Error Occurred'
            });
                $('#changeAgentStatus').prop("disabled", true);
                console.log(data)
            }
        }
        
    })
})
//change household status
$('#changeStatus').on("click", function (){
    var household = $('#household').val();
    $('#changeStatus').prop("disabled", true);
    $.ajax({
        type: 'post',
        url: SITEURL+'sector/Operations.php',
        data: {
        'action': 'changeHouseholdStatus',
        'household': household,
        },
        success: function (data){
            $('#dismissed').click();
           if(data.trim() === "true"){
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-check-circle',
                width: 600,
                msg: 'Successfully Changed Status'
            });
            setTimeout(function() { 
                location.assign(SITEURL+"sector/cells/households/"+household);
             }, 2000);
               
           }else{
            Lobibox.notify('danger', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-x-circle',
                width: 600,
                msg: 'Error Occurred'
            });
                $('#changeStatus').prop("disabled", true);
                console.log(data)
            }
        }
        
    })
})
//delete household
$('#deleteHousehold').on("click", function (){
    var household = $('#household').val();
    var cell = $('#cell').val();
    
    $('#deleteHousehold').prop("disabled", true);
    $.ajax({
        type: 'post',
        url: SITEURL+'sector/Operations.php',
        data: {
        'action': 'deleteHousehold',
        'household': household,
        },
        success: function (data){
            $('#dismissed2').click();
           if(data.trim() === "true"){
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-check-circle',
                width: 600,
                msg: 'Successfully Deleted User'
            });
            setTimeout(function() { 
                location.assign(SITEURL+"sector/cells/"+cell+"/households");
             }, 2000);
               
           }else{
            Lobibox.notify('danger', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                icon: '',
                position: 'center top',
                showClass: 'lightSpeedIn',
                hideClass: 'lightSpeedOut',
                icon: 'bx bx-x-circle',
                width: 600,
                msg: 'Error Occurred'
            });
                $('#deleteHousehold').prop("disabled", false);
                console.log(data)
            }
        }
        
    })
})
//edit agent

$('#agent_edit_save').on("click", function (){
    var agent = $('#agent').val();
    var name = $('#names').val();
    var nid = $('#nid').val(); 
    var username = $('#username').val();
    var phone1 = $('#phone1').val(); 
    var phone2 = $('#phone2').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    var email = $('#email').val();
    
    if(name.length < 2 || username.length < 3){
        alert("Enter Valid Agent Info");
    }else{
        if(password != confirm_password && password.length < 5){
            alert("Short Password or Password did not match");
        }else{
            $.ajax({

                type: 'post',
                url: SITEURL+'sector/Operations.php',
                data: {
                'action': 'EditAgent',
                'name': name,
                'username': username,
                'nid': nid,
                'phone1': phone1,
                'agent': agent,
                'phone2': phone2,
                'email': email,
                'password': password
                },
                
                success: function (data){
                   if(data == 1){
                       location.assign(SITEURL+"sector/cells/agents/"+agent);
                   }else{
                        console.log(data)
                    }
                }
                
            })
        }
     
    }
})
//edit household
$('#household_edit_save').on("click", function (){
    var household = $('#household').val();
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
    
    if(name.length < 2 || ubudehe.length < 1 || village.length < 3 || phone1.length < 9){
        alert("Enter Valid Agent Info");
    }else{

     $.ajax({

         type: 'post',
         url: SITEURL+'sector/Operations.php',
         data: {
         'action': 'EditHousehold',
         'name': name,
         'ubudehe': ubudehe,
         'nid': nid,
         'phone1': phone1,
         'household': household,
         'phone2': phone2,
         'village' : village
         },
         
         success: function (data){
            if(data.trim() === "true"){
                location.assign(SITEURL+"sector/cells/households/"+household);
            }else{
                 console.log(data)
             }
         }
         
     })
    }
})

//save new household
$('#household_save').on("click", function(){
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
    
    if(name.length < 2 || ubudehe.length < 1 || village.length < 3){
        alert("Enter Valid Agent Info");
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
                location.assign(SITEURL+"sector/cells/"+cell+"/households");
            }else{
                 console.log(data)
             }
         }
         
     })
    }

});
//save new cell agent
$('#cell_agent_save').on("click", function (){
     
    var name = $('#admin_name').val();
    var username = $('#admin_username').val();
    var department = $('#department').val();
    var nid = $('#admin_nid').val(); 
    var phone1 = $('#admin_phone1').val(); 
    var phone2 = $('#admin_phone2').val(); 
    var email = $('#admin_email').val();
    var password = $('#admin_pass').val();
    var confirm_password = $('#admin_conf_pass').val();
    
    if(name.length < 2 || username.length < 2 || password.length < 5 || password != confirm_password ){
        alert("Enter Valid Agent Info");
    }else{

     $.ajax({
         type: 'post',
         url: SITEURL+'sector/Operations.php',
         data: {
         'action': 'createCellAgent',
         'name': name,
         'username': username,
         'nid': nid,
         'department': department,
         'phone1': phone1,
         'phone2': phone2,
         'email': email,
         'password': password,
         },
         success: function (data){
            if(data.trim() === "true"){
                location.assign(SITEURL+"sector/cells/"+department+"/agents");
            }else{
                 console.log(data)
             }
         }
         
     })
    }
 });
//save new cell
$('#cell_save').on("click", function (){
    var name = $('#cell_name').val(); 
    var phone1 = $('#cell_phone1').val(); 
    var phone2 = $('#cell_phone2').val(); 
    var email = $('#cell_email').val();
    var department = $('#department').val();
    if(name.length < 2){
        alert("Enter valid Cell Name");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'sector/Operations.php',
         data: {
         'action': 'createCell',
         'name': name,
         'department':department,
         'phone1': phone1,
         'phone2': phone2,
         'email': email,
         },
         success: function (data){
             if(data.trim() === "true"){
                 location.assign(SITEURL+"sector/cells");
             }else{
                 console.log(data)
             }
         }
         
     })
    }
 });
 //save new cell admin
 $('#cell_admin_save').on("click", function (){
     
     var name = $('#admin_name').val();
     var username = $('#admin_username').val();
     var deparment = $('#department').val();
     var nid = $('#admin_nid').val(); 
     var phone1 = $('#admin_phone1').val(); 
     var phone2 = $('#admin_phone2').val(); 
     var email = $('#admin_email').val();
     var password = $('#admin_pass').val();
     var confirm_password = $('#admin_conf_pass').val();
     
     if(name.length < 2 || username.length < 2 || password.length < 5 || password != confirm_password ){
         alert("Enter Valid Info");
     }else{
 
      $.ajax({
          type: 'post',
          url: SITEURL+'sector/Operations.php',
          data: {
          'action': 'createCellAdmin',
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
                  location.assign(SITEURL+"sector/cells/"+deparment+"/staff");
              }else{
                  console.log(datum)
              }
          }
          
      })
     }
  });