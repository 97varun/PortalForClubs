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
