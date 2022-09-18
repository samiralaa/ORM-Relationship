<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>

body{
    font:16px arial;
    margin: 0;
    padding: 0;
    background: #d1d1d1;
}

#wrapper{
    width: 1000px;
    margin: 50px auto 0;
    background-color: #fff;
}

#header{
    text-align: center;
    background-color: #BC1A3A;
    padding: 10px;
}

#header h1{
    color: #fff;
    font-size: 40px;
    font-style: italic;
    font-weight: 700;
    text-transform: uppercase;
    margin: 0;
}

#menu{
    background-color: #333;
}
#menu ul{
    font-size: 0;
    padding: 0 10px;
    margin: 0;
    list-style: none;
}
#menu ul li{
    display: inline-block;
}
#menu ul li a{
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    padding: 8px 10px;
    display: block;
    text-decoration: none;
    text-transform: uppercase;
    transition: all 0.3s ease;
}

#menu ul li a:hover{
    background-color: rgba(255,255,255,0.2);
}

#main-content{
     padding: 25px;
    min-height: 400px;
}
#main-content h2{
    margin: 0 0 10px;
    text-transform: capitalize;
}

#main-content table{
    width: 100%;
    background-color: #555;
    margin: 0 0 20px;
}

#main-content table th{
    color: #fff;
    background-color: #333;
    text-transform: uppercase;
}
#main-content table th:last-child{
    width: 130px;
}
#main-content table td{
    background-color: #fff;
}
#main-content table td a{
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    padding: 3px 7px;
    color: #fff;
    background-color: #273dab;
    text-decoration: none;
    border-radius: 3px;
}
#main-content table td a:nth-child(2){
    background-color: #b31d15;
    margin: 0 0 0 5px;
}

#main-content .post-form{
    width: 50%;
    padding: 25px;
    margin: 0 auto 10px;
    background-color: #BC1A3A;
    border-radius: 10px;
}

#main-content .post-form .form-group{
    margin: 0 0 15px;
}

#main-content .post-form .form-group label{
    width: 30%;
    display: inline-block;
    font-weight: 600;
}
#main-content .post-form .form-group input,
#main-content .post-form .form-group select{
    font-size: 16px;
    width: 66%;
    display: inline-block;
    padding: 5px;
    margin: 0;
}
#main-content .post-form .form-group select{
    width: 69%;
}

#main-content .post-form .submit{
    font-size: 17px;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 5px 10px;
    color: #fff;
    background-color: #372f2f;
    border: none;
    border-radius: 5px;
    margin: 0 0 0 30%;
    cursor: pointer;
    transition: all 0.3s;
}

#main-content .post-form .submit:hover{
    box-shadow: 0 0 5px #555;
}

#main-content .pagination{
    padding: 0;
    margin: 0;
    list-style: none;
}
#main-content .pagination li{
    display: inline-block;
}
#main-content .pagination li a{
    height: 30px;
    width: 30px;
    line-height: 30px;
    font-size: 18px;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #1abc9c;
    display: block;
    margin: 0 5px 0 0;
    transition: all 0.3s;
}

#main-content .pagination li a:hover{
    background-color: #333;
}
    </style>
</html>
<body>
<div id="main-content">
    <h2>Update Record</h2>
    <form class="post-form" action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
 

    @csrf
        {{method_field('PUT')}}
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{$post->title}}" required/>
        </div>
        <div class="form-group">
            <label>Content</label>
            <input type="text" name="content" value="{{$post->content}}" required/>
        </div>
        <div class="form-group">
        </div>
  
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" required/>
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
</body>
</html>