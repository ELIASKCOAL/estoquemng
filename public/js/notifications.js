class NotificationManager {
    constructor() {
        this.notificationContainer = null;
        this.createNotificationContainer();
    }

    createNotificationContainer() {
        if (!this.notificationContainer) {
            this.notificationContainer = document.createElement('div');
            this.notificationContainer.className = 'notification';
            document.body.appendChild(this.notificationContainer);
        }
    }

    show(type, title, message) {
        const icon = type === 'success' ? 'check-circle' : 'exclamation-circle';
        
        this.notificationContainer.innerHTML = `
            <i class="fas fa-${icon} notification-icon ${type}"></i>
            <div class="notification-content">
                <div class="notification-title">${title}</div>
                <div class="notification-message">${message}</div>
            </div>
            <button class="notification-close">
                <i class="fas fa-times"></i>
            </button>
        `;

        // Add click handler for close button
        this.notificationContainer.querySelector('.notification-close').addEventListener('click', () => {
            this.hide();
        });

        // Show notification
        this.notificationContainer.classList.add('show');

        // Auto-hide after 5 seconds
        setTimeout(() => this.hide(), 5000);
    }

    hide() {
        this.notificationContainer.classList.remove('show');
    }
}

// Initialize notification manager
const notificationManager = new NotificationManager();

// Handle form submissions
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form[data-submit-type="ajax"]');
    
    forms.forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (response.ok) {
                    notificationManager.show('success', 'Sucesso!', result.message || 'Operação realizada com sucesso.');
                    
                    // Redirect after successful submission if specified
                    if (form.dataset.redirectUrl) {
                        setTimeout(() => {
                            window.location.href = form.dataset.redirectUrl;
                        }, 1500);
                    }
                } else {
                    throw new Error(result.message || 'Ocorreu um erro ao processar a solicitação.');
                }
            } catch (error) {
                notificationManager.show('error', 'Erro!', error.message);
            }
        });
    });
}); 