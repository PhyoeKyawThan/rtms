const modal = document.getElementById("myModal")
const modal1 = document.getElementById("myModal1")
const btn = document.getElementById("modalBtn")
const btn1 = document.getElementById("modalBtn1")
const span = document.getElementsByClassName("close") [0]
const span1 = document.getElementsByClassName("close1") [0]
btn.onclick = function(){
    modal.style.display="block"
}
btn1.onclick = function(){
    modal.style.display="block"
}
span.onclick =function(){
    modal.style.display="none"
}
span1.onclick =function(){
    modal.style.display="none"
}
window.onclick=function(event){
    if(event.target==modal){
        modal.style.display="none"
    }
}
window.onclick=function(event){
    if(event.target==modal1){
        modal.style.display="none"
    }
}

