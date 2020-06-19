<!DOCTYPE html>
<html>
<head>
    <title>HNG Wallet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="wallet.homepage.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="shortcut icon" type="image/jpg" href="/favicon.ico"/>
</head>
<body id="body">
<header>
    <div class="main">
        <a href="https://hotels.ng//"><img src="images/hng-logo.jpeg" class="logo" alt="hng logo"></a>
        <h1>HNG Wallet</h1>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="https://hng.tech/about">About</a></li>
            <li><a href="https://hng.tech/">Services</a></li>
        </ul>
    </nav>
</header>

<?php
include_once __DIR__ . '/vendor/autoload.php';
use Wallet\{Wallet, TestClass};

if(isset($_POST['submit'])){
    try{
        TestClass::testCountry($_POST['country']);
        $network = TestClass::testNetwork($_POST['network']);
        $amount = TestClass::testAmount($_POST['amount']);
        $number = TestClass::testNumber($_POST['number']);
        $wallet = new Wallet(getenv('purchase_url'),getenv('Secret_Key'));
        $wallet->connect()->Details($network,$amount,$number);
        $output = $wallet->send();
        $info = json_decode($output,true);
        $code = $info['ResponseCode'];
        switch ($code){
            case "100":
                echo    '<div class="w-100">
                            <div class="modal  fade bd-example-modal-lg pulse animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="alert alert-success" role="alert">
                                                <strong>'.$info['Message'].'</strong> 
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $("#myModal").modal(\'show\');
                            });
                        </script>';
                unset($_POST);
                break;
            case "200":
                echo    '<div class="w-100">
                            <div class="modal  fade bd-example-modal-lg pulse animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="alert alert-primary" role="alert">
                                                <strong>'.$info['Message'].'</strong> 
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $("#myModal").modal(\'show\');
                            });
                        </script>';
                break;
            case "400":
                echo    '<div class="w-100">
                            <div class="modal  fade bd-example-modal-lg pulse animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="alert alert-danger" role="alert">
                                                <strong>'.$info['Message'].'</strong> 
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $("#myModal").modal(\'show\');
                            });
                        </script>';
                break;
        }

    }catch (PDOException $e){
        echo '<div class="w-100">
                            <div class="modal  fade bd-example-modal-lg pulse animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="alert alert-danger" role="alert">
                                                <strong>'.$e->getMessage().'</strong> 
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $("#myModal").modal(\'show\');
                            });
                        </script>';
    }
}

?>
<div class="space" style="height: 2rem;"></div>'
<div class="bg-cover">
    <p style="text-align: left; color:white; padding:2rem; margin-left:13rem;  padding-left:3rem; font-size:60px">Airtime Top Up</p>
</div>
<div class="row">
    <div class="col col-lg-8 offset-lg2 m-auto  col-md-12  col-sm-12 p-sm-5 p-md-5 ">
        <form class="user" action="#" method="POST">
    <div class="form-container  shadow ">
        <h3 >Send to</h3>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label for="inputCountry">country</label>
                    <select required name="country" class="form-control form-control-user" id="inputCountry" style=" height:50px;">
                        <option>Select Country</option>
                        <option>Ghana</option>
                        <option>Nigeria</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="inputMobileNetwork">mobile network</label>
                    <select required name="network" class="form-control" id="inputMobileNetwork" style="height:50px;">
                        <option>Select Network</option>
                        <option>MTN</option>
                        <option>Airtel</option>
                        <option>Glo</option>
                        <option>Etisalat</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12  ">
                <div class="form-group " >
                    <label for="inputAmount">amount</label>
                    <input required name="amount" type="text" class="form-control " id="inputAmount" placeholder="amount" style="height:50px;" value="<?php if(isset($_POST['amount'])) echo $_POST['amount']; ?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-12  ">
                <div class="form-group " >
                    <label for="inputNumber">Mobile No</label>
                    <input required name="number" type="text" class="form-control " id="inputNumber" placeholder="Number" style="height:50px;" value="<?php if(isset($_POST['number'])) echo $_POST['number']; ?>">
                </div>
            </div>
        </div>
        <div class="send-btn-container ">
            <input type="hidden" name="submit" value='true'>
            <button type="submit" class="btn btn-primary-new">SEND</button>
        </div>
    </div>
</form>
    </div>
</div>
</div>


    </body>
</html>
