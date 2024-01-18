import { SHA1 } from "./sha1.js";

var crypt_pwd = document.getElementById("crypt_password");

//add event onChange
document.getElementById("password").addEventListener("input", function(){
    crypt_pwd.value = SHA1(this.value);
});