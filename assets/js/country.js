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
        if( (password.length < 5 && password.length > 0) || password != confirm_password && password.length < 5){
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
                       location.assign(SITEURL+"country/profile");
                   }else if(data == "2"){
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+cell+"/staff");
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/agents/"+agent);
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
                       location.assign(SITEURL+"country/provinces/districts/sectors/cells/staff/"+admin+"/details/");
                   }else{
                        console.log(data)
                    }
                }
                
            })
        }
     
    }
})



//create cell admin
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
                 location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+deparment+"/staff/");
             }else{
                 console.log(datum)
             }
         }
         
     })
    }
 });
 //delete cell
$('#deleteVillage').on("click", function (){
    var cell = $('#cell').val();
    var sector =  $('#sector').val();
    $('#deleteVillage').prop("disabled", true);
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+sector+"/villages");
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
                $('#deleteVillage').prop("disabled", false);
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
                $('#deleteVillage').prop("disabled", false);
                console.log(data)
            }
        }
        
    })
})
//delete cell
$('#deleteCell').on("click", function (){
    var cell = $('#cell').val();
    var sector =  $('#sector').val();
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
                location.assign(SITEURL+"country/provinces/districts/sectors/"+sector+"/cells");
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
//edit village
$('#village_edit_save').on("click", function (){

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
                   location.assign(SITEURL+"country/provinces/districts/sectors/cells/village/"+cell+"/details/");
               }else{
                    console.log(data)
                }
            }
            
        })
     
    }
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
                   location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+cell+"/details");
               }else{
                    console.log(data)
                }
            }
            
        })
     
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+department+"/agents");
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+cell+"/agents");
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/agents/"+agent);
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/households/"+household);
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+cell+"/households");
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
                       location.assign(SITEURL+"country/provinces/districts/sectors/cells/agents/"+agent);
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
                    location.assign(SITEURL+"country/provinces/districts/sectors/cells/households/"+household);
                }else{
                    location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+cell+"/villages");
                }
                
            }else{
                 console.log(data)
             }
         }
         
     })
    }
})


// 
$('#level_delete').on("click", function (){
    var level_id = $('#level_id').val();
    $.ajax({
        type: 'post',
        url: SITEURL+'admin/Operations.php',
        data: {
        'action': 'deleteLevel',
        'level_id': level_id
        },
        success: function (datum){
            if(datum.trim() == "true"){
                location.assign(SITEURL+"country/ubudehe");
            }else{
                console.log(datum)
            }
        }
        
    })
});
// edit level
$('#level_edit').on("click", function (){
    var level_name = $('#level_name').val();
    var level_price = $('#level_price').val();
    var level_id = $('#level_id').val();
    if(level_price.length < 2){
        alert("Enter Valid Info");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'admin/Operations.php',
         data: {
         'action': 'editLevel',
         'level_name': level_name,
         'level_id': level_id,
         'level_price': level_price
         },
         success: function (datum){
             if(datum.trim() == "true"){
                 location.assign(SITEURL+"country/ubudehe/"+level_id+"/edit/");
             }else{
                 console.log(datum)
             }
         }
         
     })
    }
});
// save level
$('#level_save').on("click", function (){
    var level_name = $('#level_name').val();
    var level_price = $('#level_price').val();
    if(level_price.length < 2){
        alert("Enter Valid Info");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'admin/Operations.php',
         data: {
         'action': 'createLevel',
         'level_name': level_name,
         'level_price': level_price
         },
         success: function (datum){
             if(datum.trim() == "true"){
                 location.assign(SITEURL+"country/ubudehe");
             }else{
                 console.log(datum)
             }
         }
         
     })
    }
});
//save sector admin
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
    
    if(name.length < 2 || username.length < 2 || password.length < 5 || password != confirm_password ){
        alert("Enter Valid Info");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'admin/Operations.php',
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
                 location.assign(SITEURL+"country/provinces/districts/sectors/"+deparment+"/staff");
             }else{
                 console.log(datum)
             }
         }
         
     })
    }
});
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
    if(name.length < 2 || ubudehe.length < 1 || phone1.length < 9){
        alert("Enter Valid Household Info");
    }else{

     $.ajax({
         type: 'post',
         url: SITEURL+'admin/Operations.php',
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
                location.assign(SITEURL+"country/provinces/districts/sectors/cells/"+village+"/households");
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
         url: SITEURL+'admin/Operations.php',
         data: {
         'action': 'createCell',
         'name': name,
         'department': department,
         'phone1': phone1,
         'phone2': phone2,
         'email': email,
         },
         success: function (data){
             if(data.trim() === "true"){
                 location.assign(SITEURL+"country/provinces/districts/sectors/"+department+"/cells");
             }else{
                 console.log(data)
             }
         }
         
     })
    }
 });
//save new sector
$('#sector_save').on("click", function (){
    var name = $('#sector_name').val(); 
    var phone1 = $('#sector_phone1').val(); 
    var phone2 = $('#sector_phone2').val(); 
    var email = $('#sector_email').val();
    var department = $('#department').val();
    if(name.length < 2){
        alert("Enter valid Sector Name");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'admin/Operations.php',
         data: {
         'action': 'createSector',
         'name': name,
         'phone1': phone1,
         'department': department,
         'phone2': phone2,
         'email': email,
         },
         success: function (data){
             if(data.trim() === "true"){
                 location.assign(SITEURL+"country/provinces/districts/"+department+"/sectors");
             }else{
                 console.log(data)
             }
         }
         
     })
    }
 });
//save new district
$('#district_save').on("click", function (){
    var name = $('#district_name').val(); 
    var phone1 = $('#district_phone1').val(); 
    var phone2 = $('#district_phone2').val(); 
    var email = $('#district_email').val();
    var department = $('#department').val();
    if(name.length < 2){
        alert("Enter valid District Name");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'admin/Operations.php',
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
                 location.assign(SITEURL+"country/provinces/"+department+"/districts");
             }else{
                 console.log(data)
             }
         }
         
     })
    }
 });
 //save new province
$('#province_save').on("click", function (){
    var name = $('#province_name').val(); 
    var phone1 = $('#province_phone1').val(); 
    var phone2 = $('#province_phone2').val(); 
    var email = $('#province_email').val();
    var deparment = $('#deparment').val();
    if(name.length < 2){
        alert("Enter valid Province Name");
    }else{
     $.ajax({
         type: 'post',
         url: SITEURL+'admin/Operations.php',
         data: {
         'action': 'createProvince',
         'name': name,
         'deparment': deparment,
         'phone1': phone1,
         'phone2': phone2,
         'email': email,
         },
         success: function (data){
             if(data.trim() === "true"){
                 location.assign(SITEURL+"country/provinces");
             }else{
                 console.log(data)
             }
         }
         
     })
    }
 });
//save new province admin
$('#province_admin_save').on("click", function (){
    
    var name = $('#admin_name').val();
    var username = $('#admin_username').val();
    var deparment = $('#deparment').val();
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
         url: SITEURL+'admin/Operations.php',
         data: {
         'action': 'createProvinceAdmin',
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
                 location.assign(SITEURL+"country/provinces/"+deparment+"/staffs");
             }else{
                 console.log(datum)
             }
         }
         
     })
    }
 });