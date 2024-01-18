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
    var addedHashtag = document.getElementById('added-hashtags');
    var newHashtagElement = document.createElement('li');
    newHashtagElement.innerHTML = newHashtag;
    newHashtagElement.addEventListener('click', removeHashtag);
    addedHashtag.appendChild(newHashtagElement);

    //add hashtag to form
    _updateForm();
};

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
    var index = hashtag.indexOf(event.target.innerHTML);
    console.log(hashtag);
    hashtag.splice(index, 1);
    console.log(hashtag);

    //remove hashtag in list
    var addedHashtag = document.getElementById('added-hashtags');
    addedHashtag.removeChild(event.target);

    //remove hashtag from form
    var form = document.getElementById('add-content');
    var input = form.querySelectorAll('input[type="hidden"]');
    input[index].remove();
}