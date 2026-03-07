@php
    echo "ODD NUMBERS FROM 1 TO 50";
    echo "";
    
   
    $counter = 0;
    for ($i = 1; $i <= 50; $i++) {
        if ($i % 2 != 0) {
            echo str_pad($i, 4, " ", STR_PAD_LEFT);
            $counter++;
            
            if ($counter % 5 == 0) {
                echo "\n";
            }
        }
    }
    
    echo "";
    echo "Total: " . $counter . " odd numbers found.";
@endphp

@php
    function isPrime($number) {
        if ($number < 2) {
            return false;
        }
        
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        
        return true;
    }

    echo "Prime Numbers from 1 to 100:\n";
    
    

    for ($i = 1; $i <= 100; $i++) {
        if (isPrime($i)) {
            echo $i . " ";
        }
    }
    
    echo "\n";
@endphp;