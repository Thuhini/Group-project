var x;
var upmodal;
var editbtn;
var upspan;
function reply(cliked_id){
    x = cliked_id;
    upmodal = document.getElementById('myModalupdate');
    editbtn= document.getElementsByClassName("button1")[x];
    upspan = document.getElementById("upclose");
    upmodal.style.display = "block";
}

upspan.onclick = function() {
    upmodal.style.display = "none";

}
window.onclick = function(event) {
    if (event.target == upmodal) {
        upmodal.style.display = "none";
    }
}
