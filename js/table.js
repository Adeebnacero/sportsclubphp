
/*$(document).ready(function)(){
	$.getJSON("$response", function(data)){
		var player-table = '';
		$.each(data, function(key, value){
			player-table += '<tr>';
			player-table += '<td>' + value.firstName + '</td>';
			player-table += '<td>' + value.lastName + '</td>';
			player-table += '<td>' + value.DOB + '</td>';
			player-table += '<td>' + value.ID + '</td>';
			player-table += '<td>' + value.position + '</td>';
			player-table += '<td>' + value.strongFoot + '</td>';
			player-table += '</tr>';
			
		});		
		$('player-table').append(player-table);
	});	
});*/


$(document).ready(function() {
    $.ajax({
        url: "$curl"
    }).then(function(data) {
	   $('player-table').append(data.firstName);
    });
});

$(document).ready(function(){
    var user = $('#username');
    var result = $('#result');
    $('#show').click(function(){
        if(user.val() !== ''){
            var config = {
                username: user.val()
            }

            $.ajax({
              url: 'addPlayer.php',
              dataType: "json",
              data: config,
              success: function(json){
                for(x in json){
                    result.append(json[x].text);
                }
              },
            });
        }
    });
});