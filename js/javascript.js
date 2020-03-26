function isnum(ele) {
	var r=/\D$/i;
	if(r.test(ele.value)) {
		 alert("please enter the price in number");
		 ele.value="";
		 ele.focus();
	 }
}

function isalphanum(ele) {
	var r=/\W$/i;
	if(r.test(ele.value))
	 {
		 alert("This field must contain characters letters and numbers only.");
		 ele.value="";
		 ele.focus();
	 }
}

function validateProjectForm() {
	var name = document.forms["add_project"]["name"].value;
	if (name == null || name == "") {
		alert("name is required, Please try again.");
		return false;
	}
	
	var supervisor = document.forms["add_project"]["supervisor"].value;
	if (supervisor == null || supervisor == "") {
		alert("supervisor is required, Please try again.");
		return false;
	}	
	
	var department_id = document.forms["add_project"]["department_id"].value;
	if (department_id == null || department_id == "<Choose Department>") {
		alert("No department selected or matched, Please select department.");
		return false;
	}
}
