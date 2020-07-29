// var z = document.getElementsByClassName("cross");
// z[0].addEventListener("click", function()
// 	{
// 		document.querySelector('.modal').style.display='none';
// 		// alert("Bye");
// 	}
// );

// var x = document.getElementsByClassName("ques");
// x[0].addEventListener("click", function()
// 	{
// 		document.querySelector('.modal').style.display="block";
// 	}
// );

$('.cross').click(function(){
	$('.modal').fadeOut(300);
});

$('.ques').click(function(){
	$('.modal').fadeIn(300);
});

