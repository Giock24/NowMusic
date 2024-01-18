const hashtag = [];

var addHastag = function(event) {
    var inputHastag = document.getElementById('hashtag');
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

var _addHashtagToList = function (newHashtag){
    var addedHashtag = document.getElementById('added-hashtags');
    var newHashtagElement = document.createElement('li');
    var p = document.createElement('p');
    p.innerHTML = newHashtag;
    var icon = document.createElement('i');
    icon.classList.add('bi');
    icon.classList.add('bi-x-lg');
    newHashtagElement.appendChild(p);
    newHashtagElement.appendChild(icon);
    newHashtagElement.addEventListener('click', removeHashtag);
    addedHashtag.appendChild(newHashtagElement);
}

var _updateForm = function() {
    var form = document.getElementById('add-content');
    var lastTag = hashtag[hashtag.length - 1];

    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'hashtags[]');
    input.setAttribute('value', lastTag);
    form.appendChild(input);
}


var removeHashtag = function(event) {
    var target = event.target;
    if(event.target.tagName == 'P' || event.target.tagName == 'I') {
        target = event.target.parentElement;
    }
    var p = target.querySelector('p');
    var index = hashtag.indexOf(p.innerHTML);
    hashtag.splice(index, 1);

    //remove hashtag in list
    var addedHashtag = document.getElementById('added-hashtags');
    addedHashtag.removeChild(target);

    //remove hashtag from form
    var form = document.getElementById('add-content');
    var input = form.querySelectorAll('input[type="hidden"]');
    input[index].remove();
}