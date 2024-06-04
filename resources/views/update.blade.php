<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-container h2 {
            margin-bottom: 1em;
            color: #333;
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 0.5em;
            color: #333;
        }
        .form-container input {
            width: 100%;
            padding: 0.8em;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container button {
            width: 100%;
            padding: 0.8em;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @if(session('message'))
        <div>
            {{session('message')}}
        </div>
    @endif
    
    <div class="form-container">
        <h2>Update Employee</h2>
        <form action="{{route('employee.edit',['id'=>$employee->id ])}}" method="post">
            @csrf 
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{$employee->name}}" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email"  value="{{$employee->email}}" required>

            <label for="phone">Phone </label>
            <input type="text" name="phone" id="phone" value="{{$employee->phone}}" required>

            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" value="{{$employee->gender}}" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
