

//Those are the finctions whenever you pick a left hand mode
//Default Hands (left)
$('#left-hand-1').on('change', function (e) {
    $('#left-opions-teleport-container').hide();
    $('#left-opions-hand-container').show();
    removeDiv(document.getElementById('left-hand'));
    $('#handOptionsLeft option[value="lowPoly"]').prop('selected', true)
    $('#cameraRig').append('<a-entity id="left-hand" menu-listener hand-controls="hand: left; handModelStyle: lowPoly; "></a-entity>');

});
//Default Teleport (left)
$('#left-hand-2').on('change', function (e) {
    $('#left-opions-hand-container').hide();
    $('#left-opions-teleport-container').show();
    removeDiv(document.getElementById('left-hand'));
    $('#TeleportOptionsLeft option[value="Trigger"]').prop('selected', true)
    $('#cameraRig').append('<a-entity id="left-hand" menu-listener vive-controls="hand: left"' +
        'teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head; button:trigger;"></a-entity>');
});
//Default Laser (left)
$('#left-hand-3').on('change', function (e) {
    $('#left-opions-hand-container').hide();
    $('#left-opions-teleport-container').hide();
    removeDiv(document.getElementById('left-hand'));
    $('#cameraRig').append('<a-entity id="left-hand  menu-listener laser-controls="hand: left" raycaster="lineColor: red; lineOpacity: 0.5"></a-entity>');
});
//Those are the finctions whenever you pick a right hand mode
//Default Hands (right)
$('#right-hand-1').on('change', function (e) {
    $('#right-opions-teleport-container').hide();
    $('#right-opions-hand-container').show();
    removeDiv(document.getElementById('right-hand'));
    $('#handOptionsright option[value="lowPoly"]').prop('selected', true)
    $('#cameraRig').append('<a-entity id="right-hand" menu-listener hand-controls="hand: right; handModelStyle: lowPoly; "></a-entity>');

});
//Default Teleport (right)
$('#right-hand-2').on('change', function (e) {
    $('#right-opions-hand-container').hide();
    $('#right-opions-teleport-container').show();
    removeDiv(document.getElementById('right-hand'));
    $('#TeleportOptionsright option[value="Trigger"]').prop('selected', true)
    $('#cameraRig').append('<a-entity id="right-hand" menu-listener vive-controls="hand: right"' +
        'teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head; button:trigger;"></a-entity>');
});
//Default laser (right)
$('#right-hand-3').on('change', function (e) {
    $('#right-opions-hand-container').hide();
    $('#right-opions-teleport-container').hide();
    removeDiv(document.getElementById('right-hand'));

    $('#cameraRig').append('<a-entity id="right-hand" menu-listener laser-controls="hand: right" raycaster="lineColor: red; lineOpacity: 0.5"></a-entity>');
});
//(left) change teleport options with the value that was picked with the right listeners and default attributes 
$('#TeleportOptionsLeft').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    removeDiv(document.getElementById('left-hand'));

    $('#cameraRig').append('<a-entity id="left-hand" menu-listener vive-controls="hand: left"' +
        'teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head; button:' + valueSelected.toLowerCase() + ';"></a-entity>');
});
//(right)change teleport options with the value that was picked with the right listeners and default attributes 
$('#TeleportOptionsRight').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    removeDiv(document.getElementById('right-hand'));
    $('#cameraRig').append('<a-entity id="right-hand" menu-listener vive-controls="hand: right"' +
        'teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head; button:' + valueSelected.toLowerCase() + ';"></a-entity>');
});
//(left) change hand options with the value that was picked with the right listeners and default attributes 
$('#handOptionsLeft').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    removeDiv(document.getElementById('left-hand'));

    $('#cameraRig').append('<a-entity id="left-hand" menu-listener hand-controls="hand: left; handModelStyle: ' + valueSelected + '; "></a-entity>');
});
//(right)change hand options with the value that was picked with the right listeners and default attributes 
$('#handOptionsright').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    removeDiv(document.getElementById('right-hand'));
    $('#cameraRig').append('<a-entity id="right-hand" menu-listener hand-controls="hand: right; handModelStyle: ' + valueSelected + '; "></a-entity>');
});


//That's just the controller manual picture appearing whenever the "Controller" title is hovered
$("#controller-hoverable").hover(
    function () {
        $('#controller-image').css("display", "block");
    }, function () {
        $('#controller-image').css("display", "none");
    }
);
//cameraRig is our Head and we put it wherever we want
$('.a-enter-vr').on('click', () => {
    $('#cameraRig').position = '2.4 1.7 3.9';
    $('#cameraRig').rotation = '0 50 0';
});
//GESTURE TO CHANGE CONTROL OPTIONS BY PRESSING MENU
//WE MAKE OUR OW LISTENER
AFRAME.registerComponent('menu-listener', {
    init: function () {
        var el = this.el;
        el.addEventListener('menuup', function (evt) {
            console.log(el);
            //CHECKING THE OUTER HTML IN STRINGS TO BREAK DOWN IF IT IS A RIGHT HAND AND WHAT CONTOLS S IT UP TO
            if (el.outerHTML.includes('teleport-controls')) {
                //(RIGHT) IF IT'S TELEPORT GO TO HAND
                if (el.outerHTML.includes('right-hand')) {
                    $('#right-opions-teleport-container').hide();
                    $('#right-opions-hand-container').show();
                    removeDiv(document.getElementById('right-hand'));
                    $('#handOptionsright option[value="lowPoly"]').prop('selected', true)
                    $('#cameraRig').append('<a-entity id="right-hand" menu-listener hand-controls="hand: right; handModelStyle: lowPoly; "></a-entity>');
                }
                else {
                    //(RIGHT) IF IT'S TELEPORT GO TO HAND
                    $('#left-opions-teleport-container').hide();
                    $('#left-opions-hand-container').show();
                    removeDiv(document.getElementById('left-hand'));
                    $('#handOptionsLeft option[value="lowPoly"]').prop('selected', true)
                    $('#cameraRig').append('<a-entity id="left-hand" menu-listener hand-controls="hand: left; handModelStyle: lowPoly; "></a-entity>');
                
                }
            }
            if (el.outerHTML.includes('hand-controls')) {
                //(LEFT) IF IT'S HAND GO TOTELEPORT
                if (el.outerHTML.includes('left-hand')) {
                    $('#left-opions-hand-container').hide();
                    $('#left-opions-teleport-container').show();
                    removeDiv(document.getElementById('left-hand'));
                    $('#TeleportOptionsLeft option[value="Trigger"]').prop('selected', true)
                    $('#cameraRig').append('<a-entity id="left-hand" menu-listener vive-controls="hand: left"' +
                        'teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head; button:trigger;"></a-entity>');
                                }
                else {
                    //(RIGHT) IF IT'S  HAND GO TO TELEPORT
                    $('#right-opions-hand-container').hide();
                    $('#right-opions-teleport-container').show();
                    removeDiv(document.getElementById('right-hand'));
                    $('#TeleportOptionsright option[value="Trigger"]').prop('selected', true)
                    $('#cameraRig').append('<a-entity id="right-hand" menu-listener vive-controls="hand: right"' +
                        'teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head; button:trigger;"></a-entity>');
                }
            }
        });
    }
});
//Function to make our lives easier, remove a div with on click or just by finding it
function removeDiv(elem) {
    $(elem).remove();

}

//Takes a screenshot    
$("#btnTakeScreenshot").on("click", function () {
        
    document.querySelector('a-scene').components.screenshot.capture('perspective');
    
    alert('You took a screenshot check your downloads');

});

//Bootstrap functions
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})