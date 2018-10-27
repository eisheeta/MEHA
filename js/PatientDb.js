function accessgranted(){

	document.getElementById('but1').setAttribute('disabled',true); 
	document.getElementById('but2').setAttribute('disabled',false); 
}

function accessdenied(){

	document.getElementById('but2').setAttribute('disabled',true); 
	document.getElementById('but1').setAttribute('disabled',false);

}