
<?php include( 'head.html' ); ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errormsg = [];

        if (isset($_POST['ncin']) && !empty($_POST['ncin'])) {
            $ncin = htmlspecialchars($_POST['ncin']);
        } else {
            $errormsg[] = "Ncin is required.";
        }
    
        if (isset($_POST['equipment']) && !empty($_POST['equipment'])) {
            $equipment = htmlspecialchars($_POST['equipment']);
        } else {
            $errormsg[] =  "equipment is required.";
        }        
       
        if (!empty($errormsg)) {

            $errormsg = $errormsg;
            
        } else {

            $checkClient = getClientById( $clientModel, $ncin );
            if ($checkClient == true) {
                # code...              
                $checkEquipment = getEquipmentById( $equipmentModel, $equipment );
                if ($checkEquipment ['available'] == 'N') {

                        # code...
                    $newsAvailable = 'O';
                    $updateEquipment = updateEquipment($equipmentModel, $equipment, $newsAvailable );
                    if ($updateEquipment  == true ) {
                        # code...
                        $successmsg = [
                            "Confirmation message!",
                            "You have suceesfully updated an equipment Available!",
                        ];
                    } else {
                        $errormsg[] = "Sorry!";
                    }
                } else {
                    $errormsg[] = "Equipment not available!";
                }
            } else {
                $errormsg[] = "Ncin not found!";
            }
            
        }
    }
    ?>
<body>
    <div class="container header">
        <div class="row">
            <div class="col-md-12">
                    <h2>Leisure Equipment Rental</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar">
                
                <?php 
                    $template = 'web/views/sidebar.html';
                    echo render_template($template,
                        array(
                            
                            
                        )
                    );
                ?>
               
            </div>
            <div class="col-md-9">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!empty($errormsg)) {
                        foreach ($errormsg as $error) {
                            echo "<p style='color:red;'>$error</p>";
                        }
                    } else {
                        foreach ($successmsg as $succes) {
                            echo "<p style='color:red;'>$succes</p>";
                        }
                        
                    }
                } else {
                    $equipments = getAllEquipments($equipmentModel);
                    $template = 'web/views/return.html';
                    // foreach ( $equipments as $equipment ) {
            
                        echo render_template($template,
                            array(
                                'equipments' => $equipments,
                                
                                
                            )
                        );
                    // }
                }
                    
                ?>
            </div>
           
        </div>
    </div>
    <div class="container footer">
        <div class="row">
            <div class="col-md-12">
                    <h6>Contact us at 33 100 100    =>  @fombae</h6>
            </div>
        </div>
    </div>
  
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


