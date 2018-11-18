var checkName = 0;
    	var checkMail = 0;
    	var checkPass = 0;
    	var checkUSN = 0;
		var checkNumber=0;
     	function nameCheck(){
    		name = document.getElementById('name').value;
			if(!name)
			{
				check = document.getElementById('check1');
				check.innerHTML = "Enter Name";
				check.style.color = 'red';
				checkName = 0;
			}
    		else
			{
				check = document.getElementById('check1');
				check.innerHTML = "";
				checkName = 1;
				
			}
    	}
		function validateNumber(){
    		number = document.getElementById('number').value;
			if(!number)
			{
				check = document.getElementById('check6');
				check.innerHTML = "Enter Number";
				check.style.color = 'red';
				checkNumber = 0;
			}
    		else
			{
				check = document.getElementById('check6');
				check.innerHTML = "";
				checkNumber = 1;
				
			}
    	}
    	
    	function emailCheck(){
    		email = document.getElementById('email').value;
    		xhr2 = new XMLHttpRequest();
			xhr2.onreadystatechange = checkEmail; // not sure if i can pass an argument
			xhr2.open("POST", "../php/check.php", true);
			xhr2.setRequestHeader("Content-type","application/x-www-form-urlencoded")
			xhr2.send("email="+email);
    	}
    	function checkEmail(){
    		check = document.getElementById('check3');
    		if(this.readyState == 4 && this.status == 200){
				var res = this.responseText;
				if(res == '-1'){
					check.innerHTML = "Email already exists!";
					check.style.color = 'red';
					checkMail = 0;

				}
				else{
					check.innerHTML = "Email is valid!";
					check.style.color = 'green';
					checkMail = 1;
				}
			}
    	}
    	function USNcheck(){
    		usn = document.getElementById('usn').value;
 			xhr3 = new XMLHttpRequest();
			xhr3.onreadystatechange = checkusn; // not sure if i can pass an argument
			xhr3.open("POST", "../php/check.php", true);
			xhr3.setRequestHeader("Content-type","application/x-www-form-urlencoded")
			xhr3.send("usn="+usn);
    	}
    	function checkusn(){
    		check = document.getElementById('check2');
    		if(this.readyState == 4 && this.status == 200){
				var res = this.responseText;
				if(res == '-1'){
					check.innerHTML = "USN already exists!";
					check.style.color = 'red';
					console.log(check);
					checkUSN = 0;

				}
				else{
					check.innerHTML = "USN is valid!";
					check.style.color = 'green';
					checkUSN = 1;
				}
			}
    	}
    	function request(){
    		name = document.getElementById("name").value;
    		usn = document.getElementById('usn').value;
    		email = document.getElementById('email').value;
    		number = document.getElementById('number').value;
    		validatePass();
    		if(checkMail && checkPass && checkName && checkUSN && checkNumber){
    				console.log("Finally everything perfect!")
    				//swetha
					f=document.getElementById('signup-form');
					f.submit();
					

    		}
    		if(!name){
    			check = document.getElementById("check1");
    			check.innerHTML = "Name cannot be empty";

    			check.style.color = 'red';
    		}
    		else{
    			//$("#check1").empty();
    			nameCheck();
    		}
    		if(!usn){
    			check = document.getElementById("check2");
    			check.innerHTML = "USN cannot be empty";

    			check.style.color = 'red';
    		}
    		else{
    			//$("#check2").empty();
    			USNcheck();
    		}
    		if(!email){
    			check = document.getElementById("check3");
    			check.innerHTML = "Email cannot be empty";

    			check.style.color = 'red';
    		}
    		else{
    			//$("#check3").empty()
    			validateEmail();
    		}
			if(!number){
    			check = document.getElementById("check6");
    			check.innerHTML = "Number cannot be empty";

    			check.style.color = 'red';
    		}
    		else{
    			
    			validateNumber();
    		}
    		}
    	function validateEmail(){
    		email = document.getElementById('email').value;
    		var re = /\S+@\S+\.\S+/;
    		if(!(re.test(email))){
    				check = document.getElementById("check3");
    				check.innerHTML = "Enter a valid email";
    				check.style.color = 'red';
    		}
    		else{
    			//$("#check3").empty();
    			emailCheck();
    		}

    	}
    	function validateusn(){
    		usn = document.getElementById('usn').value;
    	
			if(!usn)
			{
				check = document.getElementById('check2');
				check.innerHTML = "Enter USN";
				check.style.color = 'red';
				checkName = 0;
			}
    		else
			{
				//$("#check3").empty();
				check = document.getElementById('check2');
				check.innerHTML = "";
    			USNcheck();
				
			}
		
    	}
    	function validatePass(){
    		check4 = document.getElementById('check4');
    		if(re_password.value != password.value){
    			check4.innerHTML = "Passwords don't match";
    			check4.style.color = 'red';
    		}
    		else{
    			if(password.value){
    					check4.innerHTML = "Passwords match!";
    					check4.style.color = 'green';
    					checkPass = 1;
    			}
    			else{
    					check4.innerHTML = "Password cannot be empty!";
    					check4.style.color = 'red';
    					checkPass = 0;
    				}

    		}

    	}
