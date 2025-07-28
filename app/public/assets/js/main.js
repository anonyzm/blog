// Основной JavaScript файл для IT Solutions Blog

document.addEventListener('DOMContentLoaded', function() {
    console.log('IT Solutions Blog загружен!');
    
    // Инициализация анимаций
    initAnimations();
    
    // Инициализация навигации
    initNavigation();
    
    // Инициализация интерактивности
    initInteractivity();
});

// Анимации появления элементов
function initAnimations() {
    // Анимация для элементов с классом fade-in
    const fadeElements = document.querySelectorAll('.fade-in');
    const slideElements = document.querySelectorAll('.slide-up');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Настройка начального состояния для fade-in элементов
    fadeElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(element);
    });
    
    // Настройка начального состояния для slide-up элементов
    slideElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.5s ease-out, transform 0.5s ease-out';
        observer.observe(element);
    });
}

// Навигация
function initNavigation() {
    // Плавная прокрутка для якорных ссылок
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Добавление активного класса к текущей странице в навигации
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
    });
}

// Интерактивность
function initInteractivity() {
    // Анимация при наведении на посты
    const postItems = document.querySelectorAll('.post-item');
    postItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Анимация кнопок
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Функция для копирования ссылки
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            console.log('Ссылка скопирована в буфер обмена');
        }).catch(function(err) {
            console.error('Ошибка при копировании: ', err);
        });
    }
    
    // Добавление кнопки "Поделиться" к постам
    const postContent = document.querySelector('.post-content');
    if (postContent) {
        const shareButton = document.createElement('button');
        shareButton.textContent = 'Поделиться';
        shareButton.className = 'btn btn-share';
        shareButton.style.marginTop = '1rem';
        
        shareButton.addEventListener('click', function() {
            copyToClipboard(window.location.href);
            this.textContent = 'Скопировано!';
            setTimeout(() => {
                this.textContent = 'Поделиться';
            }, 2000);
        });
        
        postContent.appendChild(shareButton);
    }
    
    // Анимация заголовков при скролле
    const titles = document.querySelectorAll('.post-title, .section-title, .hero-title');
    const titleObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateX(0)';
            }
        });
    }, { threshold: 0.5 });
    
    titles.forEach(title => {
        title.style.opacity = '0';
        title.style.transform = 'translateX(-20px)';
        title.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        titleObserver.observe(title);
    });
}

// Дополнительные утилиты
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Обработка изменения размера окна
window.addEventListener('resize', debounce(function() {
    // Пересчет позиций элементов при изменении размера окна
    console.log('Размер окна изменен');
}, 250));

// Добавление класса для мобильных устройств
function detectMobile() {
    if (window.innerWidth <= 768) {
        document.body.classList.add('mobile');
    } else {
        document.body.classList.remove('mobile');
    }
}

// Вызов при загрузке и изменении размера окна
detectMobile();
window.addEventListener('resize', detectMobile); 