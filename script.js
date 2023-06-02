// Toggle the menu on mobile devices
const menuToggle = document.getElementById('menu-toggle');
const menuContainer = document.querySelector('.menu-container');

menuToggle.addEventListener('change', () => {
  if (menuToggle.checked) {
    menuContainer.style.width = '300px';
  } else {
    menuContainer.style.width = '0';
  }
});

// Toggle edit form
const editButtons = document.querySelectorAll('.edit-review');
const editForms = document.querySelectorAll('.edit-form');

editButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const reviewId = button.getAttribute('data-review-id');
    const editForm = document.getElementById(`edit-form-${reviewId}`);
    editForm.classList.toggle('show-edit-form');
  });
});
