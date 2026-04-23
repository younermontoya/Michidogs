document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const steps = Array.from(document.querySelectorAll('.form-step'));
    const nextBtn = document.querySelector('.btn-next');
    const prevBtn = document.querySelector('.btn-prev');
    const submitBtn = document.querySelector('.btn-submit');
    let currentStep = 0;

    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            step.classList.toggle('active', index === stepIndex);
        });
        updateButtons();
    }

    function updateButtons() {
        prevBtn.disabled = currentStep === 0;
        nextBtn.disabled = !isStepValid();
        submitBtn.style.display = currentStep === steps.length - 1 ? 'block' : 'none';
    }

    function isStepValid() {
        const currentFormStep = steps[currentStep];
        const inputs = Array.from(currentFormStep.querySelectorAll('input, select'));
        // Check if all required inputs are filled
        return inputs.every(input => {
            if (input.required) {
                return input.value.trim() !== '';
            }
            return true;
        });
    }

    function validateStep() {
        updateButtons();
    }

    // Attach event listeners to all inputs in the current step for real-time validation
    function attachValidationListeners() {
        const inputs = Array.from(steps[currentStep].querySelectorAll('input, select'));
        inputs.forEach(input => {
            input.addEventListener('input', validateStep);
            input.addEventListener('change', validateStep);
        });
    }

    function removeValidationListeners() {
        const inputs = Array.from(steps[currentStep].querySelectorAll('input, select'));
        inputs.forEach(input => {
            input.removeEventListener('input', validateStep);
            input.removeEventListener('change', validateStep);
        });
    }

    nextBtn.addEventListener('click', function () {
        if (isStepValid()) {
            removeValidationListeners(); // Remove listeners from the current step before moving to the next
            currentStep += 1;
            showStep(currentStep);
            attachValidationListeners(); // Attach listeners to the new step
        } else {
            alert('Por favor, completa todos los campos requeridos.');
        }
    });

    prevBtn.addEventListener('click', function () {
        removeValidationListeners(); // Remove listeners from the current step before moving to the previous
        currentStep -= 1;
        showStep(currentStep);
        attachValidationListeners(); // Attach listeners to the new step
    });

    form.addEventListener('submit', function (event) {
        if (!isStepValid()) {
            event.preventDefault();
            alert('Por favor, completa todos los campos requeridos.');
        }
    });

    // Initialize wizard
    showStep(currentStep);
    attachValidationListeners(); // Attach listeners to the initial step
});
