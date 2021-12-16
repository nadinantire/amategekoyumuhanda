//delete cell
$('#deleteCell').on("click", function (){
    var cell = $('#village').val();
    $('#deleteCell').prop("disabled", true);
    $.ajax({
        type: 'post',
        url: SITEURL+'sector/Operations.php',
        data: {
        'action': 'DeleteVillage',
        'village': cell,
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
                msg: 'Successfully Deleted village'
            });
            setTimeout(function() { 
                location.assign(SITEURL+"cell/villages");
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
                msg: 'Can\'t delete village that has active users'
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
$('#village_edit_save').on("click", function (){

    var cell = $('#village').val();
    var name = $('#name').val();
    var email = $('#email').val(); 
    var phone1 = $('#phone1').val(); 
    var phone2 = $('#phone2').val();
    
    if(name.length < 2){
        alert("Enter Valid Village Name");
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
                   location.assign(SITEURL+"cell/villages/"+cell+"/details");
               }else{
                    console.log(data)
                }
            }
            
        })
     
    }
})
$('#village_save').on("click", function (){
    var name = $('#cell_name').val(); 
    var phone1 = $('#cell_phone1').val(); 
    var phone2 = $('#cell_phone2').val(); 
    var email = $('#cell_email').val();
    var department = $('#department').val();
    if(name.length < 2){
        alert("Enter valid Village Name");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'sector/Operations.php',
         data: {
         'action': 'createVillage',
         'name': name,
         'department':department,
         'phone1': phone1,
         'phone2': phone2,
         'email': email,
         },
         success: function (data){
             if(data.trim() === "true"){
                 location.assign(SITEURL+"cell/villages");
             }else{
                 console.log(data)
             }
         }
         
     })
    }
 });
//delete household
$('#deleteHousehold').on("click", function (){
    var household = $('#household').val();
    var village = $('#village').val();
    
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
                location.assign(SITEURL+"cell/villages/"+village+"/households");
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
                location.assign(SITEURL+"cell/villages/households/"+household);
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
//edit household
$('#household_edit_save').on("click", function (){
     
    var household = $('#household').val();
    var name = $('#names').val();
    var nid = $('#nid').val(); 
    var ubudehe = $('#ubudehe').val();
    var phone1 = $('#phone1').val(); 
    var phone2 = $('#phone2').val();  
    var village = $('#village').val();
    var villageID = $('#villageID').val();
    var cell = $('#cell').val();
    var sector = $('#sector').val();
    var district = $('#district').val();
    var province = $('#province').val();
    
    if(name.length < 2 || ubudehe.length < 1 || phone1.length < 9){
        alert("Enter Valid Household Info");
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
                if(villageID == village){
                    location.assign(SITEURL+"cell/villages/households/"+household);
                }else{
                    location.assign(SITEURL+"cell/villages");
                }
                
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
    
    if(name.length < 2 || ubudehe.length < 1){
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
                location.assign(SITEURL+"cell/villages/"+village+"/households");
            }else{
                 console.log(data)
             }
         }
         
     })
    }

});
//delete agent
$('#deleteAgent').on("click", function (){
    var agent = $('#agent').val();
    var village = $('#village').val();
    
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
                location.assign(SITEURL+"cell/villages/"+village+"/agents");
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
        url: SITEURL+'cell/Operations.php',
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
                location.assign(SITEURL+"cell/villages/agents/"+agent);
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
                url: SITEURL+'cell/Operations.php',
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
                       location.assign(SITEURL+"cell/villages/agents/"+agent);
                   }else{
                        console.log(data)
                    }
                }
                
            })
        }
     
    }
})
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
    
    if(name.length < 2 || username.length < 2 || phone1.length < 2 || password.length < 5 || password != confirm_password ){
        alert("Enter Valid Agent Info");
    }else{

     $.ajax({
         type: 'post',
         url: SITEURL+'cell/Operations.php',
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
                location.assign(SITEURL+"cell/villages/"+department+"/agents");
            }else{
                 console.log(data)
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
                url: SITEURL+'cell/Operations.php',
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
                       location.assign(SITEURL+"cell/profile");
                   }else{
                        console.log(data)
                    }
                }
                
            })
        }
     
    }
})