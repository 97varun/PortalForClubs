if ('addEventListener' in window) {
	window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
		document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
}
$(function(){
    $(".bg-primary").each(function() {
		var colors=['#FF0000','#FFA500','#0000FF','#800080','#008000','#000000','#808080','#964B00','#D2B48C'];
		var hue=colors[Math.floor(Math.random() * colors.length)];
		$(this).css("background-color", hue);
		$(this).css("color", "white");
		$(this).css("font-weight"," bold");
    });
});
function edit_event()
{
	window.location="../../events/html/event.html";
}

function func ( srn,event_id)
{
xhr=new XMLHttpRequest();
console.log(srn);
console.log(event_id);
xhr.onreadystatechange=check_exist;
xhr.open("POST","../../events/php/register_event.php",true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded")
xhr.send("srn="+srn+"&event_id="+event_id);	

}

function check_exist()
{
	
	if(this.readyState==4 && this.status==200){
		var res=this.responseText;
		//console.log(res)
		if(res=="-1")
		{
			return false;
		}
		else if(res=="1")
			
		{	
 			return true;
		}
	
	}

}
