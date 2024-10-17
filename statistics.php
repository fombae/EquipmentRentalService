<?php include( 'head.html' ); ?>

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
            <div class="col-md-9 mt-3">
                <table>
                    <thead class="">
                        <tr>
                            <th>Label</th>
                            <th>Date of Rental (DateLoc)</th>
                            <th>Return Date (DateRet)</th>
                            <th>Hourly Price (PrixHeure)</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $rentals = getAllStistics($rentalModel );
                        if (!$rentals == null) {
                            # code...
                            $template = 'web/views/statistics.html';
                            foreach ( $rentals as $rental ) { 
                                $calculateDifferent = strtotime($rental['date_return']) - strtotime($rental['date_rent']);
                                $differentHours =  $calculateDifferent / 3600;

                        
                                //  var_dump($differentHours);
                                $getlabel = getEquipmentById( $equipmentModel, $rental['ref_equipment'] );    
                                echo render_template($template,
                                    array(
                                        'label' => $getlabel['label'], 
                                        'dateRent' => $rental['date_rent'],				
                                        'dateReturn' => $rental['date_return'],
                                        'prixHeure' => $getlabel['hourly_price'],
                                        'amount' => $differentHours * $getlabel['hourly_price'],
                                        
                                    )
                                );
                            }
                        }
                        
                    
                    ?>
                    </tbody>
                </table>
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


