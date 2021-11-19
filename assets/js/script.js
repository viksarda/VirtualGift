
$(document).ready(function(){

	function loadPartial(){
		var prevs = $("[data-strikes=3]").map(function() {return $(this).data("id")}).toArray();
		$("#partial").load("partial", function(){
			var news = $("[data-strikes=3]").map(function() {return $(this).data("id")}).toArray();
			if(news.length > 0 && prevs.length != news.length){
				var inters = news.filter(x => !prevs.includes(x));
				var newElem = $("[data-id=" + inters[0] + "]");
				$("#modal-won").modal("show");
				$("#modal-won-participant").text(newElem.data("holder"));
				$("#modal-won-picture").attr("src", newElem.data("picture"));
				$("#modal-won-reward").text(newElem.data("reward"));
				setTimeout(function(){
					$("#modal-won").modal("hide");
				}, 5000);
			};
		});
	}

	setInterval(function(){
		loadPartial();
	}, 5000);

	$(document).on("click", ".reward", function() {
		if($(this).data("strikes") >= 3) return;
		if($("body").data("isloggedin") != true) return;
		if($("#finished").length) return;

		$(".modal-confirm-button").data("id", $(this).data("id"));
		
		if( ($(this).data("known")) && ($(this).data("strikes") != 2) ){
			$("#modal-confirm-known").modal("show");
			$("#modal-confirm-known-participant").text($(this).data("participant"));
			$("#modal-confirm-known-picture").attr("src", $(this).data("picture"));
			$("#modal-confirm-known-reward").text($(this).data("reward"));
		}
		
		 else if( ($(this).data("known")) && ($(this).data("strikes") == 2) ){
			$("#modal-confirm-known-last").modal("show");
			$("#modal-confirm-known-participant-last").text($(this).data("participant"));
			$("#modal-confirm-known-picture-last").attr("src", $(this).data("picture"));
			$("#modal-confirm-known-reward-last").text($(this).data("reward"));
		}
		else {
			$("#modal-confirm").modal("show");
			$("#modal-confirm-id").text($(this).data("id"));
			$("#modal-confirm-participant").text($(this).data("participant"));
		}
	});

	$(".modal-confirm-button").click(function(){
		$.post("selection", {
			id: $(this).data("id")
		});
		$("#modal-confirm").modal("hide");
		$("#modal-confirm-known").modal("hide");
		$("#modal-confirm-known-last").modal("hide");
		loadPartial();

	});

	$(document).on("click", "#endgame", function() {
		if($("body").data("isloggedin") != true) return;
		$.post("admin", {
			action: "endgame"
		});
		loadPartial();

	});

});