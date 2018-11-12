xhr = new XMLHttpRequest();
function check(){
	xhr.onreadystatechange = userUpdate;
	xhr.open("GET", "../php/club_registration.php", true);
	xhr.send();
}
function userUpdate(){
	if(this.readyState == 4 && this.status == 200){
		var res = this.responseText;
		resA=res.split(';');
		document.getElementById("name").innerHTML = resA[0];
		
		if(resA[1]=="M")
		{
			var d=document.getElementById("extradiv");
			d.style.visibility="visible";
			d.style.color="red";
			d.innerHTML="You are member of the club";			
		}
		else if(resA[1]=="A")
		{
			var d=document.getElementById("extradiv");
			d.style.visibility="visible";
			d.style.color="red";
			d.innerHTML="Registered";			
		}
		else
		{
			var d=document.getElementById("formdisplay");
			d.style.visibility="visible";			
		}
	}
}
