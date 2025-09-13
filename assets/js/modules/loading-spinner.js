// loading-spinner.js - Verbesserte Version
export function showLoadingSpinner() {
    console.log('Showing spinner...');
    const spinner = document.querySelector('.loading-spinner');

    if (spinner) {
        spinner.style.display = 'flex';
        spinner.offsetHeight; // Force reflow für Animation
        spinner.classList.add('show');
    } else {
        console.error('Loading spinner element not found');
    }
}

export function hideLoadingSpinner() {
    console.log('Hiding spinner...');
    const spinner = document.querySelector('.loading-spinner');

    if (spinner) {
        spinner.classList.remove('show');
        setTimeout(() => {
            spinner.style.transform = 'translateY(-100vh)';
        }, 300);
        setTimeout(() => {
            spinner.style.display = 'none';
        }, 600);
    } else {
        console.error('Loading spinner element not found');
    }
}
