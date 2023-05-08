var links = document.getElementsByTagName("a"),
i = 0, l = links.length,
body = document.body;

for(; i < l; i++) {
    links[i].addEventListener("click",function(){
        body.className = "page-loading";
        setTimeout(function(){
            body.className = "";
        },3000);
    },false);
}

window.addEventListener("beforeunload",function(e){
    document.body.className = "page-loading";
},false);