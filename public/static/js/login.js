$(function(){
	$('#username').focus().blur(checkName);
	$('#password').blur(checkPassword);
});

function checkName(){
	var name = $('#username').val();
	if(name == null || name == ""){
		//提示错误
		$('#count-msg').html("username cannot be blank");
		return false;
	}
	var reg = /^\w{3,10}$/;
	if(!reg.test(name)){
		$('#count-msg').html("Enter 3-10 letters or numbers");
		return false;
	}
	$('#count-msg').empty();
	return true;
}

function checkPassword(){
	var password = $('#password').val();
	if(password == null || password == ""){
		//提示错误
		$('#password-msg').html("password can not be blank");
		return false;
	}
	var reg = /^\w{3,10}$/;
	if(!reg.test(password)){
		$('#password-msg').html("Enter 3-10 letters or numbers");
		return false;
	}
	$('#password-msg').empty();
	return true;
}

function submitLogin() {
    var name = $('#username').val();
    var password = $('#password').val();
    if(name == password) {
        alert("Login sucessful");
        window.open("/BILIBILI_WKU/index/view/searchVideo.html");
    }else {
        alert("Login failed");
    }
}

