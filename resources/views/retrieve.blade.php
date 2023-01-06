<!DOCTYPE html>
<html>

<head>
    <title> Retrive data</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/38fda32e13.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>

<style>
    * {
        margin: 0;

    }

    .nav {
        width: 100%;
        height: 50px;
        background-color: rgba(221, 207, 207, 0);
        box-shadow: 10px 20px 25px rgba(0, 0, 0, .1);
    }

    span {
        color: rgb(131, 15, 239);
        font-size: 10px;
        /* padding-left: 5px; */
        line-height: 50px;
        font-weight: bold;
        font-family: cursive;
    }

    .nav ul {
        float: right;
        /* padding-right: 20px; */
    }

    .nav ul li {
        display: inline-block;
        /* margin: 0 10px; */
        line-height: 50px;
    }

    .nav ul li a {
        /* color:white; */
        padding: 15px 10px;
        text-decoration: none;
    }

    .nav ul li a:hover {
        color: rgb(0, 179, 255);
        text-decoration: none;
    }

    /* .container{
    padding-top: 100px;
    display:block;
} */


    /* .vertical-nav li {
    margin: 0 30px;
    line-height: 50px;
}

.vertical-nav li a:hover {
    text-decoration: none;
} */

    th {
        color: rgb(22, 10, 156);
        background-color: #96D4D4;
    }

    tr {
        border-radius: 8px;
    }

    /* .wrapper {
    display: flex;
    position: relative;
} */

    .wrapper .sidebar {
        width: 200px;
        height: 100vh;
        background: #4b4276;
        padding: 30px 0px;
    }

    .wrapper .sidebar h2 {
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
    }

    .wrapper .sidebar ul li {
        padding: 15px;
        list-style-type: none;

    }

    .wrapper .sidebar ul li a {
        color: #bdb8d7;
        display: block;
    }

    .wrapper .sidebar ul li a .fas {
        width: 25px;
    }


    .wrapper .sidebar ul li:hover a {
        color: #fff;
        text-decoration: none;
    }

    .btn-btn-primary {
        float: right;
        background-color: #96D4D4;
        border: none;
        margin-right: 20px;
        /* padding-bottom: 10px; */
        font-size: 15px;
        border-radius: 5px;
    }
    .page{
        font-size:25px;
    }


</style>

<body>
    <!-- <div class="container-fluid"> -->
    <div class="nav">

        <span class="page">Administration</span>

        <ul>
            <li><i class="fa-solid fa-user"></i> Admin</li>
            <li><a href="index.php">Log out</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-2 sys">
            <div class="wrapper">
                <div class="sidebar">
                    <ul>
                        <li><a href="retrieve"><i class=" fas fa-solid fa-cart-shopping"></i>products</a></li>
                        <li><a href="categories"><i class=" fas fa-duotone fa-bell"></i>categories</a></li>

                    </ul>

                </div>
            </div>
        </div>

        <!-- <div class="container-fluid"> -->
        <div class="col-md-10">
            <a href="add">  <button class="btn-btn-primary"><i class="fa-solid fa-plus"></i></button></a><br><br>

            <table class="table table-bordered table-striped">


                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>GST</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($form as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->product }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->gst }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->description }}</td>
                            <td><img src="{{ asset('uploads/' . $item->filename) }}" width='70px' height='70px'>
                            </td>


                            <td><a href="{{ url('edit/' . $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-pencil-square"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></a></td>
                            <td><a href="{{ url('delete/' . $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-trash3-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg></i></a></td>
                            {{-- <td><a href="{{ url('view/' . $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-trash3-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg></i></a></td> --}}

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="header">
                <span>
            {{$form->links()}}
                </span>
            </div>
        </div>
    </div>

</body>

</html>
