


document.addEventListener('DOMContentLoaded', function () {
    const openModalBtn = document.getElementById('create-btn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('modal');

    openModalBtn.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    closeModalBtn.addEventListener('click', () => {
        drop_modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});





document.addEventListener('DOMContentLoaded', function () {
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('Exit');
    const drop_modal = document.getElementById('myModal');

    openModalBtn.addEventListener('click', () => {
        drop_modal.style.display = 'block';
    });

    closeModalBtn.addEventListener('click', () => {
        drop_modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            drop_modal.style.display = 'none';
        }
    });
});





