$(document).ready(function() {
	hasil();
});
$("#search-button").on("click", function() {
	hasilSearch();
});

function hasil() {
	$.ajax({
		url: "http://localhost/rest-api-server/api/mahasiswa",
		type: "GET",
		dataType: "json",
		success: function(data) {
			var con = "";
			let film = data.data;
			$.each(film, function(i, suck) {
				con +=
					'<div class="card mb-3 mx-2" style="width: 18rem;">' +
					'<div class="card-body">' +
					'<h5 class="card-title">' +
					suck.nama +
					"</h5>" +
					'<p class="">' +
					suck.nama +
					"- " +
					suck.nama +
					" </p>" +
					'<a href="./' +
					data.nama +
					'"class="btn btn-primary">detail</a>' +
					"</div></div>";
			});
			$("#Daftar-film").html(con);
		}
	});
}

function hasilSearch() {
	$.ajax({
		url: "http://localhost/rest-api-server/api/Mahasiswa",
		type: "GET",
		dataType: "json",
		data: {
			id: $("#search-input").val()
		},
		success: function(data) {
			var con = "";
			console.log(data);
			if (data.status == "true") {
				let film = data.data;
				$.each(film, function(i, suck) {
					con +=
						'<div class="card mb-3 mx-2" style="width: 18rem;">' +
						'<div class="card-body">' +
						'<h5 class="card-title">' +
						suck.nama +
						"</h5>" +
						'<p class="">' +
						suck.nama +
						"- " +
						suck.nama +
						" </p>" +
						'<a href="./' +
						data.nama +
						'"class="btn btn-primary">detail</a>' +
						"</div></div>";
				});
			} else {
				con += "<h1>Film tidak ditemukan</h1>";
			}
			$("#Daftar-film").html(con);
		}
	});
}
