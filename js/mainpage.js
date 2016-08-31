var video = $j("#entry_video");
var video_picture = $j("#play_picture");

video_picture.click(function(){
	video.bind('play ended', function () { //should trigger once on any play and ended event
		console.log("test");
	});
});
