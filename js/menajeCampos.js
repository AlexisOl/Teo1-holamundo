function validateField(fieldName, errorMessageId) {
    const field = document.getElementById(fieldName);
    const errorDiv = document.getElementById(errorMessageId);
    
    if (field.value.trim() === '') {
        errorDiv.style.display = 'block';
        errorDiv.classList.add('error-message-active');
    } else {
        errorDiv.style.display = 'none';
        errorDiv.classList.remove('error-message-active');
    }
}
