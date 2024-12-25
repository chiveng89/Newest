document.addEventListener('DOMContentLoaded', () => {
    const uploadInput = document.getElementById('upload-img');
    const imgPreview = document.getElementById('img-preview');
    const uploadArea = document.getElementById('upload-area');

    if (!uploadInput || !imgPreview || !uploadArea) {
        console.error("One or more required elements are missing in the DOM.");
        return;
    }

    // Function to trigger file input click
    function triggerUpload() {
        uploadInput.click();
    }

    // Function to handle file uploads
    function handleFileUpload(event) {
        const files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            addImagePreview(files[i]);
        }
    }

    // Function to add image preview
    function addImagePreview(file) {
        const template = imgPreview.querySelector('div.hidden').cloneNode(true);
        template.classList.remove('hidden');

        const img = template.querySelector('img');
        img.src = URL.createObjectURL(file);

        const removeBtn = template.querySelector('button');
        removeBtn.addEventListener('click', () => template.remove());

        imgPreview.appendChild(template);
    }

    // Attach event listeners
    uploadArea.addEventListener('click', triggerUpload);
    uploadInput.addEventListener('change', handleFileUpload);
});



//
document.addEventListener("DOMContentLoaded", init);

function init() {
    setupFileUpload();
    setupAdsToggle();
}

function setupFileUpload() {
    const dropzoneFileInput = document.getElementById("image");
    const dropzoneLabel = document.getElementById("dropzone-label");
    const placeholder = document.getElementById("placeholder");
    const previewImage = document.getElementById("preview-image");
    const removeImageIcon = document.getElementById("remove-image");

    if (!dropzoneFileInput || !dropzoneLabel || !placeholder || !previewImage || !removeImageIcon) {
        console.error("Required elements for file upload are missing.");
        return;
    }

    const handleFileUpload = (event) => {
        const file = event.target.files[0];

        if (file && ["image/jpeg", "image/png", "image/gif"].includes(file.type)) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.classList.remove("hidden");
                previewImage.style.opacity = 0;

                setTimeout(() => {
                    previewImage.style.opacity = 1;
                }, 50);

                placeholder.classList.add("hidden");
                removeImageIcon.classList.remove("hidden");
                dropzoneFileInput.disabled = true;
            };

            reader.readAsDataURL(file);
        } else {
            alert("Please upload a valid image file (JPG, PNG, or GIF).");
            dropzoneFileInput.value = "";
        }
    };

    const handleRemoveImage = () => {
        previewImage.style.opacity = 0;

        setTimeout(() => {
            previewImage.src = "";
            previewImage.classList.add("hidden");
            placeholder.classList.remove("hidden");
            removeImageIcon.classList.add("hidden");
            dropzoneFileInput.value = "";
            dropzoneFileInput.disabled = false;
        }, 300);
    };

    dropzoneLabel.addEventListener("click", () => {
        if (!dropzoneFileInput.disabled) {
            dropzoneFileInput.click();
        }
    });

    dropzoneFileInput.addEventListener("change", handleFileUpload);
    removeImageIcon.addEventListener("click", handleRemoveImage);
}

function setupAdsToggle() {
    const adsForm = document.getElementById("adsForm");

    if (!adsForm) {
        console.warn("adsForm element not found.");
        return;
    }

    const Ads_toggleForm = () => {
        console.log("Ads_toggleForm triggered");
        adsForm.classList.toggle("hidden");
    };

    window.Ads_toggleForm = Ads_toggleForm;
}
