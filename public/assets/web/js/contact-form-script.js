/*==============================================================*/
// Fria Contact Form  JS
/*==============================================================*/
(function ($) {
"use strict"; // Start of use strict
$("#contactForm").validator().on("submit", function (event) {
if (event.isDefaultPrevented()) {
// handle the invalid form...
formError();
submitMSG(false, "Did you fill in the form properly?");
}
});


function formError(){
$("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
$(this).removeClass();
});
}

function submitMSG(valid, msg){
if(valid){
var msgClasses = "h4 tada animated text-success";
} else {
var msgClasses = "h4 text-danger";
}
$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}
}(jQuery)); // End of use strict
