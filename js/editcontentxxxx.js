var editBtn = document.getElementById('editBtn');
var editables = document.querySelectorAll('#headings, #paragraphs')
var editImg = document.getElementById('inputImg');

editBtn.addEventListener('click', function(e) {
  if (!editables[0].isContentEditable) {
    for (var i = 0; i < editables.length; i++) {
      editables[i].contentEditable = 'true';
    }
    editImg.style.visibility = 'visible';
    editBtn.innerHTML = 'Save Changes';
    editBtn.style.backgroundColor = '#6F9';
  } else {
    // Disable Editing
    for (var i = 0; i < editables.length; i++) {
      editables[i].contentEditable = 'false';
    }
    editImg.style.visibility = 'hidden';
    // Change Button Text and Color
    editBtn.innerHTML = 'Enable Editing';
    editBtn.style.backgroundColor = '#F96';
    // Save the data in localStorage 
    for (var i = 0; i < editables.length; i++) {
      localStorage.setItem(editables[i].getAttribute('id'), editables[i].innerHTML);
    }
  }
});