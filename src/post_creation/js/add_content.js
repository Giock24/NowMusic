const hashtag = [];

var addHastag = function(event) {
    var inputHastag = document.getElementById('hashtag');
    hashtag.push(inputHastag.value);
    inputHastag.value = '';

    //show added hashtag in a paragraph
    var addedHashtag = document.getElementById('added-hashtag');
    addedHashtag.innerHTML = hashtag.join(' ');

    _updateForm();
};

var _updateForm = function() {
    var form = document.getElementById('add-content');
    hashtag.forEach(function(tag) {
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'hashtags[]');
        input.setAttribute('value', tag);
        form.appendChild(input);
    });
}