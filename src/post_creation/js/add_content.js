const hashtag = [];

let addHastag = function(event) {
    let inputHastag = document.getElementById('hashtag');
    newHashtag = inputHastag.value.split(" ")[0];
    if (newHashtag[0] != '#') {
        newHashtag = '#' + newHashtag;
    }
    hashtag.push(newHashtag);
    inputHastag.value = '';

    //show added hashtag in list
    _addHashtagToList(newHashtag);

    //add hashtag to form
    _updateForm();
};

let _addHashtagToList = function (newHashtag){
    let addedHashtag = document.getElementById('added-hashtags');
    let newHashtagElement = document.createElement('li');
    let p = document.createElement('p');
    p.innerHTML = newHashtag;
    let icon = document.createElement('i');
    icon.classList.add('bi');
    icon.classList.add('bi-x-lg');
    newHashtagElement.appendChild(p);
    newHashtagElement.appendChild(icon);
    newHashtagElement.addEventListener('click', removeHashtag);
    addedHashtag.appendChild(newHashtagElement);
}

let _updateForm = function() {
    let form = document.getElementById('add-content');
    let lastTag = hashtag[hashtag.length - 1];

    let input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'hashtags[]');
    input.setAttribute('value', lastTag);
    form.appendChild(input);
}


let removeHashtag = function(event) {
    let target = event.target;
    if(event.target.tagName == 'P' || event.target.tagName == 'I') {
        target = event.target.parentElement;
    }
    let p = target.querySelector('p');
    let index = hashtag.indexOf(p.innerHTML);
    hashtag.splice(index, 1);

    //remove hashtag in list
    let addedHashtag = document.getElementById('added-hashtags');
    addedHashtag.removeChild(target);

    //remove hashtag from form
    let form = document.getElementById('add-content');
    let input = form.querySelectorAll('input[type="hidden"]');
    input[index].remove();
}