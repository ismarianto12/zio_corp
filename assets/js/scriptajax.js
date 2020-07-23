function getCountMsg(id){
	$.ajax({
		url: 'getCountMsg',
		data: {id: id},
		method: 'POST',
		success: function(data){
			console.log(data);
		}
	})
}