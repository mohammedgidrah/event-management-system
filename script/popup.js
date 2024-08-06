document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('profileForm');
    const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    const confirmSubmit = document.getElementById('confirmSubmit');
    form.addEventListener('submit', (event) => {
        event.preventDefault(); 
        modal.show(); 
    });
    confirmSubmit.addEventListener('click', () => {
        form.submit(); 
    });
});