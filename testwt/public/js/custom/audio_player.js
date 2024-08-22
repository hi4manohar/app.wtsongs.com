$(document).ready(function() {
    var trackId;
    // player js start

    // inner variables
    var song;
    var file_url;
    var tracker = $('.pro');
    var volume = $('.volume');
    var curTimeWrite;
    var time;
    var cdn = "http://cdn.wtsongs.com";
    var activeTrack;
    var defaultTrackNum = 1;
    var currentBitrate;
    var autoCalled;   

    //Play Function For Json Data
    function jsonAudioAuto(jsonClass, p_cond) {
        var jsonData = cm.parseJSON($('.row' + jsonClass).html());

        if( jsonData == "Invalid JSON" ) {
            alert("Invalid JSON File");
            return;
        }

        stopAudio();

        var url = jsonData.trackTitle;
        trackId = jsonData.id;
        var title = jsonData.trackTitle;
        //var cover = jsonData.audio_cover;
        var artist = jsonData.artist;
        var album = jsonData.albumTitle;
        var albumLang = jsonData.album_lang.toLowerCase();

        $('.player_track_name a').text(title + " - ");
        $('.player_album_name').text(artist);
        $('.player .artist').text(artist);
        //$('.cover').css('background', 'url(' + cover + ')');

        var albumFirstChar = album.charAt(0);
        if(!isNaN(albumFirstChar)) {
            albumFirstChar = "0-9";
        }

        if( p_cond !== "pFromFile" ) {
            $.extend({
                getValues: function(url) {
                    var result = null;
                    $.ajax({
                        url: baseUrl+"/download",
                        data : {"id": trackId, "do": "stream"},
                        type: 'get',
                        async: false,
                        cache: false,
                        success: function(data, statusText, xhr) {
                            result = data;
                        }
                    });
                   return result;
                }
            });
            file_url = $.getValues("url string");
            if( file_url == "failed" ) {
                alert("\t\t\t\tSorry! It seems like file doesn't exist \n If you want to see it presence online please report us on info@wtsongs.com");
                return;
            }

            //set current-bitrate
            currentBitrate = 64;
        }            

        song = new Audio(file_url);

        // timeupdate event listener
        song.addEventListener('timeupdate',function (){
            var curtime = parseInt(song.currentTime, 10);
            tracker.slider('value', curtime);

            //Total Audio Duration
            songDuration = ( song.duration );

            time = formatSecondsAsTime(songDuration);
            acttime = time.replace(".", ":");
            if(acttime.match(/[a-z]/i)) $('.track_time').text("00:00");
            else $('.track_time').text(acttime);

            //tracker slider updater
            tracker.slider("option", "max", song.duration);

            //current Time Show
            curTimeWrite = formatSecondsAsTime(curtime);
            $('.elipsed_time').text(curTimeWrite);
            if(curTimeWrite >= '00:00') {
                removeLoader();
            }
        });

        song.addEventListener("ended", function() {
            addLoader();
            autoNextPlay();
        });

        //check if state is changed of tracker
        song.addEventListener("seeked", function() {
            addLoader();
        });

        //update song hits after played 1 minute
        song.addEventListener("canplaythrough", function () {
            setTimeout(function(){
                updatePlayHits(trackId);
            }, 60000);
        }, false);

        if(autoCalled) {
            autoCalled = false;
            activeTrack = 0;
        } else {
            //updatePlayHits(trackId);
            $(".stopControl").trigger("click");
        }

    }

    //time formats
    function formatSecondsAsTime(secs, format) {
        var hr  = Math.floor(secs / 3600);
        var min = Math.floor((secs - (hr * 3600))/60);
        var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

        if (min < 10){ 
            min = "0" + min; 
        }
        if (sec < 10){ 
            sec  = "0" + sec;
        }

        return min + ':' + sec;
    }

    function playAudio() {
        
        song.play();
    }
    function stopAudio() {
        song.pause();
    }

    //trackPlayer Button Clicked
    $(document.body).on('click', '.play_album', function(e) {

        e.preventDefault();

        //check if dataClass Exist
        var dataClassAttr = $(this).attr('dataClass');
        if(typeof dataClassAttr !== typeof undefined && dataClassAttr !== false) {

            /*
            var clickedClass = $(this).attr("dataClass");
            activeTrack = $(this).attr("numberTrack");

            $('.song_player').not(this).removeClass('stopPlayControl').addClass('play_album');
            $('.track_player').not(this).removeClass('stopPlayControl').addClass('play_album');
            $(this).toggleClass('play_album stopPlayControl');
            
            jsonAudioAuto(clickedClass);

            */

            track_parent = $(this).closest('.album_track');
            //remove active song class
            $('.album_track').removeClass('activeSong');
            //add activeSong in track_parent class
            track_parent.addClass('activeSong');
            //track_parent song
            track_elem = track_parent.find('.jsontrack');
            //parse track_elem as json
            track_json = JSON.parse(track_elem.html());
            //track_id
            track_id = track_json.id;
            //change track number button
            $('.song_player').not(this).removeClass('stopPlayControl').addClass('play_album');
            $('.track_player').not(this).removeClass('stopPlayControl').addClass('play_album');
            activeTrack = track_parent.find('div.track_player').attr("numberTrack");
            $(this).toggleClass('play_album stopPlayControl');
            //call for play
            jsonAudioAuto(track_id);

        } else {
            $('.track_player').not(this).removeClass('stopPlayControl').addClass('play_album');
            $(this).toggleClass('play_album stopPlayControl');

            stopAudio();
            //current number track
            var currTrackNum = parseInt(activeTrack);
            //get element using numberTrack
            /*
            var currTrackElem = $("div.track_player[numberTrack='" + currTrackNum + "']");
            var jsonDataClass = currTrackElem.attr("dataClass");
                
            jsonAudioAuto(jsonDataClass);
            */

            track_parent = $('.album_track.activeSong');
            //remove active song class
            $('.album_track').removeClass('activeSong');
            //add activeSong in track_parent class
            track_parent.addClass('activeSong');
            //track_parent song
            track_elem = track_parent.find('.jsontrack');
            //parse track_elem as json
            track_json = JSON.parse(track_elem.html());
            //track_id
            track_id = track_json.id;
            //change track number button
            $('.song_player').not(this).removeClass('stopPlayControl').addClass('play_album');
            $('.track_player').not(this).removeClass('stopPlayControl').addClass('play_album');
            activeTrack = track_parent.find('div.track_player').attr("numberTrack");
            $(this).toggleClass('play_album stopPlayControl');
            //call for play
            jsonAudioAuto(track_id);
        }
        
    });

    // set volume
    song.volume = 0.8;

    // initialize the volume slider
    volume.slider({
        range: 'min',
        min: 1,
        max: 100,
        value: 80,
        start: function(event,ui) {},
        slide: function(event, ui) {
            song.volume = ui.value / 100;
        },
        stop: function(event,ui) {},
    });

    // empty tracker slider
    tracker.slider({
        range: 'min',
        min: 0, max: 10,
        start: function(event,ui) {},
        slide: function(event, ui) {
            song.currentTime = ui.value;
        },
        stop: function(event,ui) {}
    });
});

/* Audio Player End */