window.onload = fetch();

var scrollbar = document.getElementById("chat-box");

fetchOnScroll();

function fetchOnScroll(){
	setInterval(function(){
		if(scrollbar.scrollTop == (scrollbar.scrollHeight - scrollbar.clientHeight)){
			fetch();
		}
	}, 1000);
}

function fetch(){
	var asyncReq;

	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		asyncReq = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE 8 and older
		asyncReq = new ActiveXObject("Microsoft.XMLHTTP");
	}

	asyncReq.open("GET", "read.php", true);

	asyncReq.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var chatBox = document.getElementById("chat-box");

			chatBox.innerHTML = this.responseText;
			chatBox.scrollTop = chatBox.scrollHeight;
		}
	}

	asyncReq.send();
}

var sendBtn = document.getElementsByTagName("button")[0];

sendBtn.addEventListener("click", function(e){
	e.preventDefault();
	send();
	fetch();

	/* var chatMessage = document.getElementsByTagName("textarea")[0].value;
	if(chatMessage == null || chatMessage == ""){
		alert("enter a message");
	}else{
		send();
		fetch();
	} */
	
});

function send(){
	var asyncReq;

	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
		asyncReq = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE 8 and older
		asyncReq = new ActiveXObject("Microsoft.XMLHTTP");
	}

	var data = "user_id=" + document.getElementsByTagName("input")[0].value + "&message=" + document.getElementsByTagName("textarea")[0].value;

	asyncReq.open("POST", "write.php", true);
	asyncReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	asyncReq.send(data);

	document.getElementsByTagName("textarea")[0].value = "";
}