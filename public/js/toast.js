class Toast {
    constructor() {
        this.container = document.createElement('div');
        this.container.className = 'toast-container';
        document.body.appendChild(this.container);
    }

    show(message, type = 'success', duration = 3000) {
        const toast = document.createElement('div');
        toast.className = `toast ${type}`;

        let icon = '';
        switch (type) {
            case 'success':
                icon = 'check-circle';
                break;
            case 'error':
                icon = 'times-circle';
                break;
            case 'warning':
                icon = 'exclamation-circle';
                break;
        }

        toast.innerHTML = `
            <i class="fas fa-${icon} toast-icon"></i>
            <div class="toast-message">${message}</div>
            <i class="fas fa-times toast-close"></i>
        `;

        this.container.appendChild(toast);

        const close = toast.querySelector('.toast-close');
        close.addEventListener('click', () => this.dismiss(toast));

        setTimeout(() => this.dismiss(toast), duration);
    }

    dismiss(toast) {
        toast.style.animation = 'fadeOut 0.3s ease-in-out forwards';
        setTimeout(() => {
            if (toast.parentElement) {
                toast.parentElement.removeChild(toast);
            }
        }, 300);
    }
}

// Criar instância global do Toast
window.toast = new Toast(); 