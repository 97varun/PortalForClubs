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




