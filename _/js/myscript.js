function validateForm(d){
	var input = d.getAttribute('id');
	//console.log(input.toLowerCase());
	switch(input.toLowerCase()){
		case "email":
			var emailStr = d.value;
			var emailRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/﻿;
			if(emailRegExp.test(emailStr)){
				d.style.boxShadow = "0 0 7px #c7f7ae";

			}
			else{
				d.style.boxShadow = "0 0 7px red";							

			}
				break;
        case "pass":
            var pass = d.value;
            var passRegExp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if(passRegExp.test(pass)){
                d.style.boxShadow = "0 0 7px #c7f7ae";

            }
            else{
                d.style.boxShadow = "0 0 7px red";


            }
            break;
			case "c_pass":
				var pass1 = document.getElementById("pass").value;
				var pass2 = d.value;
				if(pass1 == pass2){
					d.style.boxShadow = "0 0 7px #c7f7ae";

				}
				else{
					d.style.boxShadow = "0 0 7px red";

				}
				break;
			case "f_name":
					var name=  d.value;
					var nameRegExp = /^[a-zA-Z ]*$/g;
					
					if(nameRegExp.test(name)  ){
						
						d.style.boxShadow = "0 0 7px #c7f7ae";

					}
						
					else{
							d.style.boxShadow = "0 0 7px red";
												
							
					}
					break;
			case "u_name":
				var uname=  d.value;
				var unameRegExp = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
				
				if(unameRegExp.test(uname)){
					d.style.boxShadow = "0 0 7px #c7f7ae";

					
				}
						
				else{
							
					d.style.boxShadow = "0 0 7px red";

							
				}
				break;	
					
					
		}				
				
	}
			
