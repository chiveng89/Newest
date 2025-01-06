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


document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('max-w-full', 'max-h-full', 'object-contain'); // Ensure the image fits within the container

            // Create the remove button
            const removeButton = document.createElement('i');
            removeButton.classList.add('fa-regular', 'fa-circle-xmark', 'absolute', 'top-0', 'right-0', 'cursor-pointer', 'text-red-500', 'hover:text-red-700');
            removeButton.addEventListener('click', function() {
                const preview = document.getElementById('imagePreview');
                preview.innerHTML = ''; // Clear the image preview
            });

            const preview = document.getElementById('imagePreview');
            preview.innerHTML = ''; // Clear previous content
            preview.appendChild(img);
            preview.appendChild(removeButton); // Add the remove button
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('image').click(); // Trigger file input click
});
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
