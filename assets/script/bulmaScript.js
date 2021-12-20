const fileInput = document.querySelector('.file input[type=file]');
if (fileInput !== null) {
    fileInput.onchange = () => {
        if (fileInput.files.length > 0) {
            const fileName = document.querySelector('.file .file-name');
            fileName.textContent = fileInput.files[0].name;
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        const $notification = $delete.parentNode;

        $delete.addEventListener('click', () => {
            $notification.parentNode.removeChild($notification);
        });
    });
});
