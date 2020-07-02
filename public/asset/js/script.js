$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
})

$("body").on("click",".edit-item",function(){
	var id  = $(this).parent("td").data("id");
	$.ajax({
		dataType : 'json',
		type : 'get',
		url : url + '/' + id
	}).done(function(data){
		$("#edit-item").find("input[name='id']").val(data.id)
		$("#edit-item").find("input[name='nama_produk']").val(data.nama_produk)
		$("#edit-item").find("input[name='keterangan']").val(data.keterangan)
		$("#edit-item").find("input[name='harga']").val(data.harga)
		$("#edit-item").find("input[name='jumlah']").val(data.jumlah)
	})
})

$(".crud-submit-edit").click(function(e){
    e.preventDefault();

	var form_action = $("#edit-item").find("form").attr("action");
	var id = $("#edit-item").find("input[name='id']").val();
	var nama_produk = $("#edit-item").find("input[name='nama_produk']").val();
	var keterangan = $("#edit-item").find("select[name='keterangan']").val();
	var harga = $("#edit-item").find("input[name='harga']").val();
	var jumlah = $("#edit-item").find("input[name='jumlah']").val();
	console.log(id);
	$.ajax({
		dataType: 'json',
		type: 'PUT',
		url :form_action + "/" +id,
		data : {nama_produk:nama_produk,keterangan:keterangan,harga:harga,jumlah:jumlah}
	}).done(function(data){
		window.location.href = "http://localhost:8001/";
	});
});
