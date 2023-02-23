<!DOCTYPE html>
<html>
<title>Bootstrap</title>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .cricket {
            background-color: #1a202c;
            color: white;
            padding: 15px;
            margin-top: 15px;
        }
        img {
            height: 500px;
            width: 300px;
        }
    </style>
</head>
<body>
<header class="bg-dark fixed-top">
    <ul class="nav justify-content-center ">
        <li class="nav-item"><a class="nav-link text-white" href="http://20.198.242.223/admin"> Home </a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"> Product </a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"> About </a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#"> Log Out</a></li>
    </ul>
</header>
<div class="container cricket">
    <h1> Cricket </h1>
    <p>
        Cricket is a popular sport played in many countries around the world. It is a bat-and-ball game that involves
        two teams of 11 players each.
        The objective of the game is to score as many runs as possible while also trying to get the other team's players
        out.
        The game is played on a circular or oval-shaped field with a rectangular 22-yard-long pitch in the middle
    </p>
    <button class=" btn btn-outline-success p-2 mb-3"> Click me</button>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 bg-primary">
            <h2> Cricket </h2>
            <p>
                Cricket is a popular sport played in many countries around the world. It is a bat-and-ball game that
                involves two teams of 11 players each.
                The objective of the game is to score as many runs as possible while also trying to get the other team's
                players out.
                The game is played on a circular or oval-shaped field with a rectangular 22-yard-long pitch in the
                middle
            <footer class="blockquote-footer">
                Asif Rahman <cite>Brain Station-23</cite>
            </footer>
            </p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 bg-secondary text-info">
            <h2> Football </h2>
            <p class="">
                Cricket is a popular sport played in many countries around the world. It is a bat-and-ball game that
                involves two teams of 11 players each.</P>
                <a href="#demo" data-bs-toggle="collapse"> Learn more</a>

                <div id="demo" class="collapse">
             <p>The objective of the game is to score as many runs as possible while also trying to get the other team's
                players out.
                The game is played on a circular or oval-shaped field with a rectangular 22-yard-long pitch in the
                middle</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 bg-dark">
            <h2 class="text-white"> Table Tennis </h2>
            <p class="text-muted">
                Cricket is a popular sport played in many countries around the world. It is a bat-and-ball game that
                involves two teams of 11 players each.
                The objective of the game is to score as many runs as possible while also trying to get the other team's
                players out.
                The game is played on a circular or oval-shaped field with a rectangular 22-yard-long pitch in the
                middle
            </p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 bg-danger text-dark">
          <h2><abbr title="hockey">HK</abbr></h2>
            <p>
                Cricket is a popular sport played in many countries around the world. It is a bat-and-ball game that
                involves two teams of 11 players each.
                The objective of the game is to score as many runs as possible while also trying to get the other team's
                players out.
                The game is played on a circular or oval-shaped field with a rectangular 22-yard-long pitch in the
                middle
            </p>
        </div>
    </div>
</div>


<div class="container text-center" >
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>University</th>
            <th>CGPA</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Jill</td>
            <td>London</td>
            <td>LIU</td>
            <td>3.50</td>
        </tr>
        <tr>
            <td>Asif</td>
            <td>Rajshahi</td>
            <td>SEU</td>
            <td>3.24</td>
        </tr>
        <tr>
            <td>Pavel</td>
            <td>Rangpur</td>
            <td>AIUB</td>
            <td>3.0</td>
        </tr>
        <tr>
            <td>Tanmoy</td>
            <td>Chitagong</td>
            <td>AIUB</td>
            <td>3.30</td>
        </tr>
        </tbody>
    </table>
</div>

<h2 class="title container text-center"> Form </h2>

<form class="bg-dark text-white container mb-3">
    <div class="mb-3">
        <label class="form-label mt-3">Name:</label>
        <input class="form-control" type="text" placeholder="Enter Your Name">
        <div class="form-text">
            Please fill the field
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Address:</label>
        <input class="form-control" type="text" placeholder="Enter your Address">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone Number:</label>
        <input class="form-control" type="text" placeholder="Enter your Phone Number">
    </div>
</form>

<div class="container bg-black">
    <img class="d-block m-auto img-fluid border border-primary rounded-circle " src="{{ asset('1675942902.jpg') }}" />
</div>

<div class="container bg-dark">
<footer >
    <ol class="pagination py-3 justify-content-center">
        <li class="page-item"><a class="page-link" href="#"> Pre </a></li>
        <li class="page-item"><a class="page-link" href="#"> 1 </a></li>
        <li class="page-item"><a class="page-link" href="#"> 2 </a></li>
        <li class="page-item"><a class="page-link" href="#"> 3 </a></li>
        <li class="page-item"><a class="page-link" href="#"> 4 </a></li>
        <li class="page-item"><a class="page-link" href="#"> Next </a></li>
    </ol>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>



