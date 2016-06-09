@extends('layouts.default')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-md-12 col-sm-12 col-xs-12 col-sm-offset-1" style="margin-bottom: 20px; margin-top: 20px;">
	<form id="frmLevelCategory" class="form-inline" method="POST">
	  	<div class="form-group">
	  		<input class="jsToken" type="hidden" value="{!! csrf_token() !!}">
	    	<select class="form-control col-sm-3 jsLevel" name="level">
	    		<option value="">---Select Level---</option>
	    		<?php foreach ($levels as $key => $level) {?>
	    		<option value="{!! $key !!}">{!! $level !!}</option>
	    		<?php }?>
			</select>
		    <select class="form-control col-sm-3 jsExercise" name="category">
			  	<option value="">---Select exercise---</option>
			</select>
	  		<button type="button" class="btn btn-primary jsGo">Go</button>
	  	</div>
	  	<br>
	  	<div class="form-group">
	  		<label class="error"></label>
	  	</div>
	</form>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
	<div class="jsContent" style="text-align: center;">
		<img src="/uploads/images/qa.png" alt="?"/>
	</div>
</div>
<button type="button" style="display:none;"  class="btn btn-primary jsShowResult" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content col-md-12 col-sm-12 col-xs-12">
      		<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Test results</h4>
	      	</div>
	      	<div class="modal-body jsContentResult">

	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<button type="button" class="btn btn-primary">Save</button>
	      	</div>
    	</div>
  	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.jsGo').on('click', function(){
			$('.error').hide();
			var _level = $('select[name=level]').val();
			if(_level == '') {
				$('.error').html('Please select level').show();
				return false;
			}
			var _category = $('select[name=category]').val();
			if(_category == '') {
				$('.error').html('Please select exercise').show();
				return false;
			}
			
			var _url = '/question/exercise/'+ _category;
			var _token = $('.jsToken').val();
			$.ajax({
				'url': _url,
				'type': 'GET',
				'dataType': 'JSON',
				'headers': {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				success: function(res){
					var data = res.data;
					if(data.length != 0){
						var _html = '<form id="frmQA" class="form-horizontal">'+
										'<input type="hidden" name="level_id" value="'+ _level +'"/>'+
										'<input type="hidden" name="category_id" value="'+ _category +'"/>'+
										'<div id="wizard" class="form_wizard wizard_horizontal jsContent">'+
											'<ul class="wizard_steps">'+
									            '<li>'+
									                '<a href="#question-1">'+
									                    '<span class="step_no">1</span>'+
									                '</a>'+
									            '</li>'+
									            '<li>'+
									                '<a href="#question-2">'+
									                    '<span class="step_no">2</span>'+
									                '</a>'+
									            '</li>'+
									            '<li>'+
									                '<a href="#question-3">'+
									                    '<span class="step_no">3</span>'+
									                '</a>'+
									            '</li>'+
									            '<li>'+
									                '<a href="#question-4">'+
									                    '<span class="step_no">4</span>'+
									                '</a>'+
									            '</li>'+
									            '<li>'+
									               ' <a href="#question-5">'+
									                    '<span class="step_no">5</span>'+
									                '</a>'+
									            '</li>'+
									        '</ul>'+
									        '<div class="questions">'+
										        	'<div id="question-1"></div>'+
										        	'<div id="question-2"></div>'+
										        	'<div id="question-3"></div>'+
										        	'<div id="question-4"></div>'+
										        	'<div id="question-5"></div>'+
										    '</div>'+
										'</div>' +
									'</form>';
						$('.jsContent').html(_html).attr('style','');
						$('#question-1, #question-2, #question-3, #question-4, #question-5').html('');
						$.each(data, function(key, val) {
							var awnsers = val.awnsers;
							var _html = '<div class="col-sm-offset-1">' + 
									'<input type="hidden" name="question[]" value="'+val.id+'">'+
							    	'<h5><strong>'+ (key + 1) + '. ' + val.content + '</strong></h5>' +
							    	'<div class="awnsers col-sm-offset-1">';
								    $.each(awnsers, function(i, awnser) {
								    	var _type = '';
								    	switch (i)
										{
										   	case 0:
										   		_type = 'a) ';
								    			break;
										   	case 1:
										   		_type = 'b) ';
								    			break;
								    		case 2:
										   		_type = 'c) ';
								    			break;
								    		case 3:
										   		_type = 'd) ';
								    			break;
										}
								    	_html = _html + '<div class="radio">' +
											  	'<label>' +
											    	'<input type="radio" name="awnser_'+ val.id +'" id="awnser_'+ (key + 1) +'_'+(i + 1)+'" value="'+(i + 1)+'">' +
											    	_type + awnser.content +
											  	'</label>' +
											'</div>';
								    });
							    	_html = _html + '</div>';
					        $('#question-1').append(_html);
					    });
						// Smart Wizard     
                		$('#wizard').smartWizard();
					}else {
						$('.jsContent').html('<p><h3>No result</h3></p>');
					}
				},
			    error: function(errMsg) {
			        console.log(errMsg);
			    }
			});
		});

		$('.jsLevel').on('change', function(){
			var _id = $(this).val();
			if(_id != '') {
				var _url = '/question/category/'+ _id;
				var _token = $('.jsToken').val();
				$.ajax({
					'url': _url,
					'type': 'GET',
					'dataType': 'JSON',
					'headers': {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
					success: function(res){
						var data = res.data;
						if(data != null){
							$('.jsExercise').html('<option value="">---Select exercise---</option>');
							$.each(data, function(key, val) {
						        $('.jsExercise').append('<option value="'+ val.id + '">'+ val.name +'</option>');
						    });
						}
					},
				    error: function(errMsg) {
				        console.log(errMsg);
				    }
				});
			}else {
				$('.jsExercise').html('<option value="">---Select exercise---</option>');
			}
		});

	});
	function onFinishCallback() {
        $('#wizard').smartWizard('showMessage', 'Finish Clicked');
        alert('Finish Clicked');
    }
</script>
@stop