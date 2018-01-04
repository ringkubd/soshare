$("#facebookShareLink").on("click",function(){
    var fbpopup = window.open("https://www.facebook.com/sharer/sharer.php?u=http://stackoverflow.com", "pop", "width=600, height=400, scrollbars=no");
    return false;
});