function createCookie(name, value, days) {
    let expires;
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" +
    encodeURIComponent(value) + expires + "; path=/";
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

function cookie_exist(name){
    return document.cookie.split(';').some(c => {
        return c.trim().startsWith(name + '=');
    });
}

function delete_cookie(name, path) {
    if( cookie_exist( name ) ) {
      document.cookie = name + "=" +
        ((path) ? ";path="+path:"")+
        ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
    }
}


export {createCookie, getCookie, delete_cookie};