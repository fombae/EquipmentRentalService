
<?php include_once( 'functions.php' );?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Week 6</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Week 6</h2>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    &lt;?php <br>
                        $ch = ' We study the php and css.... ';<br>
                        echo strlen( $ch ); 
                    ?&gt;
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <p><?php
                        $ch = ' We study the php and css.... ';
                        echo strlen( $ch ); 
                    ?></p>
                </div>
            </div>
           
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    &lt;?php <br>
                        $ch = ' We study the php and css.... ';<br>
                        $trimme = trim($ch);<br>
                        echo strlen( $ch ); 
                    ?&gt;
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <p><?php
                        $ch = ' We study the php and css.... ';
                        echo strlen( trim($ch)); 
                    ?></p>
                </div>
            </div>           
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    &lt;?php <br>
                        $ch = ' We study the php and css.... ';<br>
                        $trimme = trim($ch);<br>
                        $removePeriod = str_replace('.', '', $trimme);
                        echo strlen( $removePeriod ); 
                    ?&gt;
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <p><?php
                        $ch = ' We study the php and css.... ';
                        echo strlen( trim(str_replace('.', '',$ch))); 
                    ?></p>
                </div>
            </div>           
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    &lt;?php <br>
                        $address = "non@domain.fr";<br>
                        $arobase = "@";<br>                        
                        $position = strpos($address, $arobase);
                        echo $position . '<br>';   
                        echo substr($address, 4); 
                    ?&gt;
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <p><?php 
                        $address = "non@domain.fr";
                        $arobase = "@";   
                        $position = strpos($address, $arobase);    
                        echo $position . '<br>';   
                        echo substr($address, 4);            
                    ?></p>
                </div>
            </div>           
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    &lt;?php <br>
                        $ch = "Dear Person,<br> Thank you for joining us. Thank you person for your participation. It very kind of you.<br>See you soon person";<br>
                        echo str_ireplace("Person", "Fomba", $ch );    
                    ?&gt;
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <p><?php 
                        $ch = "Dear Person,<br> Thank you for joining us. Thank you person for your participation. It very kind of you.<br>See you soon person";   
                        echo str_ireplace("Person", "Fomba", $ch );            
                    ?></p>
                </div>
            </div>           
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    &lt;?php <br>
                        $name = "Starchirs";<br>
                        $mail = "KOUBA01@domin.fr";<br>
                        echo strtoupper($name );  
                        echo "<br>";
                        echo strtolower($mail );    
                    ?&gt;
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <p><?php 
                        $name = "Starchirs";
                        $mail = "KOUBA01@domin.fr";
                        echo strtoupper($name );    
                        echo "<br>";                        
                        echo strtolower($mail );           
                    ?></p>
                </div>
            </div>           
        </div>
    </div> 
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    &lt;?php <br>
                        $ch = "STIMEET";<br>           
                        echo strrev($ch );     
                    ?&gt;
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <p><?php 
                        $ch = "STIMEET";                        
                        echo strrev($ch );           
                    ?></p>
                </div>
            </div>           
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


