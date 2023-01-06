<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <label>name</label>
    <input type="text" id="name">
    <span id="err"></span>
    <button onclick="validate()">submit</button>
    <script>
        function validate(){
            let name = document.getElementById('name').value;

            if(name==""){
                document.getElementById('err').innerHTML="enter name"
            }else{
                document.getElementById('err').innerHTML=""
            }
        }
    </script>
</body>
</html>
