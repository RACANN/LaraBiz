<?php







function dbConnect(){
    $con = mysqli_connect("127.0.0.1", "root", "", "employeemanagement");

    if(!$con){
        return false;
    }
    $con->autocommit(TRUE);
    return $con;
}

function searchByLastName($lastname){
    $employees = dbConnect()->query("select * from employees where last_name like'%$lastname%'");

    foreach($employees as $employee){
        foreach($employee as $k=>$v){
            echo $v;
            echo "<br>";
        }
    }
}

function getAllEmployees(){
    $employees = dbConnect()->query("select * from employees");

    foreach($employees as $employee){
        foreach($employee as $k=>$v){
            echo $v;
            echo "<br>";
        }
    }
}

?>

<html>
<head>

</head>
<body>
<?php
echo "Vanilla php baby!";
//searchByLastName("cann");
?>
<p><b>Start typing a name in the input field below:</b></p>
<form>
    First name: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>
<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "/search/"+str, true,);
            xmlhttp.send();
        }
    }
</script>
</body>
</html>
