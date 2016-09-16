function nuevoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}

if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}

function time(){
	ajax=nuevoAjax();
	//var uid = <?php echo $idUserL; ?>;
	var uid = uid;
	//ajax.open("GET", "notification_status.php?"+"uid="+uid,true);
	ajax.open("GET","notification_status.php",true);
	ajax.onreadystatechange=function() {
	if (ajax.readyState==4) {
			document.getElementById('echos').innerHTML = ajax.responseText;
		}else{
			document.getElementById('echos').innerHTML = '<b>Checking Notes and Tasks...</b>';
		}
	}
	ajax.send(null)
	setTimeout('time();',5000);
}
