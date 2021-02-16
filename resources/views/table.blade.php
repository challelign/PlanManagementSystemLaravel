<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset ('css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link href="{{asset ('css/datatables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('css/style.css')}}">

    <script src="{{asset ('css/bootstrap-select.css')}}"></script>
    <style>
        body {
            font-family: sans-serif;
        }

        #summation {
            font-size: 18px;
            font-weight: bold;
            color: #174C68;
        }

        .txt {
            background-color: #FEFFB0;
            font-weight: bold;
            text-align: right;
        }
    </style>


</head>
<body>

<div class="container">
    <div class="card-body">
        <p>Using Table</p>
        <table border="1" id="table">
            <thead>
            <tr>
                <th>sl</th>
                <th>TA</th>
                <th>DA</th>
                <th>HA</th>
                <th>Total</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td><input class="expenses"></td>
                <td><input class="expenses"></td>
                <td><input class="expenses"></td>
                <td><input class="expenses_sum"></td>


            </tr>
            <tr>
                <td>2</td>
                <td><input class="expenses"></td>
                <td><input class="expenses"></td>
                <td><input class="expenses"></td>
                <td><input class="expenses_sum"></td>

            </tr>
            <tr>
                <td>3</td>
                <td><input class="expenses"></td>
                <td><input class="expenses"></td>
                <td><input class="expenses"></td>
                <td><input class="expenses_sum"></td>

            </tr>
            </tbody>
        </table>
        <div class="col-md-12 nopadding">
            <div class="col-md-4 col-md-offset-4 pull-right nopadding">
                <div class="col-md-8 pull-right nopadding">
                    <div class="form-group">
                        <td><input class="form-control subtotal" type='text' id='subtotal' name='subtotal' readonly/>
                        </td>
                    </div>
                </div>
                <div class="col-md-3 pull-right">
                    <div class="form-group">
                        <label>Subtotal</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">

            <form class="text-center" style="color: #757575;" action="#!">
                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" id="materialRegisterFormFirstName" class="form-control">
                            <label for="materialRegisterFormFirstName">First name</label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <div class="md-form">
                            <input type="email" id="materialRegisterFormLastName" class="form-control">
                            <label for="materialRegisterFormLastName">Last name</label>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>


    <!-- End your project here-->

    <!-- jQuery -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

    <script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            //    using table
            $(document).ready(function () {
                $(".expenses").on('keyup change', calculateSum);
            });

            function calculateSum() {
                var $input = $(this);
                var $row = $input.closest('tr');
                var sum = 0;
                $row.find(".expenses").each(function () {
                    sum += parseFloat(this.value) || 0;
                    // var tot = sum.toFixed(2);
                    // $('.expenses_sum').val(tot);
                    calculateSubTotal();

                });
                $row.find(".expenses_sum").val(sum.toFixed(2));
                function calculateSubTotal() {
                    var subtotal = 0;
                    $('.expenses_sum').each(function () {
                        subtotal += parseFloat($(this).val());
                    });
                    $('#subtotal').val(subtotal);
                }
            }
        });
    </script>
</div>
</body>
</html>
