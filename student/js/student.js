
xhr = new XMLHttpRequest();
function check(){
	xhr.onreadystatechange = userUpdate;
	xhr.open("POST", "../php/index.php", true);
	xhr.send();
}
function userUpdate(){
	if(this.readyState == 4 && this.status == 200){
		var res = this.responseText;
		b = res.split(';')
		console.log(b);
		document.getElementById("name").innerHTML = "Name:"+b[0];
		document.getElementById("usn").innerHTML = "USN:"+b[1];
	}
}
if ('addEventListener' in window) {
	window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
		document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
}
	
function events()
{
	window.location="../../notifications/php/notify.php";
}
function clubs()
{
	window.location="../../clubs/html/clubNames.html";
}
