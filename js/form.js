/* ============================================
   THE OFFSET — Contact Form Validation
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('.contact-form');
  if (!form) return;

  const fields = {
    name: { el: form.querySelector('#name'), min: 2, message: 'Please enter your name.' },
    email: { el: form.querySelector('#email'), pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, message: 'Please enter a valid email address.' },
    project: { el: form.querySelector('#project'), min: 20, message: 'Please tell us a bit more about your project (min. 20 characters).' }
  };

  function showError(field, message) {
    clearError(field);
    field.el.classList.add('is-error');
    const error = document.createElement('span');
    error.classList.add('form-error');
    error.textContent = message;
    field.el.parentNode.appendChild(error);
  }

  function clearError(field) {
    field.el.classList.remove('is-error');
    const existing = field.el.parentNode.querySelector('.form-error');
    if (existing) existing.remove();
  }

  function validateField(field) {
    const value = field.el.value.trim();

    if (field.pattern && !field.pattern.test(value)) {
      showError(field, field.message);
      return false;
    }

    if (field.min && value.length < field.min) {
      showError(field, field.message);
      return false;
    }

    clearError(field);
    return true;
  }

  // Validate on blur
  Object.values(fields).forEach(field => {
    field.el.addEventListener('blur', () => validateField(field));
    field.el.addEventListener('input', () => {
      if (field.el.classList.contains('is-error')) {
        validateField(field);
      }
    });
  });

  // Validate on submit
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    let isValid = true;
    Object.values(fields).forEach(field => {
      if (!validateField(field)) isValid = false;
    });

    if (isValid) {
      // Show success state
      const formWrapper = form.closest('.contact-form-wrapper');
      formWrapper.innerHTML = `
        <div class="form-success reveal is-visible">
          <h3 class="headline-tertiary">Thank you.</h3>
          <p class="body-text mt-4">We will be in touch within 48 hours.</p>
        </div>
      `;
    }
  });
});
