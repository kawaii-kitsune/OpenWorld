
$(document).ready(function () {
    var screenshotCount = 0;

    //Every time the user clicks on the 'take screenhot' button
    $("#btnTakeScreenshot").on("click", function () {
        //Get data url from the runtime
        var imgUrl = document.getElementById("canvas").runtime.getScreenshot();
        
        //Create preview image...
        var newScreenshotImage = document.createElement('img');
        newScreenshotImage.src = imgUrl;
        newScreenshotImage.id = "screenshot_" + screenshotCount;
        $('#screenshotPreviews').append(newScreenshotImage);

        //...and download link
        var newScreenshotDownloadLink = document.createElement('a');
        newScreenshotDownloadLink.href = imgUrl;
        newScreenshotDownloadLink.download = "screenshot_" + screenshotCount + ".png";
        newScreenshotDownloadLink.innerHTML = '<span class="text-white badge badge-pill badge-info my-1">Download <i class="fas fa-download"></i></span>';
        var newDeleteElement = document.createElement('button');
        newDeleteElement.classList.add('btn', 'btn-danger', 'my-1');
        newDeleteElement.onclick = function () {
            screenshotCount--;
            removeDiv(newScreenshotDownloadLink);
            removeDiv(newScreenshotImage);
            removeDiv(this);
            $('#screenshotCount').html(screenshotCount);
        }
        newDeleteElement.innerHTML = 'Delete <i class="fas fa-backspace"></i>';

        $('#screenshotPreviews').append(newScreenshotDownloadLink);
        $('#screenshotPreviews').append(newDeleteElement);

        screenshotCount++;

        $('#screenshotCount').html(screenshotCount);
    });
});


function removeDiv(elem) {
    $(elem).remove();
    
}


