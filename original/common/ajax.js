// Get the HTTP Object
function getHTTPObject(){
	if (window.ActiveXObject) 
		return new ActiveXObject("Microsoft.XMLHTTP");
	else if (window.XMLHttpRequest) 
		return new XMLHttpRequest();
	else {
		alert("Your browser does not support AJAX.");
		return null;
	}
}

//Star
function starItem(a, b, c){
	httpObject = getHTTPObject();
	if (httpObject != null) {
		httpObject.open("GET", "star.php?uid="+a+"&refid="+b, true);
		httpObject.send(null);
		httpObject.onreadystatechange=function() {
			if(httpObject.readyState == 4) {
				d=document.getElementById('star_item'+c)
				d.innerHTML=((d.innerHTML=="<b>Starred</b>") ? "StarIt" : "<b>Starred</b>");
			}
		}
	}
}

//changeStatus
function updateTaskStatus(tid, status, j, recipient){
	httpObject = getHTTPObject();
	if (httpObject != null) {
		httpObject.open("GET", "update_task.php?id="+tid+"&status="+status+"&j="+j+"&recipient="+recipient, true);
		httpObject.send(null);
		httpObject.onreadystatechange=function() {
			if(httpObject.readyState == 4) {
				d=document.getElementById('update_status'+j)
				d.innerHTML=httpObject.responseText;
			}
		}
	}
}

 var httpObject = null;
