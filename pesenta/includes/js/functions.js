function change_status(x){
var	slct_id=x.id;
var slct_val=x.value;
var paid_id='paid.'+ slct_id;

var request = $.ajax({
		url: "refrsh.php",
		type:"POST",
		data: {value: slct_val, id:slct_id },
		dataType: 'json',
		success:function(data) {
			var y = document.getElementById(paid_id);
			if(slct_val=="не платени"){
				slct_val="";
			}
			y.innerHTML = slct_val;
			document.getElementById('tot_books').innerHTML="Платени :"+data;
		},
		error:function(){
			alert("Опа, грешка. Нещо не е наред. Пробвайте пак и ако не стане - бийте един ctrl + F5 и ако пак нищо не стане пишета на бат Ал да види що така.");
		}
		})
}
