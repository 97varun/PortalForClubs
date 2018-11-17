function myFunction(x) {
    x.classList.toggle("change");
	nav=document.getElementById("myDropdown");
	if(nav.style.visibility=="hidden")
	{
		nav.style.visibility="visible";
	}
	else
	{
		nav.style.visibility="hidden";
	
	}
}