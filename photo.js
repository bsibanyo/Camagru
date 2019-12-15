(function(){
    var video = document.getElementById('video'), //capture the video element
        canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        photo = document.getElementById('photo'),
        vendorUrl = window.URL || window.webkitURL; //generate the source


    navigator.getMedia = navigator.getUserMedia ||//to define if we wnat audio,video etc, check callback success/error User denied
                        navigator.webkitGetUserMedia||
                        navigator.mozGetUserMedia||
                        navigator.msGetUserMedia;

   //start capturing video   
   navigator.getMedia({
       video: true,
       audio: false
   },
   //actual stream of the webcam  
   function(stream){
    video.src = vendorUrl.createObjectURL(stream);
    // video.srcObject = stream;
    video.play;
   }, 
   //error handler
   function(error){

   }); 
   
   document.getElementById('capture').addEventListener('click', function(){
        context.drawImage(video, 0, 0, 400, 300);

        //here to manipulate the canvas 

        photo.setAttribute('src', canvas.toDataURL('image/png'));

   });


})();