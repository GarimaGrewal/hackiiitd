function validateForm(d){
	var input = d.getAttribute('id');
	//console.log(input.toLowerCase());
	switch(input.toLowerCase()){
		case "id":
			var emailStr = d.value;
			var emailRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/﻿;
			if(emailRegExp.test(emailStr)){
				d.style.boxShadow = "0 0 7px #c7f7ae";

			}
			else{
				d.style.boxShadow = "0 0 7px red";							

			}
				break;
        
			case "name":
					var name=  d.value;
					var nameRegExp = /^[a-zA-Z ]*$/g;
					
					if(nameRegExp.test(name)  ){						
						d.style.boxShadow = "0 0 7px #c7f7ae";
					}
						
					else{
							d.style.boxShadow = "0 0 7px red";											
							
					}
					break;
			case "mno":
				var phone_no = d.value;
				var length = phone_no.length;
				var phoneRegExp = /\D+/g;
				if(length<10 || phoneRegExp.test(phone_no)){
					d.style.boxShadow = "0 0 7px red";
				}
				else{
					d.style.boxShadow = "0 0 7px #c7f7ae";
				}
					break;
			case "year":
				var year = d.value;
				var yearRegExp = /\D+/g;
				if(yearRegExp.test(year)){
					d.style.boxShadow = "0 0 7px red";
				}
				else{
					d.style.boxShadow = "0 0 7px #c7f7ae";
				}
					break;
					
					
		}				
				
	}
			
