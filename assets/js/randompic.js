// takes a directory location, generates a random number and appends it to the directory
function showImage(){

    var imgDir = 'photography/'; // image directory
    var max = 68; // max number of images in directory

    // Runs x times, with values of count 0 through x.
    for (count = 0; count < 8; count++) {
        var imgNum = Math.floor(Math.random() * max) + 1; // generates a number between 1 and max each time
        document.write(
            '<div><div class="overlayContainer"><a href="#'+imgNum+'"><img src="'+imgDir+imgNum+'.jpg" alt="'+imgNum+'"></a><span class="showMore">Click to view</span></a></div></div><a href="#Photography" class="lightboxPhoto" id="'+imgNum+'"><img src="'+imgDir+imgNum+'.jpg" alt="'+imgNum+'"></a>'
        );
    }
}
            
 
      

