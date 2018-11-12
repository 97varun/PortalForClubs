xhr = new XMLHttpRequest();




function check(){
	xhr.onreadystatechange = userUpdate;
	xhr.open("POST", "../php/admin.php", true);
	xhr.send();
	
}
function userUpdate(){
	if(this.readyState == 4 && this.status == 200){
		var res = this.responseText;
		b = res.split(';')
		//console.log(b);
		document.getElementById("name").innerHTML = "Name:"+b[0];
		document.getElementById("usn").innerHTML = "USN:"+b[1];
	}
}


function createjoinform()
{
	x = new XMLHttpRequest();
	x.onreadystatechange = createstatuscheck;
	x.open("GET", "../php/createjoinform.php", true);
	x.send();
	console.log("here");
	
}

function createstatuscheck(){
	if(this.readyState == 4 && this.status == 200){
		var res = this.responseText;
		console.log(res);
		if(res==0)
		{
			
			var hdiv=document.getElementById("hdiv");
			hdiv.innerHTML="";
			hdiv.style.visibility="visible";
			hdiv.style.color="green";
			hdiv.innerHTML="Form created" ;
			setTimeout(clear,2000);
		}
		else
		{
			var hdiv=document.getElementById("hdiv");
			hdiv.style.visibility="visible";
			hdiv.style.color="red";
			hdiv.innerHTML="Form already exists" ;
			setTimeout(clear,2000);
		}
		x.abort();
	}
}

function clear()
{
	
	var hdiv=document.getElementById("hdiv");
	hdiv.style.visibility="hidden";
	hdiv.innerHTML="" ;
	
}


function removejoinform()
{
	y = new XMLHttpRequest();
	y.onreadystatechange = removestatuscheck;
	y.open("GET", "../php/removejoinform.php", true);
	y.send();
	console.log("here");
	
}

function removestatuscheck(){
	if(this.readyState == 4 && this.status == 200){
		var res = this.responseText;
		console.log(res);
		console.log(res);
		if(res==0)
		{
			console.log(res);
			var hdiv=document.getElementById("hdiv");
			hdiv.innerHTML="";
			hdiv.style.visibility="visible";
			hdiv.style.color="red";
			hdiv.innerHTML="Form is not created" ;
			setTimeout(clear,2000);
		}
		else
		{
			console.log(res);
			var hdiv=document.getElementById("hdiv");
			hdiv.style.visibility="visible";
			hdiv.style.color="green";
			hdiv.innerHTML="Form removed" ;
			setTimeout(clear,2000);
		}
		y.abort();
	}
}
