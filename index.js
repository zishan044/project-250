let username = document.getElementById('username');
let pass1 = document.getElementById('pass1');
let pass2 = document.getElementById('pass2');
let email = document.getElementById('email');

username.addEventListener('onblur',()=>{
	if (strlength(username)< 7) {
		username.addList('onblur').background.color('red');

	}
});