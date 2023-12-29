const dropArea = document.querySelector(".drop-section");
const listSection = document.querySelector(".list-section");
const listContainer = document.querySelector(".list");
const fileSelector = document.querySelector(".file-selector");
const fileSelectorInput = document.querySelector(".file-selector-input");

// Upload Files With Brows Button
fileSelector.onclick = () => fileSelectorInput.click();
fileSelectorInput.onchange = () => {
  [...fileSelectorInput.files].forEach((file) => {
    if (typeValidation(file.type)) {
      uploadFile(file);
    }
  });
};

// When file is over the drag area
dropArea.ondragover = (e) => {
  e.preventDefault();
  [...e.dataTransfer.items].forEach((item) => {
    if (typeValidation(item.type)) {
      dropArea.classList.add("drag-over-effect");
    }
  });
};

// When file Drop on the drag area
dropArea.ondrop = (e) => {
  e.preventDefault();
  dropArea.classList.remove("drag-over-effect");
  if (e.dataTransfer.items) {
    [...e.dataTransfer.items].forEach((item) => {
      if (item.kind === "file") {
        const file = item.getAsFile();
        if (typeValidation(file.type)) {
          uploadFile(file);
        }
      }
    });
  } else {
    [...e.dataTransfer.files].forEach((file) => {
      if (typeValidation(file.type)) {
        uploadFile(file);
      }
    });
  }
};

// Check The file Type
function typeValidation(type) {
  let splitType = type.split("/")[0];
  if (type == "application/pdf") {
    return true;
  }
}
function uploadFile(file) {
  // Do Uploading
  listSection.style.display = "block";
  var li = document.createElement("li");
  li.innerHTML = `
      <div class="col">
        <img
          src="assets/file_pdf_document-4096-1165017167.png"
          alt=""
        />
        <div class="name">${file.name}</div>
      </div>
      <div class="col">
        <div class="file-size">${
          (file.size / 1024).toFixed(2) > 1024
            ? (file.size / (1024 * 1024)).toFixed(2) + " MB"
            : (file.size / 1024).toFixed(2) + " KB"
        }</div>
        <span class="cross"><img src="./assets/true.png" alt=""></span>
      </div>
  `;
  listContainer.prepend(li);
  let http = new XMLHttpRequest();
  let data = new FormData();
  http.onload = () => {
    // Completed
    li.classList.add("complete");
    li.classList.add("in-prog");
  };
}