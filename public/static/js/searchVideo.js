window.onload = function() {
    var str = window.location.href;
    var num=str.indexOf("=");
    str=str.substr(num+1);
    var url = "https://api.bilibili.com/x/v1/dm/list.so?oid="+str;

    alert(url);
}




