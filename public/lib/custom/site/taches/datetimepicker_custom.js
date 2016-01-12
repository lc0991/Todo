$(document).ready(function()
{
	var regDateFr = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/g;
	var regReplace = '$3/$2/$1 $4:$5';
	
	$('.datetimepicker-fr-convert').each(function()
	{
		$(this).html($(this).html().replace(regDateFr, regReplace));
	});
	
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth()+1;
	var year = date.getFullYear();
	var hours = date.getHours();
	var minutes = date.getMinutes();
	
	if(hours.length==1)
	{
		hours = "0"+hours;
	}
	
	if(minutes.length==1)
	{
		minutes = "0"+minutes;
	}
	
	$('.datetimepicker-fr').each(function(index)
	{
		var name = $(this).attr('name');
		var value = $(this).val();
		value = value.replace(regDateFr, regReplace);
		
		$(this).attr('name',name+'_copy_'+index);
		$(this).parent().append('<input value="'+value+'" type="text" id="'+name+'_copy_'+index+'" style="display:none" name="'+name+'">');
		
		$(this).datetimepicker({
			format: 'dd/mm/yyyy hh:ii',
			language:'fr',
			todayHighlight :true,
			weekStart: 1,
			autoclose: 1,
			startDate: day+"/"+month+"/"+year+" "+hours+":"+minutes,
			linkField: name+'_copy_'+index,
			linkFormat: "yyyy-mm-dd hh:ii"
		});
	});
	
	$('.datetimepicker-fr-autodate').val(day+"/"+month+"/"+year+" "+hours+":"+minutes);
	
});

// Forcer l'update de l'input hidden quand on fait un .val sur une input datepicker

(function($){
	var originalVal = $.fn.val;
	$.fn.val = function(){
		var prev;
		if(arguments.length>0){
			prev = originalVal.apply(this,[]);
		}
		var result = originalVal.apply(this,arguments);
		if(arguments.length>0 && prev!=originalVal.apply(this,[]))
		{
			if($(this).hasClass('datetimepicker-fr'))
			{
				$(this).datetimepicker('update',$(this).val());
			}
		}
		return result;
	};
})(jQuery);