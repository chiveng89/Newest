

const  fullscreenButton = document.getElementById('fullscreen-button');
       fullscreenButton.addEventListener('click', toggleFullscreen);
       function toggleFullscreen() {
       if (document.fullscreenElement) {
       // If already in fullscreen, exit fullscreen
       document.exitFullscreen();
       } else {
       // If not in fullscreen, request fullscreen
      document.documentElement.requestFullscreen();
    }
 }

// start: Sidebar

const sidebarToggle = document.querySelector('.sidebar-toggle')
const sidebarOverlay = document.querySelector('.sidebar-overlay')
const sidebarMenu = document.querySelector('.sidebar-menu')
const main = document.querySelector('.main')
sidebarToggle.addEventListener('click', function (e) {
e.preventDefault()
main.classList.toggle('active')
sidebarOverlay.classList.toggle('hidden')
sidebarMenu.classList.toggle('-translate-x-full')
})
sidebarOverlay.addEventListener('click', function (e) {
e.preventDefault()
main.classList.add('active')
sidebarOverlay.classList.add('hidden')
sidebarMenu.classList.add('-translate-x-full')
})
document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
item.addEventListener('click', function (e) {
   e.preventDefault()
   const parent = item.closest('.group')
   if (parent.classList.contains('selected')) {
       parent.classList.remove('selected')
   } else {
       document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
           i.closest('.group').classList.remove('selected')
       })
       parent.classList.add('selected')
   }
})
})
// end: Sidebar
// start: Popper
const popperInstance = {}
document.querySelectorAll('.dropdown').forEach(function (item, index) {
const popperId = 'popper-' + index
const toggle = item.querySelector('.dropdown-toggle')
const menu = item.querySelector('.dropdown-menu')
menu.dataset.popperId = popperId
popperInstance[popperId] = Popper.createPopper(toggle, menu, {
   modifiers: [
       {
           name: 'offset',
           options: {
               offset: [0, 8],
           },
       },
       {
           name: 'preventOverflow',
           options: {
               padding: 24,
           },
       },
   ],
   placement: 'bottom-end'
});
})
document.addEventListener('click', function (e) {
const toggle = e.target.closest('.dropdown-toggle')
const menu = e.target.closest('.dropdown-menu')
if (toggle) {
   const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
   const popperId = menuEl.dataset.popperId
   if (menuEl.classList.contains('hidden')) {
       hideDropdown()
       menuEl.classList.remove('hidden')
       showPopper(popperId)
   } else {
       menuEl.classList.add('hidden')
       hidePopper(popperId)
   }
} else if (!menu) {
   hideDropdown()
}
})

function hideDropdown() {
document.querySelectorAll('.dropdown-menu').forEach(function (item) {
   item.classList.add('hidden')
})
}
function showPopper(popperId) {
popperInstance[popperId].setOptions(function (options) {
   return {
       ...options,
       modifiers: [
           ...options.modifiers,
           { name: 'eventListeners', enabled: true },
       ],
   }
});
popperInstance[popperId].update();
}
function hidePopper(popperId) {
popperInstance[popperId].setOptions(function (options) {
   return {
       ...options,
       modifiers: [
           ...options.modifiers,
           { name: 'eventListeners', enabled: false },
       ],
   }
});
}
// end: Popper



// start: Tab
document.querySelectorAll('[data-tab]').forEach(function (item) {
item.addEventListener('click', function (e) {
   e.preventDefault()
   const tab = item.dataset.tab
   const page = item.dataset.tabPage
   const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
   document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
       i.classList.remove('active')
   })
   document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
       i.classList.add('hidden')
   })
   item.classList.add('active')
   target.classList.remove('hidden')
})
})
// end: Tab



// start: Chart
new Chart(document.getElementById('order-chart'), {
type: 'line',
data: {
   labels: generateNDays(7),
   datasets: [
       {
           label: 'Active',
           data: generateRandomData(7),
           borderWidth: 1,
           fill: true,
           pointBackgroundColor: 'rgb(59, 130, 246)',
           borderColor: 'rgb(59, 130, 246)',
           backgroundColor: 'rgb(59 130 246 / .05)',
           tension: .2
       },
       {
           label: 'Completed',
           data: generateRandomData(7),
           borderWidth: 1,
           fill: true,
           pointBackgroundColor: 'rgb(16, 185, 129)',
           borderColor: 'rgb(16, 185, 129)',
           backgroundColor: 'rgb(16 185 129 / .05)',
           tension: .2
       },
       {
           label: 'Canceled',
           data: generateRandomData(7),
           borderWidth: 1,
           fill: true,
           pointBackgroundColor: 'rgb(244, 63, 94)',
           borderColor: 'rgb(244, 63, 94)',
           backgroundColor: 'rgb(244 63 94 / .05)',
           tension: .2
       },
   ]
},
options: {
   scales: {
       y: {
           beginAtZero: true
       }
   }
}
});

