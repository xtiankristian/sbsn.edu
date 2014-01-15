var a = 0;
var b = 0;
function add(){
a++;
$(document).ready(function(){
    $("#choi").append('<p>Answer ' + (a) + '<input type="text" name="ans' + (a) + '"/>');
	$("#opts").append("<option>"+ a + "</option>");
});

//document.getElementById("lol").value.innerHTML = "Add" + a + "answers";
}

function multipleadd(){
b++;
$(document).ready(function(){
    $("#choi1").append('<p>Answer ' + (b) + '<input type="text" name="answer' + (b) + '"/>' + ' Correct answer? <input type="checkbox" name="check[]" value="'+(b)+'"/>');
});
}

function input(){
	len = document.f1.question_type.length;
	i = 0;
	chosen = "none";
	for (i = 0; i < len; i++) {
		if (document.f1.question_type[i].selected) {
			chosen = document.f1.question_type[i].value
		} 
	}
	if(chosen=="Paragraph/Essay"){
		$(document).ready(function(){
			$("#question_type").click(function(){
			$("#appear2").show(750);
			$("#appear1").hide(750);
			$("#appear3").hide(750);
			$("#appear4").hide(750);
		});
	});
	}
	else if(chosen=="Multiple Choice - 1 answer only"){
		$(document).ready(function(){
			$("#question_type").click(function(){
			$("#appear1").show(750);
			$("#appear2").hide(750);
			$("#appear3").hide(750);
			$("#appear4").hide(750);
		});
	});
	}
	else if(chosen=="Multiple Choice - Multiple Answers"){
		$(document).ready(function(){
			$("#question_type").click(function(){
			$("#appear4").show(750);
			$("#appear2").hide(750);
			$("#appear3").hide(750);
			$("#appear1").hide(750);
		});
	});
	}
	else{
		$(document).ready(function(){
			$("#question_type").click(function(){
			$("#appear3").show(750);
			$("#appear4").hide(750);
			$("#appear2").hide(750);
			$("#appear1").hide(750);
		});
	});
	}

	return chosen;
}