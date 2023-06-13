let formUp = document.querySelector('.form-up')
    fileInput = document.querySelector(".file-input")
    progressArea = document.querySelector(".progress-area")
    uploadedArea = document.querySelector(".uploaded-area")
    uploadBtn = document.querySelector('.upload')
    path = document.querySelector('.upload_inp').value;
uploadBtn.addEventListener("click", () => {
    fileInput.click();
});
fileInput.onchange = ({target}) => {
    let file = target.files[0];
    if (file) {
        let fileName = file.name;
        uploadFile(fileName);
    }
}

function uploadFile(name) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "http://api-anime/test.php");
    xhr.upload.addEventListener("progress", ({loaded, total}) => {
        let fileLoaded = Math.floor((loaded / total) * 100);
        let fileTotal = Math.floor(total / 1000);
        let fileSize;
        (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
        let progressHTML = `<li class="row">
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
        uploadedArea.classList.add("onprogress");
        progressArea.innerHTML = progressHTML;
        if (loaded == total) {
            progressArea.innerHTML = "";
            let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                          </li>`;
            uploadedArea.classList.remove("onprogress");
            uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
        }
    });
    let data = new FormData(formUp);
    xhr.send(data);
}

function fetchData(path) {
    fetch(path)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if(data != ''){
                let out = '';
                for(let key in data){
                    out += `<section class="progress-area">
                        <li class="row">
                            <div class="content upload">
                              <div class="details">
                                <span class="name">${data[key]}</span>
                              </div>
                            </div>
                        </li>
                </section>`;
                }
                $('.files').html(out);
            } else {
                let out = `<section class="progress-area">
                        <li class="row">
                            <div class="content upload">
                              <div class="details">
                                <span class="name">Список файлов пуст</span>
                              </div>
                            </div>
                        </li>
                </section>`;
                $('.files').html(out);
            }
        })
        .catch(error => console.error('Error:', error));
}

window.onload = function () {
    fetchData('http://api-anime/scan.php?path=' + path);
}