const hashtag = [];

var addHastag = function(event) {
    var inputHastag = document.getElementById('hashtag');
    hashtag.push(inputHastag.value);
    inputHastag.value = '';

    //show added hashtag in a paragraph
    var addedHashtag = document.getElementById('added-hashtags');
    addedHashtag.innerHTML = hashtag.join(' ');

    //add hashtag to form
    _updateForm();
};

var _updateForm = function() {
    var form = document.getElementById('add-content');

    var lastTag = hashtag[hashtag.length - 1];

    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'hashtags');
    input.setAttribute('value', lastTag);
    form.appendChild(input);
}