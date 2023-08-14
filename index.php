<?php

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>add delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style type="text/css">
        body{
           background-color: #ebeff5;
        }
		.delete{
			padding: 0;
            margin-bottom: 3px;
		}
	</style>
</head>

<body>
		<div class="my-5" >
			<div class="d-flex flex-column align-items-center">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <p class="card-text">Добавить контакт</p>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <form method="POST" id="ins_rec">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Имя">
                                <div id="msg_1" class="form-text text-danger"></div>
                            </div>

                            <div class="mb-3">
                                <input type="text" name="phone" class="form-control" placeholder="Телефон">
                                <div id="msg_2" class="form-text text-danger"></div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary active">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-4" id="tbl_rec">

                </div>

			</div>

		</div>
	
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>


<script type="text/javascript">
	
$(document).ready(function (){
	$('#tbl_rec').load('record.php');

	$('#ins_rec').on("submit", function(e){
		e.preventDefault();

        console.log($(this).serialize());
		$.ajax({
			type:'POST',
			url:'insprocess.php',
			data: $(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
                    $('#ins_rec').trigger('reset');
                    $('#msg_1').text('');
                    $('#msg_2').text('');
				}
				else if(json.status == 102){
					$('#sc_msg').text(json.msg);
				}
				else if(json.status == 103){
					$('#msg_1').text(json.msg);
				}
				else if(json.status == 104){
					$('#msg_2').text(json.msg);
				}
				else if(json.status == 105){
					$('#msg_3').text(json.msg);
				}
				else if(json.status == 106){
					$('#msg_4').text(json.msg);
				}
				else if(json.status == 107){
					$('#msg_5').text(json.msg);
				}
				else{
					console.log(json.msg);
				}
			}
		});

	});

    $(document).on("click", ".delete", function() {
        let deleteid = $(this).data("data-id");
        $.ajax({
        	type:'POST',
        	url:'deleteprocess.php',
        	data:{delete_id : deleteid},
        	success:function(data){
        		var json = JSON.parse(data);
        		if(json.status == 0){
        			$('#tbl_rec').load('record.php');
        			console.log(json.msg);
        		}
        		else{
        			console.log(json.msg);
        		}
        	}
        });
    });


});

</script>

</body>
</html>
