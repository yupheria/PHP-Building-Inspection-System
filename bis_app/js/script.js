    /* 	Author: Caleb Tutty
	Company: Capital Planning
*/


// remap jQuery to $

(function($){

 $(document).ready(function(){
        if($('#hoptions').change(function() {
            if($(this).val()==1){
                window.location = baseurl+"index.php/usermanagement"
            }
            if($(this).val()==2){
                window.location = baseurl+"index.php/usermanagement/edit/" + $('#headerid').val() + "/" + $('#headeraccess').val()
            }
            if($(this).val()==3){
                window.location = baseurl+"index.php/login/logout"
            }
            if($(this).val()==4){
                window.location = baseurl+"index.php/usermanagement/alot_buildings"
            }
            if($(this).val()==5){
                window.location = baseurl+"index.php/usermanagement/account_profile"
            }
            if($(this).val()==6){
                window.location = baseurl+"index.php/usermanagement/activity_log"
            }
            if($(this).val()==7){
                window.location = baseurl+"index.php/usermanagement/alloted_buildings"
            }
        }))
	if($('body').hasClass('login_page')) {	
	 	$("#username").focus();
	 	// Login page scripts
	 	
	 	$("#loginform").keyup(function(event){
	 		// Make the enter key do the same as
	 		// clicking the button
	 	  if(event.keyCode == 13){
	 	    $("#btnLogin").click();
	 	  }
	 	});
	 	
	 	$("#btnLogin").click(function(){	
	 		/*
	 		 * The login button has been clicked.
	 		 * Send an AJAX POST request to the validation routine
	 		 * page, which will work out the authentication for us.
	 		 * We will receive a boolean value in the response.
	 		 */	
	 		if ($("#email").val() != "" && $("#password").val() != "")
	 		{
		 		$.ajax({
		 		  url: baseurl + "index.php/login/validate_credentials",
		 		  type: "POST",
		 		  cache: false,
		 		  data: "email=" + $("#email").val() + "&password=" + $("#password").val(),
		 		  success: function(status){
		 			if(status == '0' || status == '1' || status == '2' || status == '3') {
		 				 /*
		 				  * The authentication was a resounding success! Good times.
		 				  * Set the Class attribute for the message element
		 				  * and set the html value with the SUCCESS message.
		 				 */			 
		 				 
							if(status == '0') {
                                                           
							/**$("#login_message")
								.attr('class', 'ui-state-highlight')
								.html('<strong>Login</strong>: Login verified. Logging you in now.<br />'); **/	
								window.location = baseurl+"index.php/dashboard/admin"
							} else if(status == '1'){
							/**$("#login_message")
								.attr('class', 'ui-state-highlight')
								.html('<strong>Login</strong>: Login verified. Logging you in now.<br />'); **/		
								window.location = baseurl+"index.php/dashboard/user"	
							} else if(status == '2') {
                                                        /**$("#login_message")
								.attr('class', 'ui-state-highlight')
								.html('<strong>Login</strong>: Login verified. Logging you in now.<br />'); **/		
								window.location = baseurl+"index.php/dashboard/bm"    
                                                        } else {
                                                        /**$("#login_message")
								.attr('class', 'ui-state-highlight')
								.html('<strong>Login</strong>: Login verified. Logging you in now.<br />'); **/		
								window.location = baseurl+"index.php/dashboard/guest"    
                                                        }	 			
		 			} else {
		 				if(status=='false') {
		 				$("#login_form").effect("shake", {times:2}, 100);
		 				/*
		 				 * Set the Class attribute for the message element
		 				 * and set the html value with the ERROR message.
		 				*/
		 				$("#login_message")
		 					.attr('class', 'ui-state-error')
		 					.html('<strong>ERROR</strong>: Your details were incorrect.<br />');
                                                } else {
                                                    showError(status);
                                                }
		 			}
		 		  }
		 		});
	 		}
	 		else {
	 			if($("#email").val() == "" && $("#password").val() == "")
	 			{
	 				$("#login_form").effect("shake", {times:2}, 100);
	 				/*
	 				 * Set the Class attribute for the message element
	 				 * and set the html value with the ERROR message.
	 				*/
	 				$("#login_message")
	 					.attr('class', 'ui-state-error')
	 					.html('<strong>ERROR</strong>: Please enter your email and password.<br />');
	 			}
	 			else if ($("#email").val() == "")
	 			{
	 				$("#login_form").effect("shake", {times:1}, 100);
	 				
	 				$("#login_message")
	 					.attr('class', 'ui-state-error')
	 					.html('<strong>ERROR</strong>: Please enter your email address.<br />');
	 			}
	 			else {
	 				$("#login_form").effect("shake", {times:1}, 100);
	 				
		 			$("#login_message")
		 				.attr('class', 'ui-state-error')
		 				.html('<strong>ERROR</strong>: Please enter your password.<br />');
	 			}
                                
	 		}
	 	})	
	 	 	$("#regbis").click(function(){
                            $('#regbis').val('Processing...');
                            $('#regbis').attr("disabled", true);
                            if ($("#client_name").val() != "" && $("#email").val() != "" && $("#company").val() != "" && $("#phone_number").val() != "" && $("#user_password").val() != "" && $("#user_password1").val() != "" && $("#username").val() != "") {
                                var isChecked = $('#license').attr('checked')?"1":"0";
                                $.ajax({
		 		  url: baseurl + "index.php/login/register",
		 		  type: "POST",
		 		  cache: false,
		 		  data: "client_name=" + $("#client_name").val() + "&email=" + $("#email").val()+ "&company=" + $("#company").val() + "&phone_number=" + $("#phone_number").val() + "&user_password=" + $("#user_password").val() + "&user_password1=" + $("#user_password1").val()  + "&username=" + $("#username").val() + "&license=" + isChecked,
		 		  success: function(status){
                                          
                                          if(status == "Registration Successfull") {
                                          showSuccess(status);
                                          setTimeout(function(){window.location = baseurl+"index.php";}, 1000); 
                                          } else {
                                          showError(status);
                                          $('#regbis').attr("disabled", false);
                                          $('#regbis').val('Register');
                                          }
                                  }
                                });
                            } else {
                                $("#login_form").effect("shake", {times:2}, 100);
                                $("#login_message")
	 					.attr('class', 'ui-state-error')
	 					.html('<strong>ERROR</strong>: Please comple the Registration.<br />');
                                $('#regbis').attr("disabled", false);   
                                $('#regbis').val('Register');
                            }
                        });
                        $("#regtarget").click(function(){
                            $('#regtarget').val('Processing');
                            $('#regtarget').attr("disabled", true);
                             if ($("#client_name").val() != "" && $("#email").val() != "" && $("#company").val() != "" && $("#phone_number").val() != "" && $("#user_password").val() != "" && $("#user_password1").val() != "" && $("#username").val() != "") {
                                var isChecked = $('#license').attr('checked')?"1":"0";
                                $.ajax({
		 		  url: baseurl + "index.php/login/register_target",
		 		  type: "POST",
		 		  cache: false,
		 		  data: "client_name=" + $("#client_name").val() + "&email=" + $("#email").val()+ "&company=" + $("#company").val() + "&phone_number=" + $("#phone_number").val() + "&user_password=" + $("#user_password").val() + "&user_password1=" + $("#user_password1").val()  + "&username=" + $("#username").val() + "&license=" + isChecked,
		 		  success: function(status){
                                          
                                          if(status == "Registration Successfull") {
                                          showSuccess(status);
                                          setTimeout(function(){window.location = "http://capitalplanning.co.nz/wp-admin";}, 1000); 
                                          } else {
                                          showError(status);
                                          $('#regtarget').attr("disabled", false);
                                          $('#regtarget').val('Register');
                                          }
                                  }
                                });
                            } else {
                                $("#login_form").effect("shake", {times:2}, 100);
                                $("#login_message")
	 					.attr('class', 'ui-state-error')
	 					.html('<strong>ERROR</strong>: Please comple the Registration.<br />');
                                $('#regtarget').attr("disabled", false);
                                $('#regtarget').val('Register');
                            }
                        });
                        $("#regtargetbuss").click(function(){
                            $('#regtargetbuss').val('Processing');
                            $('#regtargetbuss').attr("disabled", true);
                             if ($("#client_name").val() != "" && $("#email").val() != "" && $("#company").val() != "" && $("#phone_number").val() != "" && $("#user_password").val() != "" && $("#user_password1").val() != "" && $("#username").val() != "") {
                                var isChecked = $('#license').attr('checked')?"1":"0";
                                $.ajax({
		 		  url: baseurl + "index.php/login/register_target_buss",
		 		  type: "POST",
		 		  cache: false,
		 		  data: "client_name=" + $("#client_name").val() + "&email=" + $("#email").val()+ "&company=" + $("#company").val() + "&phone_number=" + $("#phone_number").val() + "&user_password=" + $("#user_password").val() + "&user_password1=" + $("#user_password1").val()  + "&username=" + $("#username").val() + "&license=" + isChecked,
		 		  success: function(status){
                                          
                                          if(status == "Registration Successfull") {
                                          showSuccess(status);
                                          setTimeout(function(){window.location = "http://capitalplanning.co.nz/wp-admin";}, 1000); 
                                          } else {
                                          showError(status);
                                          $('#regtargetbuss').attr("disabled", false);
                                          $('#regtargetbuss').val('Register');
                                          }
                                  }
                                });
                            } else {
                                $("#login_form").effect("shake", {times:2}, 100);
                                $("#login_message")
	 					.attr('class', 'ui-state-error')
	 					.html('<strong>ERROR</strong>: Please comple the Registration.<br />');
                                $('#regtargetbuss').attr("disabled", false);
                                $('#regtargetbuss').val('Register');
                            }
                        });
	 	 	 	
	 	 	 	$("#email_for_reset").keyup(function(event){
	 	 	 		// Make the enter key do the same as
	 	 	 		// clicking the button
	 	 	 	  if(event.keyCode == 13){
	 	 	 	    $("#btnRetrievePassword").click();
	 	 	 	  }
	 	 	 	});
                     $("#bisadmin").click(function(){
                           $.ajax({
		 		  url: baseurl + "index.php/login/check_admin",
		 		  type: "POST",
		 		  cache: false,
		 		  data: "username=" + $("#username").val() + "&password=" + $("#password").val(),
		 		  success: function(status){
                                          
                                          if(status == "Go") {
                                          window.location = baseurl + "index.php/login/bis_users";
                                          } else {
                                          //showError("Login Failed");
                                          showError(status);
                                          }
                                  }
                                });     
                     });
	}
	
	// Notify Bar messages
    function showCustomMessage(msg)
    {
        $.notifyBar({
        html: msg,
        delay: 3500,
        animationSpeed: "fast"
      });  
    }
        
    function showSuccess(msg)
    {
        $.notifyBar({
        html: msg,
        cls: "success",
        delay: 2000,
        animationSpeed: "normal"
      });  
    }

    function showError(msg)
    {
        $.notifyBar({
        html: msg,
        cls: "error",
        delay: 2000,
        animationSpeed: "normal"
      });  
    }	
 	if($('body').hasClass('dashboard'))
 	{
	 	$(".content table input:checkbox").click(function() {
	 		var numberOfCheckedCheckboxes = $(".content table input:checked");
	 		if(numberOfCheckedCheckboxes.length > 0)
	 		{
	 			$("#editButton").removeClass("buttonBlack-disabled");
	 			$("#deleteButton").removeClass("buttonBlack-disabled");
	 			$("#editButton").addClass("buttonBlack");
	  			$("#deleteButton").addClass("buttonBlack");
	 			
	 		}
	 		else if(numberOfCheckedCheckboxes.length == 0)
	 		{
		 		$("#editButton").addClass("buttonBlack-disabled");
		 		$("#deleteButton").addClass("buttonBlack-disabled");
		 		$("#editButton").removeClass("buttonBlack");
	 			$("#deleteButton").removeClass("buttonBlack");
	 		}
 		
	 	});
	 	
	 	$("#prevmonth").livequery('click', function(e){
	 		 		
	 		e.preventDefault();
	 		
	 		$.ajax({
	 		
	 		url: 	baseurl + "dashboard/ajaxcalendar",
	 		type: 	"POST",
	 		cache: 	false,
	 		data: 	"month=" + $("#prevmonth").customdata('month') +
	 				"&year=" + $("#prevmonth").customdata('year'),
	 		success: function(result){
	 		
	 			$("#calendar_container").html(result);
	 		}//end success: function(result){
	 		
	 		})//end $.ajax({..
	 	
	 	})//end .click(function() {...
	 	
	 	$("#thismonth").livequery('click', function(e){
	 		 		
	 		e.preventDefault();
	 		
	 		$.ajax({
	 		
	 		url: 	baseurl + "dashboard/ajaxcalendar",
	 		type: 	"POST",
	 		cache: 	false,
	 		data: 	"month=" + $("#thismonth").customdata('month') +
	 				"&year=" + $("#thismonth").customdata('year'),
	 		success: function(result){
	 		
	 			$("#calendar_container").html(result);
	 		}//end success: function(result){
	 		
	 		})//end $.ajax({..
	 	
	 	})//end .click(function() {...
	 	
	 	$("#nextmonth").livequery('click', function(e){
	 	
	 		e.preventDefault();
	 		
	 		$.ajax({
	 		
	 		url: 	baseurl + "dashboard/ajaxcalendar",
	 		type: 	"POST",
	 		cache: 	false,
	 		data: 	"month=" + $("#nextmonth").customdata('month') +
	 				"&year=" + $("#nextmonth").customdata('year'),
	 		success: function(result){
	 		
	 			$("#calendar_container").html(result);
	 		}//end success: function(result){
	 		
	 		})//end $.ajax({..
	 	
	 	})//end .click(function() {...
 	} // endif
 	if($('body').hasClass('usermanagement') && $('form').hasClass('delete_user_page')) {
            $("#applyButton").click(function(e){
                e.preventDefault();
                $.ajax({
			  url: baseurl + "index.php/usermanagement/delete_user",
			  type: "POST",
			  cache: false,
			  data: "userid=" + $("#userid").val(),                     
			  success: function(result){
			  	if (result == "User Deleted")
			  	{
                                        showSuccess(result);
                                        setTimeout(function(){goToUsermanagement();}, 2000);                                                                            
				}		
			  }
			});
            });           
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_clients')) {
            $('#bm_clients').change(function (e) {
               e.preventDefault();
               window.location = baseurl + "index.php/buildingmanagement/index/"+$('#bm_clients').val();
            });
        }
        
        if($('body').hasClass('clientmanagement') && $('form').hasClass('cm_company')) {
            $('#cmcompany').change(function (e) {
               e.preventDefault();
               window.location = baseurl + "index.php/clientmanagement/index/"+$('#cmcompany').val();
            });
        }
        if($('body').hasClass('clientmanagement') && $('form').hasClass('cm_cmcontact')) {
            $('#cmcontact').change(function (e) {
               e.preventDefault();
               window.location = baseurl + "index.php/clientmanagement/view_contact/"+$('#cmcompany').val()+"/"+$('#cmcontact').val();
            });
        }
        if($('body').hasClass('clientmanagement') && $('form').hasClass('delete_client_page')) {
            $("#applyButton").click(function(e){              
                e.preventDefault();
                $.ajax({
			  url: baseurl + "index.php/clientmanagement/delete_client",
			  type: "POST",
			  cache: false,
			  data: "clientid=" + $("#clientid").val(),                     
			  success: function(result){
			  	if (result == "Contact Deleted")
			  	{
                                        showSuccess(result);
                                        setTimeout(function(){goToClientmanagement();}, 2000);                                                                            
				}		
			  }
			});
            });           
        }
        if($('body').hasClass('clientmanagement') && $('form').hasClass('delete_group_page')) {
            $("#applyButton").click(function(e){              
                e.preventDefault();
                $.ajax({
			  url: baseurl + "index.php/clientmanagement/delete_group",
			  type: "POST",
			  cache: false,
			  data: "groupid=" + $("#groupid").val(),                     
			  success: function(result){
			  	if (result == "Client Deleted")
			  	{
                                        showSuccess(result);
                                        setTimeout(function(){goToClientmanagement();}, 2000);                                                                            
				}		
			  }
			});
            });           
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('delete_site_page')) {
            $("#applyButton").click(function(e){              
                e.preventDefault();
                $.ajax({
			  url: baseurl + "index.php/buildingmanagement/delete_site",
			  type: "POST",
			  cache: false,
			  data: "siteid=" + $("#siteid").val(),                     
			  success: function(result){
			  	if (result == "Site Deleted")
			  	{
                                        showSuccess(result);
                                        setTimeout(function(){goToBuildingmanagement();}, 2000);                                                                            
				}		
			  }
			});
            });           
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('add_areas_page'))
 	{
			
            $("#saveButton").click(function(e){ 
                 e.preventDefault();
                if ($("#area_name").val() != "" && $("#description").val() != "" && $("#room_number").val() != "") {
                
                $.ajax({
			  url: baseurl + "index.php/buildingmanagement/add_areas",
			  type: "POST",
			  cache: false,
			  data: "buildingid=" + $("#building").val() +
                                "&area_name=" + $("#area_name").val() +
                                "&description=" + $("#description").val() +
                                "&room_number=" + $("#room_number").val() +
                                "&area_level=" + $("#level").val() +
                                "&above=" + $("#above").val(), 
			  success: function(result){
			  	if (result > 0)
			  	{
                                        showSuccess("Area Added");
                                        setTimeout(function(){goToBuildingmanagementarea($("#client").val(),$("#site").val(),$("#building").val(),$("#above1").val(),$("#level").val(),result);}, 2000);                                                                            
				} else {
                                        showError(result);
                                }		
			  }
			});
             
            } else {
               var errors = "";
			if($("#area_name").val() == "") {
				errors += "Area name is blank<br />";
			}
			if($("#description").val() == "") {
				errors += "Description is blank<br />";
			}
                        if($("#room_number").val() == "") {
				errors += "Room number is blank<br />";
			}
                        showError(errors);
            }
            });  
 	}
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('edit_areas_page'))
 	{
			
            $("#saveButton").click(function(e){ 
                 e.preventDefault();
                if ($("#area_name").val() != "" && $("#description").val() != "" && $("#room_number").val() != "") {
               
                $.ajax({
			  url: baseurl + "index.php/buildingmanagement/edit_areas",
			  type: "POST",
			  cache: false,
			  data: "buildingid=" + $("#buildingid").val() +
                                "&area_name=" + $("#area_name").val() +
                                "&description=" + $("#description").val() +
                                "&room_number=" + $("#room_number").val() +
                                "&area_level=" + $("#area_level").val() +
                                "&above=" + $("#above").val() +
                                "&areaid=" + $("#areaid").val(),
			  success: function(result){
			  	if (result == "Area Updated")
			  	{
                                        showSuccess(result);
                                        setTimeout(function(){goToBuildingmanagementarea($("#client").val(),$("#site").val(),$("#buildingid").val(),$("#above1").val(),$("#level").val(),$("#areaid").val());}, 2000);                                                                           
				} else {
                                        showError(result);
                                }		
			  }
			});
             
            } else {
               var errors = "";
			if($("#area_name").val() == "") {
				errors += "Area name is blank<br />";
			}
			if($("#description").val() == "") {
				errors += "Description is blank<br />";
			}
                        if($("#room_number").val() == "") {
				errors += "Room number is blank<br />";
			}
                        showError(errors);
            }
            });  
 	}
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('delete_building_page')) {
            $("#applyButton").click(function(e){              
                e.preventDefault();
                $.ajax({
			  url: baseurl + "index.php/buildingmanagement/delete_building",
			  type: "POST",
			  cache: false,
			  data: "buildingid=" + $("#buildingid").val(),                     
			  success: function(result){
			  	if (result == "Building Deleted")
			  	{
                                        showSuccess(result);
                                        setTimeout(function(){goToBuildingmanagementsite($('#client').val(),$('#site').val());}, 2000);                                                                            
				}		
			  }
			});
            });           
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('delete_area_page')) {
            $("#saveButton").click(function(e){              
                e.preventDefault();
                $.ajax({
			  url: baseurl + "index.php/buildingmanagement/delete_area",
			  type: "POST",
			  cache: false,
			  data: "areaid=" + $("#areaid").val(),                     
			  success: function(result){
			  	if (result == "Area Deleted")
			  	{
                                        showSuccess(result);
                                        setTimeout(function(){
                                            window.location = baseurl+"index.php/buildingmanagement/index/"+$("#client").val()+"/"+$("#site").val()+"/"+$("#building").val()+"/g/0/";
                                        }, 2000);                                                                            
				}		
			  }
			});
            });           
        }
        function goToUsermanagement() {window.location = baseurl+"index.php/usermanagement"}
        function goToClientmanagement() {window.location = baseurl+"index.php/clientmanagement"}
        function goToClientmanagementclient(group,specific) {
            window.location = baseurl+"index.php/clientmanagement/view_contact/"+group+"/"+specific;
            //showCustomMessage(baseurl+"index.php/clientmanagement/"+group+"/"+specific);
        }
        function goToClientmanagementgroup(group) {
            window.location = baseurl+"index.php/clientmanagement/view_client/"+group;
        }
        function goToBuildingmanagement() {window.location = baseurl+"index.php/buildingmanagement"}
        function goToBwofManagement() {window.location = baseurl+"index.php/bwof"}
        function goToBuildingmanagementarea(client,site,build,above,level,area) {window.location = baseurl+"index.php/buildingmanagement/view_area_page/"+client+"/"+site+"/"+build+"/"+above+"/"+level+"/"+area;}
        function goToBuildingmanagementsite(client,site) {
            window.location = baseurl+"index.php/buildingmanagement/view_site/"+client+"/"+site;
        }
        function goToBuildingmanagementbuild(client,site,build) {
            window.location = baseurl+"index.php/buildingmanagement/view_building/"+client+"/"+site+"/"+build;
        }
        function goToIndex() {window.location = baseurl}
        function goToBuildinginspection1(company,site,building,above,level,area) {
            window.location = baseurl+"index.php/buildinginspection/index/"+company+"/"+site+"/"+building+"/"+above+"/"+level+"/"+area;
        }
        function goToBuildinginspection(company,site,building,above,level,area,hid) {
            window.location = baseurl+"index.php/buildinginspection/view_hazard/"+company+"/"+site+"/"+building+"/"+above+"/"+level+"/"+area+"/"+hid;
        }
        function goToBuildinginspectionEditHazard(company,site,building,above,level,area,hid) {
            window.location = baseurl+"index.php/buildinginspection/view_hazard/"+company+"/"+site+"/"+building+"/"+above+"/"+level+"/"+area+"/"+hid;
        }
        function goToDashboard(uid) {
            if(uid == 0) {
                window.location = baseurl+"index.php/dashboard/admin";
            } else {
                window.location = baseurl+"index.php/dashboard/user";
            }
        }
        if($('body').hasClass('usermanagement')) {
            $("#save_allotment").click(function(e){
                e.preventDefault();
                $.ajax({
			  url: baseurl + "index.php/usermanagement/edit_allotment",
			  type: "POST",
			  cache: false,
			  data: "building_id=" + $("#building_id").val() + "&user_id=" + $("#user_id").val(),
			  success: function(result){
			  	if(result == 'Building Updated'){
                                    showSuccess(result);
                                    setTimeout(function(){window.location = baseurl+"index.php/usermanagement/alot_buildings";}, 2000);
                                } else {
                                    showError(result);
                                }
			  }
			});
            });
        }
 	if($('body').hasClass('usermanagement') && $('form').hasClass('add_user'))
 	{
 		$("#applyButton").click(function(e){	
 			e.preventDefault();
 			/*
 			 * The login button has been clicked.
 			 * Send an AJAX POST request to the validation routine
 			 * page, which will work out the authentication for us.
 			 * We will receive a boolean value in the response.
 			 */
                        
			 if ($("#first_name").val() != "" && $("#password").val() != "" && $("#password2").val() != "" && $("#email_address").val() != "") 
			 {
                        $.ajax({
			  url: baseurl + "index.php/usermanagement/add_user",
			  type: "POST",
			  cache: false,
			  data: "first_name=" + $("#first_name").val() + "&password=" + $("#password").val() + "&password2=" + $("#password2").val() + "&email_address=" + $("#email_address").val() + "&user_type=" + $("#user_type").val() + "&bms=" + $("#bms").val(),
			  success: function(result){
                                //showCustomMessage('Creating User...Please Wait...');
			  	if (result == "Successfully created user")
			  	{
					showSuccess(result);
                                        setTimeout(function(){goToUsermanagement();}, 2000);
				}
				else
				{
					showError(result);
				}
			  }
			});
			} else {
			var errors = "";
			if($("#first_name").val() == "") {
				errors += "Username is blank<br />";
			}
			if($("#email_address").val() == "") {
				errors += "Email Address is blank<br />";
			}
			if($("#password").val() == "") {
				errors += "Password is blank<br />";
			}
			if($("#password2").val() == "") {
				errors += "Verify Password is blank<br />";
			}
			if($("#password").val() != $("#password2").val()) {
				errors += "Password does not match<br />";
			}
				showError(errors);
			}
			
		});
                $('#user_type').change(function(e) {
                    e.preventDefault();
                    switch($("#user_type").val()) {
                        case '1' :window.location = baseurl+"index.php/usermanagement/add/1";break;
                        case '2' :window.location = baseurl+"index.php/usermanagement/add/2";break;
                        case '0' :window.location = baseurl+"index.php/usermanagement/add/0";break;
                        default:window.location = baseurl+"index.php/usermanagement/add/3";break;
                    }
                });
 	}
	
	if($('body').hasClass('clientmanagement') && $('form').hasClass('add_group'))
 	{
			$("#saveButton").click(function(e){	
				e.preventDefault();
				/*
				 * The login button has been clicked.
				 * Send an AJAX POST request to the validation routine
				 * page, which will work out the authentication for us.
				 * We will receive a boolean value in the response.
				 */	
				if ($("#company").val() != "" && $("#address_line_1").val() != "" && $("#suburb").val() != "" && $("#city").val() != "" && $("#country").val() != "" && $("#phone").val() != ""  && $("#email").val() != "" && $("#group_type").val() != "" && $("#poaddress").val() != "" && $("#pocode").val() != "" && $("#posuburb").val() != "" && $("#pocity").val() != "") 
				{
				$.ajax({
				  url: baseurl + "index.php/clientmanagement/add_group",
				  type: "POST",
				  cache: false,
				 data: "company=" + $("#company").val() + "&address_line_1=" + $("#address_line_1").val() + "&address_line_2=" + $("#address_line_2").val() + "&suburb=" + $("#suburb").val() + "&city=" + $("#city").val() + "&country=" + $("#country").val() + "&phone=" + $("#phone").val() + "&email=" + $("#email").val() + "&website=" + $("#website").val()  + "&group_type=" + $("#group_type").val() +
                                     "&poaddress=" + $("#poaddress").val() +
                                     "&pocode=" + $("#pocode").val() +
                                     "&posuburb=" + $("#posuburb").val() +
                                     "&pocity=" + $("#pocity").val(),
				  success: function(result){
				  	if (result > 0)
				  	{
						showSuccess("Client Created");                                                
						setTimeout(function(){goToClientmanagementgroup(result);}, 2000);
					}
					else
					{
						showError(result);
					}
				  }
				});
				} else {
					var errors = "";
					if($("#company").val() == "") {
						errors += "Client Name is blank<br />";
					}
					if($("#address_line_1").val() == "") {
						errors += "Address Line 1 is blank<br />";
					}
					
					if($("#suburb").val() == "") {
						errors += "Suburb is blank<br />";
					}
                                        if($("#poaddress").val() == "") {
						errors += "PO Address is blank<br />";
					}if($("#pocode").val() == "") {
						errors += "PO Code is blank<br />";
					}if($("#posuburb").val() == "") {
						errors += "PO Suburb is blank<br />";
					}if($("#pocity").val() == "") {
						errors += "PO City is blank<br />";
					}
                                        
					if($("#city").val() == "") {
						errors += "City is blank<br />";
					}
					if($("#country").val() == "") {
						errors += "Country is blank<br />";
					}
					if($("#phone").val() == "") {
						errors += "Phone is blank<br />";
					}
					if($("#email").val() == "") {
						errors += "Email is blank<br />";
					}
					
					showError(errors);
				}
 		});
 	}
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('add_site'))
 	{
			$("#saveButton").click(function(e){	
				e.preventDefault();
				/*
				 * The login button has been clicked.
				 * Send an AJAX POST request to the validation routine
				 * page, which will work out the authentication for us.
				 * We will receive a boolean value in the response.
				 */	
				if ($("#sitename").val() != "" && $("#address_line_1").val() != "" && $("#suburb").val() != "" && $("#city").val() != "") 
				{
				$.ajax({
				  url: baseurl + "index.php/buildingmanagement/add_site",
				  type: "POST",
				  cache: false,
				 data: "sitename=" + $("#sitename").val() + "&address_line_1=" + $("#address_line_1").val() + "&address_line_2=" + $("#address_line_2").val() + "&suburb=" + $("#suburb").val() + "&city=" + $("#city").val() + "&country=" + $("#country").val() + "&company=" + $("#company").val(),
				  success: function(result){
				  	if (result > 0)
				  	{
						showSuccess("Site Created");
						setTimeout(function(){goToBuildingmanagementsite($("#company").val(),result);}, 2000);
					}
					else
					{
						showError(result);
					}
				  }
				});
				} else {
					var errors = "";
					if($("#sitename").val() == "") {
						errors += "Site Name is blank<br />";
					}
					if($("#address_line_1").val() == "") {
						errors += "Address Line 1 is blank<br />";
					}
					
					if($("#suburb").val() == "") {
						errors += "Suburb is blank<br />";
					}
					if($("#city").val() == "") {
						errors += "City is blank<br />";
					}
							
					
					showError(errors);
				}
 		});
 	}
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('edit_building'))
 	{
			$("#saveButton").click(function(e){	
				e.preventDefault();
				/*
				 * The login button has been clicked.
				 * Send an AJAX POST request to the validation routine
				 * page, which will work out the authentication for us.
				 * We will receive a boolean value in the response.
				 */	
				if ($("#buildingname").val() != "" &&             
                                    $("#description").val() != ""  && 
                                    $("#address_line_1").val() != "" && 
                                    $("#suburb").val() != "" && 
                                    $("#city").val() != ""                                    
				){
				$.ajax({
				  url: baseurl + "index.php/buildingmanagement/edit_building",
				  type: "POST",
				  cache: false,
				 data: "buildingname=" + $("#buildingname").val() + 
                                     "&description=" + $("#description").val() +
                                     "&site=" + $("#site").val() + 
                                     "&address_line_1=" + $("#address_line_1").val() + 
                                     "&address_line_2=" + $("#address_line_2").val() + 
                                     "&suburb=" + $("#suburb").val() + 
                                     "&city=" + $("#city").val() + 
                                     "&country=" + $("#country").val() + 
                                     "&levels_above=" + $("#levels_above").val() +
                                     "&levels_below=" + $("#levels_below").val() +
                                     "&month_contructed=" + $("#month_contructed").val() +
                                     "&year_constructed=" + $("#year_constructed").val() +                                    
                                     "&map=" + $("#map").val() +
                                     "&buildingid=" + $("#buildingid").val(),
				  success: function(result){
				  	if (result == "Building Updated")
				  	{
						showSuccess(result);
						setTimeout(function(){goToBuildingmanagementbuild($("#client").val(),$("#site").val(),$("#buildingid").val());}, 2000);
					}
					else
					{
						showError(result);
					}
				  }
				});
				} else {
					var errors = "";
					if($("#buildingname").val() == "") {
						errors += "Building Name is blank<br />";
					}
                                        if($("#description").val() == "") {
						errors += "Description is blank<br />";
					}
					if($("#address_line_1").val() == "") {
						errors += "Address Line 1 is blank<br />";
					}
					
					if($("#suburb").val() == "") {
						errors += "Suburb is blank<br />";
					}
					if($("#city").val() == "") {
						errors += "City is blank<br />";
					}                                                                                                                       				
					showError(errors);
				}
 		});
 	}
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('add_building'))
 	{
			$("#saveButton").click(function(e){	
				e.preventDefault();
				/*
				 * The login button has been clicked.
				 * Send an AJAX POST request to the validation routine
				 * page, which will work out the authentication for us.
				 * We will receive a boolean value in the response.
				 */	
				if ($("#buildingname").val() != "" &&             
                                    $("#description").val() != ""  && 
                                    $("#address_line_1").val() != "" && 
                                    $("#suburb").val() != "" && 
                                    $("#city").val() != ""                                                              
				){
				$.ajax({
				  url: baseurl + "index.php/buildingmanagement/add_building",
				  type: "POST",
				  cache: false,
				 data: "buildingname=" + $("#buildingname").val() + 
                                     "&description=" + $("#description").val() +
                                     "&site=" + $("#site").val() + 
                                     "&address_line_1=" + $("#address_line_1").val() + 
                                     "&address_line_2=" + $("#address_line_2").val() + 
                                     "&suburb=" + $("#suburb").val() + 
                                     "&city=" + $("#city").val() + 
                                     "&country=" + $("#country").val() + 
                                     "&levels_above=" + $("#levels_above").val() +
                                     "&levels_below=" + $("#levels_below").val() +
                                     "&month_contructed=" + $("#month_contructed").val() +
                                     "&year_constructed=" + $("#year_constructed").val() +                                    
                                     "&map=" + $("#map").val(),
				  success: function(result){
				  	if (result > 0)
				  	{
						showSuccess("Building Created");
						setTimeout(function(){goToBuildingmanagementbuild($('#client').val(),$("#site").val(),result);}, 2000);
					}
					else
					{
						showError(result);
					}
				  }
				});
				} else {
					var errors = "";
					if($("#buildingname").val() == "") {
						errors += "Building Name is blank<br />";
					}
                                        if($("#description").val() == "") {
						errors += "Description is blank<br />";
					}
					if($("#address_line_1").val() == "") {
						errors += "Address Line 1 is blank<br />";
					}
					
					if($("#Suburb").val() == "") {
						errors += "Suburb is blank<br />";
					}
					if($("#city").val() == "") {
						errors += "City is blank<br />";
					}                                       
                                                                                 				
					showError(errors);
				}
 		});
 	}
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('edit_site'))
 	{
			$("#saveButton").click(function(e){	
				e.preventDefault();
				/*
				 * The login button has been clicked.
				 * Send an AJAX POST request to the validation routine
				 * page, which will work out the authentication for us.
				 * We will receive a boolean value in the response.
				 */	
				if ($("#sitename").val() != "" && $("#address_line_1").val() != "" && $("#suburb").val() != "" && $("#city").val() != "") 
				{
				$.ajax({
				  url: baseurl + "index.php/buildingmanagement/edit_site",
				  type: "POST",
				  cache: false,
				 data: "sitename=" + $("#sitename").val() + "&address_line_1=" + $("#address_line_1").val() + "&address_line_2=" + $("#address_line_2").val() + "&suburb=" + $("#suburb").val() + "&city=" + $("#city").val() + "&country=" + $("#country").val() + "&company=" + $("#company").val()  + "&siteid=" + $("#siteid").val(),
				  success: function(result){
				  	if (result > 0)
				  	{
						showSuccess("Site Updated");
						setTimeout(function(){goToBuildingmanagementsite($("#company").val(),$("#siteid").val());}, 2000);
					}
					else
					{
						showError(result);
					}
				  }
				});
				} else {
					var errors = "";
					if($("#sitename").val() == "") {
						errors += "Site Name is blank<br />";
					}
					if($("#address_line_1").val() == "") {
						errors += "Address Line 1 is blank<br />";
					}
					
					if($("#suburb").val() == "") {
						errors += "Suburb is blank<br />";
					}
					if($("#city").val() == "") {
						errors += "City is blank<br />";
                                        }			
					
					showError(errors);
				}
 		});
 	}
        if($('body').hasClass('clientmanagement') && $('form').hasClass('edit_group_page'))
 	{
			$("#saveButton").click(function(e){	
				e.preventDefault();
				/*
				 * The login button has been clicked.
				 * Send an AJAX POST request to the validation routine
				 * page, which will work out the authentication for us.
				 * We will receive a boolean value in the response.
				 */	
				if ($("#company").val() != "" && $("#address_line_1").val() != "" && $("#suburb").val() != "" && $("#city").val() != "" && $("#country").val() != "" && $("#phone").val() != "" && $("#email").val() != "" && $("#group_type").val() != "" && $("#poaddress").val() != "" && $("#pocode").val() != "" && $("#posuburb").val() != "" && $("#pocity").val() != "") 
				{
				$.ajax({
				  url: baseurl + "index.php/clientmanagement/edit_group",
				  type: "POST",
				  cache: false,
				 data: "groupid=" + $("#groupid").val() + "&company=" + $("#company").val() + "&address_line_1=" + $("#address_line_1").val() + "&address_line_2=" + $("#address_line_2").val() + "&suburb=" + $("#suburb").val() + "&city=" + $("#city").val() + "&country=" + $("#country").val() + "&phone=" + $("#phone").val() + "&email=" + $("#email").val() + "&website=" + $("#website").val()  + "&group_type=" + $("#group_type").val() +
                                     "&poaddress=" + $("#poaddress").val() +
                                     "&pocode=" + $("#pocode").val() +
                                     "&posuburb=" + $("#posuburb").val() +
                                     "&pocity=" + $("#pocity").val(),
				  success: function(result){
				  	if (result == "Client Updated")
				  	{
						showSuccess(result);
						setTimeout(function(){goToClientmanagementgroup($("#groupid").val());}, 2000);
					}
					else
					{
						showError(result);
					}
				  }
				});
				} else {
					var errors = "";
					if($("#company").val() == "") {
						errors += "Client Name is blank<br />";
					}
					if($("#address_line_1").val() == "") {
						errors += "Address Line 1 is blank<br />";
					}
					if($("#poaddress").val() == "") {
						errors += "PO Address is blank<br />";
					}if($("#pocode").val() == "") {
						errors += "PO Code is blank<br />";
					}if($("#posuburb").val() == "") {
						errors += "PO Suburb is blank<br />";
					}if($("#pocity").val() == "") {
						errors += "PO City is blank<br />";
					}
					if($("#suburb").val() == "") {
						errors += "Suburb is blank<br />";
					}
					if($("#city").val() == "") {
						errors += "City Password is blank<br />";
					}
					if($("#country").val() == "") {
						errors += "Country Password is blank<br />";
					}
					if($("#phone").val() == "") {
						errors += "Phone is blank<br />";
					}
					if($("#email").val() == "") {
						errors += "Email is blank<br />";
					}
					
					showError(errors);
				}
 		});
 	}
	
	if($('body').hasClass('clientmanagement') && $('form').hasClass('add_contact'))
 	{
			$("#saveButton").click(function(e){	
				e.preventDefault();
				/*
				 * The login button has been clicked.
				 * Send an AJAX POST request to the validation routine
				 * page, which will work out the authentication for us.
				 * We will receive a boolean value in the response.
				 */	
				if ($("#title").val() != "" && $("#first_name").val() != "" && $("#last_name_name").val() != "" && $("#address_line_1").val() != "" && $("#suburb").val() != "" && $("#city").val() != "" && $("#country").val() != "" && $("#phone").val() != "" && $("#mobile").val() != "" && $("#email").val() != "" && $("#group").val() != "" && $("#bussphone").val() != "" && $("#poaddress").val() != "" && $("#pocode").val() != "" && $("#posuburb").val() != "" && $("#pocity").val() != "") 
				{
				$.ajax({
				  url: baseurl + "index.php/clientmanagement/add_client",
				  type: "POST",
				  cache: false,
				 data: "title=" + $("#title").val() + "&first_name=" + $("#first_name").val() + "&last_name=" + $("#last_name").val() + "&address_line_1=" + $("#address_line_1").val() + "&address_line_2=" + $("#address_line_2").val() + "&suburb=" + $("#suburb").val() + "&city=" + $("#city").val() + "&country=" + $("#country").val() + "&phone=" + $("#phone").val() + "&mobile=" + $("#mobile").val() + "&email=" + $("#email").val() + "&website=" + $("#website").val()  + "&group=" + $("#group").val() + "&bussphone=" + $("#bussphone").val() +
                                     "&poaddress=" + $("#poaddress").val() +
                                     "&pocode=" + $("#pocode").val() +
                                     "&posuburb=" + $("#posuburb").val() +
                                     "&pocity=" + $("#pocity").val(),
				  success: function(result){
				  	if (result > 0)
				  	{
						showSuccess("Contact Created");
						setTimeout(function(){window.location = baseurl+"index.php/clientmanagement/view_contact/"+$("#group").val()+"/"+result;}, 2000);
					}
					else
					{
						showError(result);
					}
				  }
				});
				} else {
					var errors = "";
					if($("#title").val() == "") {
						errors += "Title is blank<br />";
					}
					if($("#first_name").val() == "") {
						errors += "First Name is blank<br />";
					}
					if($("#last_name").val() == "") {
						errors += "Last Name is blank<br />";
					}
					if($("#address_line_1").val() == "") {
						errors += "Address Line 1 is blank<br />";
					}
					if($("#poaddress").val() == "") {
						errors += "PO Address is blank<br />";
					}if($("#pocode").val() == "") {
						errors += "PO Code is blank<br />";
					}if($("#posuburb").val() == "") {
						errors += "PO Suburb is blank<br />";
					}if($("#pocity").val() == "") {
						errors += "PO City is blank<br />";
					}
					if($("#suburb").val() == "") {
						errors += "Suburb is blank<br />";
					}
					if($("#city").val() == "") {
						errors += "City is blank<br />";
					}
					if($("#country").val() == "") {
						errors += "Country is blank<br />";
					}
					if($("#phone").val() == "") {
						errors += "Phone is blank<br />";
					}
					if($("#mobile").val() == "") {
						errors += "Mobile is blank<br />";
					}
					if($("#bussphone").val() == "") {
						errors += "Bussiness phone is blank<br />";
					}
					if($("#email").val() == "") {
						errors += "Email is blank<br />";
					}
					
					showError(errors);
				}
 		});
 	}
	if($('body').hasClass('clientmanagement') && $('form').hasClass('edit_contact'))
 	{
			$("#saveButton").click(function(e){	
				e.preventDefault();
				/*
				 * The login button has been clicked.
				 * Send an AJAX POST request to the validation routine
				 * page, which will work out the authentication for us.
				 * We will receive a boolean value in the response.
				 */	
				if ($("#title").val() != "" && $("#first_name").val() != "" && $("#last_name").val() != "" && $("#address_line_1").val() != "" && $("#suburb").val() != "" && $("#city").val() != "" && $("#country").val() != "" && $("#phone").val() != "" && $("#mobile").val() != "" && $("#email").val() != "" && $("#group").val() != "" && $("#bussphone").val() != "" && $("#poaddress").val() != "" && $("#pocode").val() != "" && $("#posuburb").val() != "" && $("#pocity").val() != "") 
				{
				$.ajax({
				  url: baseurl + "index.php/clientmanagement/edit_client",
				  type: "POST",
				  cache: false,
				 data: "title=" + $("#title").val() + "&first_name=" + $("#first_name").val() + "&last_name=" + $("#last_name").val() + "&address_line_1=" + $("#address_line_1").val() + "&address_line_2=" + $("#address_line_2").val() + "&suburb=" + $("#suburb").val() + "&city=" + $("#city").val() + "&country=" + $("#country").val() + "&phone=" + $("#phone").val() + "&mobile=" + $("#mobile").val() + "&email=" + $("#email").val() + "&website=" + $("#website").val()  + "&group=" + $("#group").val() + "&bussphone=" + $("#bussphone").val() + "&clientid=" + $("#clientid").val()+
                                     "&poaddress=" + $("#poaddress").val() +
                                     "&pocode=" + $("#pocode").val() +
                                     "&posuburb=" + $("#posuburb").val() +
                                     "&pocity=" + $("#pocity").val(),
				  success: function(result){
				  	if (result == "Contact Updated")
				  	{
						showSuccess(result);
						setTimeout(function(){goToClientmanagementclient($("#group").val(),$("#clientid").val());}, 2000);
					}
					else
					{
						showError(result);
					}
				  }
				});
				} else {
					var errors = "";
					if($("#title").val() == "") {
						errors += "Title is blank<br />";
					}
					if($("#first_name").val() == "") {
						errors += "First Name is blank<br />";
					}
					if($("#last_name").val() == "") {
						errors += "Last Name is blank<br />";
					}
					if($("#address_line_1").val() == "") {
						errors += "Address Line 1 is blank<br />";
					}
					if($("#poaddress").val() == "") {
						errors += "PO Address is blank<br />";
					}if($("#pocode").val() == "") {
						errors += "PO Code is blank<br />";
					}if($("#posuburb").val() == "") {
						errors += "PO Suburb is blank<br />";
					}if($("#pocity").val() == "") {
						errors += "PO City is blank<br />";
					}
					if($("#suburb").val() == "") {
						errors += "Suburb is blank<br />";
					}
					if($("#city").val() == "") {
						errors += "City is blank<br />";
					}
					if($("#country").val() == "") {
						errors += "Country is blank<br />";
					}
					if($("#phone").val() == "") {
						errors += "Phone is blank<br />";
					}
					if($("#mobile").val() == "") {
						errors += "Mobile is blank<br />";
					}
					if($("#bussphone").val() == "") {
						errors += "Bussiness phone is blank<br />";
					}
					if($("#email").val() == "") {
						errors += "Email is blank<br />";
					}
					
					showError(errors);
				}
 		});
 	}
	
 	if($('body').hasClass('usermanagement') && $('form').hasClass('edit_user'))
	{
		$("#applyButton").click(function(e){	
			e.preventDefault();
			/*
			 * The login button has been clicked.
			 * Send an AJAX POST request to the validation routine
			 * page, which will work out the authentication for us.
			 * We will receive a boolean value in the response.
			 */	
			if ($("#first_name").val() != "" && $("#last_name").val() != "" && $("#password").val() != "" && $("#password2").val() != "" && $("#email_address").val() != "")
			{
				$.ajax({
				  url: baseurl + "index.php/usermanagement/edit_user",
				  type: "POST",
				  cache: false,
				  data: "first_name=" + $("#first_name").val() 
				  + "&last_name=" + $("#last_name").val() 
				  + "&password=" + $("#password").val() 
                                  + "&password2=" + $("#password2").val()
				  + "&email_address=" + $("#email_address").val() 
				  + "&user_type=" + $("#user_type").val()
				  + "&user_id=" + $("#user_id").val()
                                  + "&bms=" + $("#bms").val(),
				  success: function(status){
                                        if(status == "User Updated") {
					showSuccess(status);
                                        setTimeout(function(){goToUsermanagement();}, 2000);
                                        } else {
                                        showError(status);    
                                        }
				  }
				});
			}
			else {
					var errors ="";
					if ($("#first_name").val() == "") 
					{
						errors += "First name cannot be blank<br />";
					}
					if ($("#last_name").val() == "") 
					{
						errors += "Last name cannot be blank<br />";
					}
					if ($("#email").val() == "") 
					{
						errors += "Email address cannot be blank<br />";
					}
					if ($("#password").val() == "") 
					{
						errors += "New Password cannot be blank<br />";
					}
					if ($("#password2").val() == "") 
					{
						errors += "Verify Password cannot be blank<br />";
					}
					showError(errors);
			}
		});
                $('#user_type').change(function(e) {
                    e.preventDefault();
                    switch($("#user_type").val()) {
                        case '1' :window.location = baseurl+"index.php/usermanagement/edit/"+$("#user_id").val()+"/1/";break;
                        case '3' :window.location = baseurl+"index.php/usermanagement/edit/"+$("#user_id").val()+"/3/";break;
                        case '0' :window.location = baseurl+"index.php/usermanagement/edit/"+$("#user_id").val()+"/0/";break;
                        default:window.location = baseurl+"index.php/usermanagement/edit/"+$("#user_id").val()+"/"+$("#user_type").val();break;
                    }
                });
                $("#saveDropbox").click(function(e){	
			e.preventDefault();
                        $.ajax({
				  url: baseurl + "index.php/usermanagement/dropbox_credentials",
				  type: "POST",
				  cache: false,
				  data: "dropbox_user=" + $("#dropbox_user").val() 
				  + "&dropbox_pass=" + $("#dropbox_pass").val(),
				  success: function(status){
                                        if(status == "Dropbox Credentials Updated") {
					showSuccess(status);
                                        setTimeout(function(){location.reload();}, 2000);
                                        } else {
                                        showError(status);    
                                        }
				  }
				});
                });
                $("#saveSkydrive").click(function(e){	
			e.preventDefault();
                        $.ajax({
				  url: baseurl + "index.php/usermanagement/skydrive_credentials",
				  type: "POST",
				  cache: false,
				  data: "skydrive_user=" + $("#skydrive_user").val() 
				  + "&skydrive_pass=" + $("#skydrive_pass").val(),
				  success: function(status){
                                        if(status == "SkyDrive Credentials Updated") {
					showSuccess(status);
                                        setTimeout(function(){location.reload();}, 2000);
                                        } else {
                                        showError(status);    
                                        }
				  }
				});
                });
	}
	if($('body').hasClass('building_inspection') && $('form').hasClass('search_company'))
 	{
            $("#inspectcompany").change(function(e){	
                e.preventDefault();
                    $.ajax({
				  url: baseurl + "index.php/buildinginspection/index/" + $('#inspectcompany').val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/buildinginspection/index/"+$('#inspectcompany').val(); 
                                    }
				});
                 
            });
        }
        if($('body').hasClass('building_inspection') && $('form').hasClass('search_site'))
 	{
            $("#inspectsite").change(function(e){
                e.preventDefault();
                //showSuccess("status");
                    $.ajax({
				  url: baseurl + "index.php/buildinginspection/index/" + $('#inspectcompany').val() + "/" + $("#inspectsite").val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/buildinginspection/index/"+$('#inspectcompany').val() + "/" + $("#inspectsite").val(); 
                                    }
				});
                 
            });
        }
        if($('body').hasClass('building_inspection') && $('form').hasClass('search_building'))
 	{
            $("#inspectbuilding").change(function(e){	
                e.preventDefault();
                    $.ajax({
				  url: baseurl + "index.php/buildinginspection/index/" + $('#inspectcompany').val() +"/"+ $('#inspectsite').val() +"/"+ $('#inspectbuilding').val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/buildinginspection/index/"+$('#inspectcompany').val()+"/"+$('#inspectsite').val()+"/"+$('#inspectbuilding').val(); 
                                    }
				});
               
            });
        }
        if($('body').hasClass('building_inspection') && $('form').hasClass('search_above'))
 	{
            $("#inspectabove").change(function(e){	
                e.preventDefault();
                 window.location = baseurl+"index.php/buildinginspection/index/"+$('#inspectcompany').val()+"/"+$('#inspectsite').val()+"/"+$('#inspectbuilding').val()+"/"+$('#inspectabove').val()+"/200"; 
               
            });
        }
        if($('body').hasClass('building_inspection') && $('form').hasClass('search_levels'))
 	{
            $("#inspectlevel").change(function(e){	
                e.preventDefault();
                 window.location = baseurl+"index.php/buildinginspection/index/"+$('#inspectcompany').val()+"/"+$('#inspectsite').val()+"/"+$('#inspectbuilding').val()+"/"+$('#inspectabove').val()+"/"+$('#inspectlevel').val();    
        });
        }
        if($('body').hasClass('building_inspection') && $('form').hasClass('search_area'))
 	{
            $("#inspectarea").change(function(e){	
                e.preventDefault();
                 window.location = baseurl+"index.php/buildinginspection/index/"+$('#inspectcompany').val()+"/"+$('#inspectsite').val()+"/"+$('#inspectbuilding').val()+"/"+$('#inspectabove').val()+"/"+$('#inspectlevel').val()+"/"+$('#inspectarea').val(); 
               
            });
        }
        if($('body').hasClass('bwof') && $('form').hasClass('bwof_company'))
 	{
            $("#inspectcompany").change(function(e){	
                e.preventDefault();
                    $.ajax({
				  url: baseurl + "index.php/bwof/index/" + $('#inspectcompany').val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/bwof/index/"+$('#inspectcompany').val(); 
                                    }
				});
                 
            });
        }
         if($('body').hasClass('bwof') && $('form').hasClass('bwof_site'))
 	{
            $("#inspectsite").change(function(e){
                e.preventDefault();
                //showSuccess("status");
                    $.ajax({
				  url: baseurl + "index.php/bwof/index/" + $('#inspectcompany').val() + "/" + $("#inspectsite").val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/bwof/index/"+$('#inspectcompany').val() + "/" + $("#inspectsite").val(); 
                                    }
				});
                 
            });
        }
        if($('body').hasClass('bwof') && $('form').hasClass('bwof_building'))
 	{
            $("#inspectbuilding").change(function(e){	
                e.preventDefault();
                    $.ajax({
				  url: baseurl + "index.php/bwof/index/" + $('#inspectcompany').val() +"/"+ $('#inspectsite').val() +"/"+ $('#inspectbuilding').val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/bwof/index/"+$('#inspectcompany').val()+"/"+$('#inspectsite').val()+"/"+$('#inspectbuilding').val(); 
                                    }
				});
               
            });
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_ab'))
 	{
            $("#bm_ab").change(function(e){	
                e.preventDefault();
                       window.location = baseurl+"index.php/buildingmanagement/view_levels/"+$('#site').val()+"/"+$('#building').val()+"/"+$('#bm_ab').val(); 
            });
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_lvl'))
 	{
            $("#bm_lvl").change(function(e){	
                e.preventDefault();
                       window.location = baseurl+"index.php/buildingmanagement/view_levels/"+$('#site').val()+"/"+$('#building').val()+"/"+$('#bm_ab').val()+"/"+$('#bm_lvl').val(); 
            });
        }
        
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_company'))
 	{
            $("#bmcompany").change(function(e){	
                e.preventDefault();
                       window.location = baseurl+"index.php/buildingmanagement/index/"+$("#bmcompany").val();
            });
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_site'))
 	{
            $("#bmsite").change(function(e){	
                e.preventDefault();
                       window.location = baseurl+"index.php/buildingmanagement/index/"+$("#bmcompany").val()+"/"+$("#bmsite").val();
            });
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_building'))
 	{
            $("#bmbuilding").change(function(e){	
                e.preventDefault();
                       window.location = baseurl+"index.php/buildingmanagement/index/"+$("#bmcompany").val()+"/"+$("#bmsite").val()+"/"+$('#bmbuilding').val()+"/g/0/";
            });
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_above'))
 	{
            $("#bmabove").change(function(e){	
                e.preventDefault();
                       window.location = baseurl+"index.php/buildingmanagement/index/"+$("#bmcompany").val()+"/"+$("#bmsite").val()+"/"+$('#bmbuilding').val()+"/"+$('#bmabove').val();
            });
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_levels'))
 	{
            $("#bmlevels").change(function(e){	
                e.preventDefault();
                       window.location = baseurl+"index.php/buildingmanagement/index/"+$("#bmcompany").val()+"/"+$("#bmsite").val()+"/"+$('#bmbuilding').val()+"/"+$('#bmabove').val()+"/"+$('#bmlevels').val();
            });
        }
        if($('body').hasClass('buildingmanagement') && $('form').hasClass('bm_areas'))
 	{
            $("#bmareas").change(function(e){	
                e.preventDefault();
                       window.location = baseurl+"index.php/buildingmanagement/index/"+$("#bmcompany").val()+"/"+$("#bmsite").val()+"/"+$('#bmbuilding').val()+"/"+$('#bmabove').val()+"/"+$('#bmlevels').val()+"/"+$('#bmareas').val();
            });
        }
        if($('body').hasClass('building_inspection') && $('form').hasClass('add_hazard'))
 	{
            $('#inputDate').DatePicker({
                    format:'d-m-Y',
                    date: $('#inputDate').val(),
                    current: $('#inputDate').val(),
                    starts: 1,
                    position: 'r',
                    onBeforeShow: function(){
                            $('#inputDate').DatePickerSetDate($('#inputDate').val(), true);
                    },
                    onChange: function(formated, dates){
                            $('#inputDate').val(formated);
                            $('#inputDate').DatePickerHide();
                    }
            });
            $("#addHazard").click(function(e){	
                e.preventDefault();
                if($('#hname').val() != "" &&
                   $('#hdate').val() != "" &&
                   $('#hdescription').val() != "" &&
                   $('#hsolution').val() != "" &&
                   $('#inspectcompany').val() != 0 &&
                   $('#inspectbuilding').val() != 0
                    ){
                    $.ajax({
				  url: baseurl + "index.php/buildinginspection/add_hazard",
				  type: "POST",
				  cache: false,
                                  data: "hname=" + $("#hname").val() 
				  + "&hdate=" + $("#inputDate").val() 
				  + "&harea=" + $("#harea").val() 
                                  + "&hlevel=" + $("#hlevel").val()
				  + "&hstatus=" + $("#hstatus").val() 
				  + "&hdescription=" + $("#hdescription").val()
				  + "&hsolution=" + $("#hsolution").val(),
				  success: function(result){
                                        if(result > 0) {
                                            showSuccess("Hazard Added");
                                            setTimeout(function(){goToBuildinginspectionEditHazard($('#inspectcompany').val(),$('#sid').val(),$('#inspectbuilding').val(),$('#above').val(),$('#level').val(),$("#harea").val(),result)},2000)
                                        } else {
                                            showError(result);
                                        }
                                        
                                    }
				});
                } else {
                    var errors="";
                    if($('#hname').val() == "") {
                       errors += "Hazard name is blank<br />"; 
                    }
                    if($('#hdate').val() == "") {
                       errors += "Hazard date is blank<br />"; 
                    } 
                    if($('#hdescription').val() == "") {
                       errors += "Hazard description is blank<br />"; 
                    } 
                    if($('#hsolution').val() == "") {
                       errors += "Hazard solution is blank <br />"; 
                    } 
                    if($('#inspectcompany').val() == 0) {
                       errors += "Please select a Company<br />"; 
                    } 
                    if($('#inspectbuilding').val() == 0) {
                       errors += "Please select a building<br />"; 
                    }
                    showError(errors);
                }
            });
        }
        // $("#filebutton").click(function(e) {
        //     e.preventDefault();
        //     showSuccess($('#filename').val());
        // });
        if($('body').hasClass('building_inspection') && $('form').hasClass('edit_hazard'))
 	{ 
            $('#inputDate').DatePicker({
                    format:'d-m-Y',
                    date: $('#inputDate').val(),
                    current: $('#inputDate').val(),
                    starts: 1,
                    position: 'r',
                    onBeforeShow: function(){
                            $('#inputDate').DatePickerSetDate($('#inputDate').val(), true);
                    },
                    onChange: function(formated, dates){
                            $('#inputDate').val(formated);
                            $('#inputDate').DatePickerHide();
                    }
            });
            $("#saveButton").click(function(e){	
                e.preventDefault();
                if($('#hname').val() != "" &&
                   $('#hdate').val() != "" &&
                   $('#hdescription').val() != "" &&
                   $('#hsolution').val() != "" &&
                   $('#inspectcompany').val() != 0 &&
                   $('#inspectbuilding').val() != 0
                    ){
                    $.ajax({
				  url: baseurl + "index.php/buildinginspection/edit_hazard",
				  type: "POST",
				  cache: false,
                                  data: "hname=" + $("#hname").val() 
				  + "&hdate=" + $("#inputDate").val() 
				  + "&harea=" + $("#harea").val() 
                                  + "&hlevel=" + $("#hlevel").val()
				  + "&hstatus=" + $("#hstatus").val() 
				  + "&hdescription=" + $("#hdescription").val()
				  + "&hsolution=" + $("#hsolution").val()
                                  + "&hid=" + $("#hid").val(),
				  success: function(result){
                                        if(result == "Hazard Updated") {
                                            showSuccess(result);
                                            setTimeout(function(){goToBuildinginspection($('#inspectcompany').val(),$('#inspectsite').val(),$('#inspectbuilding').val(),$('#above').val(),$('#level').val(),$('#harea').val(),$("#hid").val())},2000)
                                        } else {
                                            showError(result);
                                        }
                                        
                                    }
				});
                } else {
                    var errors="";
                    if($('#hname').val() == "") {
                       errors += "Hazard name is blank<br />"; 
                    }
                    if($('#hdate').val() == "") {
                       errors += "Hazard date is blank<br />"; 
                    } 
                    if($('#hdescription').val() == "") {
                       errors += "Hazard description is blank<br />"; 
                    } 
                    if($('#hsolution').val() == "") {
                       errors += "Hazard solution is blank <br />"; 
                    } 
                    if($('#inspectcompany').val() == 0) {
                       errors += "Please select a Company<br />"; 
                    } 
                    if($('#inspectbuilding').val() == 0) {
                       errors += "Please select a building<br />"; 
                    }
                    showError(errors);
                }
            });
        }
         if($('body').hasClass('building_inspection') && $('form').hasClass('delete_hazard_page'))
         {
            $("#saveButton").click(function(e){	
                e.preventDefault();
                    $.ajax({
                        url: baseurl + "index.php/buildinginspection/delete_hazard",
				  type: "POST",
				  cache: false,
                                  data: "hid=" + $("#hid").val(),
                                  success: function(result){
                                        if(result == "Hazard Deleted") {
                                            showSuccess(result);
                                            setTimeout(function(){goToBuildinginspection1($('#inspectcompany').val(),$('#inspectsite').val(),$('#inspectbuilding').val(),$('#above').val(),$('#level').val(),$('#area').val())},2000)
                                        } else {
                                            showError(result);
                                        }
                                        
                                    }
                    });
            });
        }
        if($('body').hasClass('building_inspection') && $('form').hasClass('inspection_complete_page'))
         {
            $("#Pass").click(function(e){	
                e.preventDefault();
                $.ajax({
                        url: baseurl + "index.php/buildinginspection/inspection_complete",
				  type: "POST",
				  cache: false,
                                  data: "buildingid=" + $("#buildingid").val() +
                                      "&companyid=" + $("#companyid").val() +
                                      "&siteid=" + $("#siteid").val() +
                                      "&user_id=" + $("#user_id").val() +
                                      "&status=1",
                                  success: function(result){
                                            if(result > 0) {
                                            showSuccess("Building Inspection Complete");
                                            setTimeout(function(){window.location = baseurl+"index.php/bwof/index/"+$("#companyid").val()+"/"+$("#siteid").val()+"/"+$("#buildingid").val();},2000)
                                            } else {
                                            showError(result);   
                                            }
                                }
                    });     
            });
            $("#Fail").click(function(e){	
                e.preventDefault();
               $.ajax({
                        url: baseurl + "index.php/buildinginspection/inspection_complete",
				  type: "POST",
				  cache: false,
                                  data: "buildingid=" + $("#buildingid").val() +
                                      "&companyid=" + $("#companyid").val() +
                                      "&siteid=" + $("#siteid").val() +
                                      "&user_id=" + $("#user_id").val() +
                                      "&status=0",
                                  success: function(result){
                                            if(result > 0) {
                                            showSuccess("Building Inspection Complete");
                                            setTimeout(function(){window.location = baseurl+"index.php/bwof/index/"+$("#companyid").val()+"/"+$("#siteid").val()+"/"+$("#buildingid").val();},2000)
                                            } else {
                                            showError(result);   
                                            }
                                }
                    });     
            });
        }
        
        if($('body').hasClass('dashboard') && $('form').hasClass('add_activities_page'))
 	{ 
            $('#inputDate').DatePicker({
                    format:'d-m-Y',
                    date: $('#inputDate').val(),
                    current: $('#inputDate').val(),
                    starts: 1,
                    position: 'r',
                    onBeforeShow: function(){
                            $('#inputDate').DatePickerSetDate($('#inputDate').val(), true);
                    },
                    onChange: function(formated, dates){
                            $('#inputDate').val(formated);
                            $('#inputDate').DatePickerHide();
                    }
            });
            $("#Save").click(function(e){	
                e.preventDefault();
                if($('#act_name').val() != "" &&
                   $('#inputDate').val()) {
                   if($("#purpose").val()=='3' && $("#building").val()=='0') {
                       showError("Please select a building for Inspection<br />");
                   }
                   else if($("#purpose").val()=='2' && $("#building").val()=='0') {
                       showError("Please select a building for Building Management<br />");
                   }
                   else if($("#purpose").val()=='1' && $("#client").val()=='0') {
                       showError("Please select a client for Client Management<br />");
                   }
                   else {
                   $.ajax({
                        url: baseurl + "index.php/dashboard/add_activities",
				  type: "POST",
				  cache: false,
                                  data: "act_name=" + $("#act_name").val() +
                                      "&act_des=" + $("#act_des").val() +
                                      "&client=" + $("#client").val() +
                                      "&building=" + $("#building").val() +
                                      "&inputDate=" + $("#inputDate").val() +
                                      "&purpose=" + $("#purpose").val(),
                                  success: function(result){ 
                                      if(result > 0) {
                                      showSuccess("Event Added");
                                      setTimeout(function() {goToDashboard($('#uid').val())},2000);
                                      } else {
                                      showError(result);    
                                      }
                                  }
                    });
                   }
                } else {
                    var errors="";
                    if($('#act_name').val() == "") {
                       errors += "Event name is blank<br />"; 
                    }
                    if($('#inputDate').val() == "") {
                       errors += "Event Date is blank<br />"; 
                    }
                    
                    showError(errors);
                }
        
            });
        }
        if($('body').hasClass('dashboard') && $('form').hasClass('edit_activities_page'))
 	{ 
            $('#inputDate').DatePicker({
                    format:'d-m-Y',
                    date: $('#inputDate').val(),
                    current: $('#inputDate').val(),
                    starts: 1,
                    position: 'r',
                    onBeforeShow: function(){
                            $('#inputDate').DatePickerSetDate($('#inputDate').val(), true);
                    },
                    onChange: function(formated, dates){
                            $('#inputDate').val(formated);
                            $('#inputDate').DatePickerHide();
                            
                    }
            });
            $("#Delete").click(function(e){	
                e.preventDefault();
                 $.ajax({
                        url: baseurl + "index.php/dashboard/delete_activites/"+$("#act_id").val(),
				  type: "POST",
				  cache: false,
                                  success: function() {
                                      showSuccess("Event Deleted");
                                      setTimeout(function() {goToDashboard($('#uid').val())},2000);
                                  }
                    });
            });
            $("#Save").click(function(e){	
                e.preventDefault();
                if($('#act_name').val() != "" &&
                   $('#inputDate').val()) {
                   if($("#purpose").val()=='3' && $("#building").val()=='0') {
                       showError("Please select a building for Inspection<br />");
                   }
                   else if($("#purpose").val()=='2' && $("#building").val()=='0') {
                       showError("Please select a building for Building Management<br />");
                   }
                   else if($("#purpose").val()=='1' && $("#client").val()=='0') {
                       showError("Please select a client for Client Management<br />");
                   }
                   else {
                   $.ajax({
                        url: baseurl + "index.php/dashboard/edit_activities",
				  type: "POST",
				  cache: false,
                                  data: "act_name=" + $("#act_name").val() +
                                      "&act_des=" + $("#act_des").val() +
                                      "&client=" + $("#client").val() +
                                      "&building=" + $("#building").val() +
                                      "&inputDate=" + $("#inputDate").val() +
                                      "&act_id=" +$("#act_id").val()+
                                      "&purpose=" + $("#purpose").val(),
                                  success: function(result){ 
                                      if(result > 0) {
                                      showSuccess("Event Updated");
                                      setTimeout(function() {goToDashboard($('#uid').val())},2000);
                                      } else {
                                      showError(result);    
                                      }
                                  }
                    });
                   }
                } else {
                    var errors="";
                    if($('#act_name').val() == "") {
                       errors += "Event name is blank<br />"; 
                    }
                    if($('#inputDate').val() == "") {
                       errors += "Event Date is blank<br />"; 
                    } 
                    showError(errors);
                }
        
            });
        }
        if($('body').hasClass('reports') && $('form').hasClass('search_company'))
 	{
            $("#inspectcompany").change(function(e){	
                e.preventDefault();
                    $.ajax({
				  url: baseurl + "index.php/reports/index/" + $('#inspectcompany').val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/reports/index/"+$('#inspectcompany').val(); 
                                    }
				});
                 
            });
        }
        if($('body').hasClass('reports') && $('form').hasClass('search_site'))
 	{
            $("#inspectsite").change(function(e){
                e.preventDefault();
                //showSuccess("status");
                    $.ajax({
				  url: baseurl + "index.php/reports/index/" + $('#inspectcompany').val() + "/" + $("#inspectsite").val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/reports/index/"+$('#inspectcompany').val() + "/" + $("#inspectsite").val(); 
                                    }
				});
                 
            });
        }
        if($('body').hasClass('reports') && $('form').hasClass('search_building'))
 	{
            $("#inspectbuilding").change(function(e){	
                e.preventDefault();
                    $.ajax({
				  url: baseurl + "index.php/reports/index/" + $('#inspectcompany').val() +"/"+ $('#inspectsite').val() +"/"+ $('#inspectbuilding').val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/reports/index/"+$('#inspectcompany').val()+"/"+$('#inspectsite').val()+"/"+$('#inspectbuilding').val(); 
                                    }
				});
               
            });
        }
        if($('body').hasClass('reports') && $('form').hasClass('search_report'))
 	{
            $("#report_type").change(function(e){	
                e.preventDefault();
                    $.ajax({
				  url: baseurl + "index.php/reports/index/" + $('#inspectcompany').val() +"/"+ $('#inspectsite').val() +"/"+ $('#inspectbuilding').val() + "/"+ $('#report_type').val(),
				  type: "POST",
				  cache: false,
				  success: function(status){
                                        window.location = baseurl+"index.php/reports/index/"+$('#inspectcompany').val()+"/"+$('#inspectsite').val()+"/"+$('#inspectbuilding').val()+"/"+$('#report_type').val(); 
                                    }
				});
               
            });
        }
        
	if($('body').hasClass('client'))
	{
		$('#more_client_details').click(function(e) {
		
			if($('#extra_client_details').hasClass('hidden'))
			{
				$('#extra_client_details').removeClass('hidden');
				$('#more_client_details').html('Less Client Details...');
			}
			else {
				$('#extra_client_details').addClass('hidden');
				$('#more_client_details').html('More Client Details......');
			}
		
		});
	}
	
	if($('body').hasClass('add_building_wizard'))
	{
		$("#backStepOne").livequery('click', function(e){	
			e.preventDefault();
			/*
			 * The login button has been clicked.
			 * Send an AJAX POST request to the validation routine
			 * page, which will work out the authentication for us.
			 * We will receive a boolean value in the response.
			 */	
			
			$.ajax({
			  url: baseurl + "index.php/buildingmanagement/stepone",
			  type: "POST",
			  cache: false,
			  data: null,
			  success: function(stepone){
			  
				$(".wizardframe .content").html(stepone);
				$(".wizardframe .content").show("slide", {direction: "left"}, 1000);  				  	
				
			  }
			});
			
		});
		
		$("#backStepTwo").livequery('click', function(e){	
			e.preventDefault();
			/*
			 * The login button has been clicked.
			 * Send an AJAX POST request to the validation routine
			 * page, which will work out the authentication for us.
			 * We will receive a boolean value in the response.
			 */	
			
			$.ajax({
			  url: baseurl + "index.php/buildingmanagement/steptwo",
			  type: "POST",
			  cache: false,
			  data: null,
			  success: function(steptwo){
				$(".wizardframe .content").html(steptwo);
				$(".wizardframe .content").show("slide", {direction: "left"}, 1000);  				  	
				
			  }
			});
			
		});
	
		$("#nextStep").livequery('click', function(e){	
			e.preventDefault();
			/*
			 * The login button has been clicked.
			 * Send an AJAX POST request to the validation routine
			 * page, which will work out the authentication for us.
			 * We will receive a boolean value in the response.
			 */	
			if ($("#name").val() != "" && $("#address").val() != "")
			{
				$.ajax({
				  url: baseurl + "index.php/buildingmanagement/stepone",
				  type: "POST",
				  cache: false,
				  data: "name=" + $("#name").val() 
				  + "&address=" + $("#address").val(),
				  success: function(steptwo){
					$(".wizardframe .content").html(steptwo);
					$(".wizardframe .content").show("slide", {direction: "right"}, 1000);  				  	
					
				  }
				});
			}
		});
		
		$("#nextStepTwo").livequery('click', function(e){	
			e.preventDefault();
			/*
			 * The login button has been clicked.
			 * Send an AJAX POST request to the validation routine
			 * page, which will work out the authentication for us.
			 * We will receive a boolean value in the response.
			 */	
			if ($("#name").val() != "" && $("#address").val() != "")
			{
				$.ajax({
				  url: baseurl + "index.php/buildingmanagement/steptwo",
				  type: "POST",
				  cache: false,
				  data: "name=" + $("#name").val() 
				  + "&address=" + $("#address").val(),
				  success: function(steptwo){
					$(".wizardframe .content").html(steptwo);
					$(".wizardframe .content").show("slide", {direction: "right"}, 1000);  				  	
					
				  }
				});
			}
			else {
					var errors = "Please make sure the fields are not blank";
					
			
					showError("Error: " + errors);
			}
		});
		
		$("#nextStepThree").livequery('click', function(e){
		
			e.preventDefault();
			
			$.ajax({
			
			url: 	baseurl + "index.php/buildingmanagement/stepthree",
			type: 	"POST",
			cache: 	false,
			data: 	"month=" + $("#nextmonth").customdata('month') +
					"&year=" + $("#nextmonth").customdata('year'),
			success: function(result){
			$(".wizardframe .content").html(result);
			$(".wizardframe .content").show("slide", {direction: "right"}, 1000); 
			}//end success: function(result){
			
			})//end $.ajax({..
		
		})//end .click(function() {...
	
		$("#newcontact").livequery('click', function(e){
		
			$.facebox({ajax: baseurl + 'application/views/client/modal.php'});
		
		});
		
		$("#ownerslist").livequery('change', function (e) {
			if ($("#ownerslist option:selected").val() == "new")
			{
				$.facebox({ajax: baseurl + 'application/views/client/modal.php'});
			}
		});
		
				
		$("#newsite").livequery('click', function(e){
		
			if($('#existing_site_options').hasClass('hidden'))
			{
				$('#existing_site_options').hide();
				$('#existing_site_options').removeClass('hidden');
				$('#existing_site_options').show("slide", {direction: "up"}, 1000);
			}	
		
		});
	
	
	}





 
 
 
 // End of jQuery document.ready(function(){

	});

})(this.jQuery);