function generateNDays(n) {
const data = []
for(let i=0; i<n; i++) {
   const date = new Date()
   date.setDate(date.getDate()-i)
   data.push(date.toLocaleString('en-US', {
       month: 'short',
       day: 'numeric'
   }))
}
return data
}
function generateRandomData(n) {
const data = []
for(let i=0; i<n; i++) {
   data.push(Math.round(Math.random() * 10))
}
return data
}
// end: Chart

//
// advertisement


// delete news
function Delete_toggleForm(){
    const form = document.getElementById("deleteForm");
    form.classList.toggle("hidden");
}
// category
    function Category_toggleForm() {
        const form = document.getElementById("categoryForm");
        form.classList.toggle("hidden");
    }
    // Edit category
        function Edit_toggleForm(categoryId = null, categoryName = null, status=false) {
        const formContainer = document.getElementById('editForm');
        const categoryInput = document.getElementById('categoryNameInput');
        const statusInput = document.getElementById('statusInput');
        const form = document.getElementById('editCategoryForm');

        if (formContainer.classList.contains('hidden')) {
            form.action = `/admin/categories/${categoryId}`;
            categoryInput.value = categoryName;
            statusInput.checked = status;
            formContainer.classList.remove('hidden');
        } else {
            formContainer.classList.add('hidden');
        }
    }
// status
document.addEventListener("DOMContentLoaded", () => {
    const checkboxes = document.querySelectorAll(".status-checkbox");
    const buttons = document.querySelectorAll(".toggle-status-button");

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", () => {
            const id = checkbox.getAttribute("data-id");
            const button = document.querySelector(`.toggle-status-button[data-id="${id}"]`);
            const status = checkbox.checked;

            button.setAttribute("data-status", status);
            button.style.backgroundColor = status ? "green" : "red";
            button.textContent = status ? "Enable" : "Disable";
            updateStatusOnServer(id, status);
        });
    });

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const id = button.getAttribute("data-id");
            const checkbox = document.querySelector(`.status-checkbox[data-id="${id}"]`);
            const status = button.getAttribute("data-status") === "true";

            const newStatus = !status;
            button.setAttribute("data-status", newStatus);
            button.style.backgroundColor = newStatus ? "green" : "red";
            button.textContent = newStatus ? "Enable" : "Disable";
            checkbox.checked = newStatus;

            updateStatusOnServer(id, newStatus);
        });
    });
});
function updateStatusOnServer(id, status) {
    fetch(`/update-category-status/${id}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        },
        body: JSON.stringify({ status }),
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error("Error updating status:", error));
}
// delete category
function Delete_toggleForm(categoryId = null, categoryName = '') {
    const deleteForm = document.getElementById('deleteForm');
    const form = deleteForm.querySelector('form');
    const categoryNameElement = deleteForm.querySelector('.category-name');

    if (categoryId) {
        deleteForm.classList.remove('hidden');
        form.setAttribute('action', `/admin/categories/${categoryId}`);
        if (categoryNameElement) {
            categoryNameElement.textContent = categoryName;
        }
    } else {
        deleteForm.classList.add('hidden');
        form.setAttribute('action', '');
        if (categoryNameElement) {
            categoryNameElement.textContent = '';
        }
    }
}
// end delete category

// Ads delete
function Delete_toggleForm(type, id = null, size = ''){
    const deleteForm = document.getElementById('deleteForm');
    const form = deleteForm.querySelector('form');

    if(id){
        deleteForm.classList.remove('hidden');
        form.setAttribute('action',`/admin/advertisement/${id}`);

    }else{
        deleteForm.classList.add('hidden');
        form.setAttribute('action', '');
    }
}

// end ads delete
// add news
function previewImage(event, previewId, svgId, placeholderId, containerId) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function () {
            const preview = document.getElementById(previewId);
            const svg = document.getElementById(svgId);
            const placeholder = document.getElementById(placeholderId);
            const container = document.getElementById(containerId);

            preview.src = reader.result;

            svg.style.display = 'none';
            placeholder.style.display = 'none';
            container.style.display = 'flex';
        };
        reader.readAsDataURL(file);
    }
}
function removePreview(previewId, svgId, placeholderId, containerId) {
    const preview = document.getElementById(previewId);
    const svg = document.getElementById(svgId);
    const placeholder = document.getElementById(placeholderId);
    const container = document.getElementById(containerId);

    preview.src = '';
    svg.style.display = 'block';
    placeholder.style.display = 'flex';
    container.style.display = 'none';

    document.getElementById('dropzone-file-1').value = '';
}

function Ads_toggleForm() {
    console.log("Ads_toggleForm triggered");
    const form = document.getElementById("adsForm");
    form.classList.toggle("hidden");
}


//

