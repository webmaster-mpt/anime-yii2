$(document).ready(function () {
    let controls = {
        video: $('#video'),
        close: $('.close'),
        play: $('.play'),
        pause: $('.pause'),
        setting: $('.setting'),
        fullscreen: $('.fullscreen'),
        normalScreen: $('.normalscreen'),
        volume: $('.volume'),
        volumeIcon: $('.volume-icon'),
        chooseParts: $('.choose_parts'),
        total: $('.video-progress'),
        progress: $('#current'),
        buffered: $('#buffered'),
        currentTime: $("#currenttime"),
        duration: $("#duration"),
        hasHours: false,
        progressBar: $('#progress-bar'),
        currentProgress: $('#current-progress')
    };
    let vsource = document.querySelector('#vsource')
    sourceDiv = $('.source')
    resolutions = document.querySelectorAll('.res')
    code = vsource.attributes.label.value
    animeId = vsource.attributes.animeId.value
    src = ""
    partDiv = $('.parts')
    out = ''
    video = controls.video[0];
    localStorage.clear();
    loadParts(animeId, code);

    controls.play.click(function () {
        video.play();
        $('.play').hide();
        $('.pause').show();
    });

    controls.pause.click(function () {
        video.pause();
        $('.pause').hide();
        $('.play').show();
    });

    controls.volume.change(function () {
        video.volume = this.value;
    });

    // right
    controls.chooseParts.click(function () {
        partDiv.toggle();
        if (sourceDiv.show()) {
            sourceDiv.hide();
        }
    });

    $(document).on('click', '.parts-card', function () {
        $('.parts-card').removeClass('selectPart');
        let animeName = this.children[0].children[1].textContent;
        localStorage.setItem('parts', this.attributes.id.value);
        changeVideo(animeId, code, '360p', 'play', this.attributes.id.value);
        $('#number')[0].textContent = animeName;
        $(this).addClass('selectPart');
    });

    controls.setting.click(function () {
        sourceDiv.toggle();
        if (partDiv.show()) {
            partDiv.hide();
        }
    });

    $('body').on('click', '.res', function () {
        changeVideo(animeId, code, $(this).text(), 'play', localStorage.getItem('parts'));
        sourceDiv.hide();
    });

    function loadSource(id, code, partId) {
        const order = {'1440p': 0, '1080p': 1, '720p': 2, '480p': 3, '360p': 4, '240p':5};
        Object.keys(order).forEach((key) => {
            order[key] = Object.keys(order).indexOf(key);
        });

        function compare(a, b) {
            return order[b] - order[a];
        }
        $.getJSON(`http://anime-yii2b/site/parts-json?id=${id}`, function (data) {
            let out = ''
                newData = data['film'][code]['parts'][partId]['source']
                keys = Object.keys(newData)
                keys.sort((a, b) => compare(a, b))
                keys.reverse();
            for (let i = 0; i < keys.length; i++) {
                const key = keys[i];
                out += `<div class="res ${key}">${key}</div>`;
            }
            sourceDiv.html(out);
        });
    }

    controls.fullscreen.click(function () {
        $('.fullscreen').hide();
        $('.normalscreen').show();

        function enterFullscreen(element) {
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if (element.msRequestFullscreen) {
                element.msRequestFullscreen();
            } else if (element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen();
            }
        }

        enterFullscreen(document.documentElement);
    });

    controls.normalScreen.click(function () {
        $('.normalscreen').hide();
        $('.fullscreen').show();

        function exitFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }

        exitFullscreen();
    });

    controls.close.click(function () {
        window.location.href = "http://anime-yii2f/site/anime-parts?id=" + animeId;
    });

    video.addEventListener("canplay", function () {
        controls.hasHours = (video.duration / 3600) >= 1.0;
        controls.duration.text(formatTime(video.duration, controls.hasHours));
        controls.currentTime.text(formatTime(0), controls.hasHours);
    }, false);

    function formatTime(time, hours) {
        if (hours) {
            let h = Math.floor(time / 3600);
            time = time - h * 3600;

            let m = Math.floor(time / 60);
            let s = Math.floor(time % 60);

            return h.lead0(2) + ":" + m.lead0(2) + ":" + s.lead0(2);
        } else {
            let m = Math.floor(time / 60);
            let s = Math.floor(time % 60);

            return m.lead0(2) + ":" + s.lead0(2);
        }
    }

    Number.prototype.lead0 = function (n) {
        var nz = "" + this;
        while (nz.length < n) {
            nz = "0" + nz;
        }
        return nz;
    };

    //Format time
    const timeFormatter = (timeInput) => {
        let minute = Math.floor(timeInput / 60);
        minute = minute < 10 ? "0" + minute : minute;
        let second = Math.floor(timeInput % 60);
        second = second < 10 ? "0" + second : second;
        return `${minute}:${second}`;
    };

    setInterval(() => {
        controls.currentTime.innerHTML = timeFormatter(video.currentTime);
        controls.currentProgress[0].style.width =
            (video.currentTime / video.duration.toFixed(3)) * 100 + "%";
    }, 1000);

    video.addEventListener("timeupdate", () => {
        controls.currentTime.text(formatTime(video.currentTime, controls.hasHours))
    });

    controls.progressBar.on('click', (event) => {
        let coordStart = controls.progressBar[0].getBoundingClientRect().left;
        let coordEnd = event.clientX || event.touches[0].clientX;
        let progress = (coordEnd - coordStart) / controls.progressBar[0].offsetWidth;
        controls.currentProgress[0].style.width = progress * 100 + "%";
        video.currentTime = progress * video.duration;
    });

    let timedelay = 1
    _delay = setInterval(delayCheck, 500);

    $('.container').on('mousemove', showAllEvent);

    function delayCheck() {
        $('#controls').addClass('vjs-fade-out');
    }

    function showAllEvent() {
        $('#controls').removeClass('vjs-fade-out');
        timedelay = 1;
        clearInterval(_delay);
        _delay = setInterval(delayCheck, 500);
    }

    function loadParts(id, code) {
        $.getJSON(`http://anime-yii2b/site/parts-json?id=${id}`, function (data) {
            if (data['film'][code]) {
                let newData = data['film'][code]['parts'];
                for (let key in newData) {
                    out += `<div class="parts-card" id="${key}">
                        <div class="parts-info">
                            <img src="https://drive.google.com/uc?export=view&id=${newData[key]['poster']}" alt="poster" width="160" height="90"/>
                            <span id="films-name">${newData[key]['name']}</span>
                        </div>
                    </div>`;
                }
                partDiv.html(out);
                let part = $('.parts-card')[0]
                path = 'http://api-anime/' + newData[part.id]['source']['720p']
                animeName = $('.parts-info')[0].children[1].textContent;
                loadSource(id, code, part.id);
                localStorage.setItem('parts', part.id);
                vsource.setAttribute('src', path);
                video.load();
                $('.parts-card')[0].attributes.class.value = 'parts-card selectPart';
                $('#number')[0].textContent = animeName;
            } else if (data['series'][code]) {
                let newData = data['series'][code]['parts'];
                for (let key in newData) {
                    out += `<div class="parts-card" id="${key}">
                        <div class="parts-info">
                            <img src="https://drive.google.com/uc?export=view&id=${newData[key]['poster']}" alt="poster" width="160" height="90"/>
                            <span id="films-name">${newData[key]['name']}</span>
                        </div>
                    </div>`;
                }
                partDiv.html(out);
                let part = $('.parts-card')[0];
                path = 'http://api-anime/' + newData[part.id]['source']['1080p']
                animeName = $('.parts-info')[0].children[1].textContent;
                vsource.setAttribute('src', path);
                video.load();
                $('.parts-card')[0].attributes.class.value = 'parts-card selectPart';
                $('#number')[0].textContent = animeName;
            } else {
                alert('Такого видео не существует!');
            }
        });
    }

    function changeVideo(id, code, quality, status, parts) {
        $.getJSON(`http://anime-yii2b/site/parts-json?id=${id}`, function (data) {
            if (data['film'][code]) {
                newData = data['film'][code]['parts'][parts];
                src = 'http://api-anime/' + newData['source'][quality];
                vsource.setAttribute('src', src);
                video.load();
                loadSource(id, code, parts);
                if (status == 'play') {
                    video.play();
                    $('.play').hide();
                    $('.pause').show();
                } else {
                    video.pause();
                }
            } else if (data['series'][code]) {
                newData = data['series'][code]['parts'][parts];
                src = 'http://api-anime/' + newData['source'][quality];
                vsource.setAttribute('src', src);
                video.load();
                if (status == 'play') {
                    video.play();
                    $('.play').hide();
                    $('.pause').show();
                } else {
                    video.pause();
                }
            } else {
                alert('Такого видео не существует!');
            }
        });
    }
});

