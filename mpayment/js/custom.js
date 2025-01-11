
    function displayFileName() {
        const fileInput = document.getElementById('image');
        const filenameSpan = document.getElementById('filename');
        if (fileInput.files.length > 0) {
            filenameSpan.innerText = fileInput.files[0].name;
        } else {
            filenameSpan.innerText = '';
        }
    }
