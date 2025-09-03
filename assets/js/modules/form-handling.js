export function initFormHandling() {
  const forms = document.querySelectorAll("form");

  forms.forEach((form) => {
    form.addEventListener("submit", handleFormSubmit);

    const inputs = form.querySelectorAll("input, textarea");
    inputs.forEach((input) => {
      input.addEventListener("blur", validateField);
      input.addEventListener("input", clearFieldError);
    });
  });
}

function handleFormSubmit(e) {
  e.preventDefault();

  const form = e.target;
  const submitButton = form.querySelector('button[type="submit"]');

  if (!validateForm(form)) {
    return false;
  }

  if (submitButton) {
    submitButton.disabled = true;
    submitButton.innerHTML = "Wird gesendet...";
    submitButton.classList.add("is-loading");
  }

  setTimeout(() => {
    showFormMessage(
      form,
      "Vielen Dank! Ihre Nachricht wurde gesendet.",
      "success"
    );
    form.reset();

    if (submitButton) {
      submitButton.disabled = false;
      submitButton.innerHTML = "Senden";
      submitButton.classList.remove("is-loading");
    }
  }, 2000);
}

function validateForm(form) {
  let isValid = true;
  const requiredFields = form.querySelectorAll("[required]");

  requiredFields.forEach((field) => {
    if (!validateField({ target: field })) {
      isValid = false;
    }
  });

  return isValid;
}

function validateField(e) {
  const field = e.target;
  const value = field.value.trim();
  let isValid = true;
  let errorMessage = "";

  if (field.hasAttribute("required") && !value) {
    errorMessage = "Dieses Feld ist erforderlich";
    isValid = false;
  }

  if (field.type === "email" && value) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(value)) {
      errorMessage = "Bitte geben Sie eine gültige E-Mail-Adresse ein";
      isValid = false;
    }
  }

  if (field.type === "tel" && value) {
    const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    if (!phoneRegex.test(value)) {
      errorMessage = "Bitte geben Sie eine gültige Telefonnummer ein";
      isValid = false;
    }
  }

  if (!isValid) {
    showFieldError(field, errorMessage);
  } else {
    clearFieldError({ target: field });
  }

  return isValid;
}

function showFieldError(field, message) {
  field.classList.add("has-error");

  let errorElement = field.parentNode.querySelector(".field-error");
  if (!errorElement) {
    errorElement = document.createElement("span");
    errorElement.classList.add("field-error");
    field.parentNode.appendChild(errorElement);
  }

  errorElement.textContent = message;
}

function clearFieldError(e) {
  const field = e.target;
  field.classList.remove("has-error");

  const errorElement = field.parentNode.querySelector(".field-error");
  if (errorElement) {
    errorElement.remove();
  }
}

function showFormMessage(form, message, type = "info") {
  let messageElement = form.querySelector(".form-message");
  if (!messageElement) {
    messageElement = document.createElement("div");
    messageElement.classList.add("form-message");
    form.appendChild(messageElement);
  }

  messageElement.className = `form-message form-message--${type}`;
  messageElement.textContent = message;
  messageElement.style.display = "block";

  setTimeout(() => {
    messageElement.style.display = "none";
  }, 5000);
}