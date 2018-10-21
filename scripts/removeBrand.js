setTimeout(function(){ remove(); }, 800);
function remove(){
var elements = document.getElementsByTagName('div');
var length = document.getElementsByTagName('div').length;
var target = elements[length-1];
target.remove();

}