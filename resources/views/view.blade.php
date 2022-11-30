<!DOCTYPE html>
<html>

<head>
    <title> Retrive data</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/38fda32e13.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

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

    .page {
        font-size: 25px;
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
            <a href="add"> <button class="btn-btn-primary"><i class="fa-solid fa-plus"></i></button></a><br><br>


            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Shipping Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $form->address }}<br>{{ $form->email }}<br>
                            {{ $form->mobilenumber }}</td>



                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>




                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $form->product }}</td>
                        <td>{{ $form->seller }}</td>
                        <td>{{ $form->price }}</td>
                        <td>{{ $form->quantity }}</td>




                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>
