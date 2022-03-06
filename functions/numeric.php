<?php
//funkcja do sprawdzania czy dana zmienna jest liczba i jest z podanego zakresu $AMin - $AMax
function ivpifr($ANo, $AMin, $AMax)
{
    return
        preg_match('^[0-9]{1,10}$', $ANo) &&
        ($ANo >= $AMin) &&
        ($ANo <= $AMax);
}

//funkcja do sprawdzania czy dana zmienna jest liczba 
function ivpi($ANo)
{
    return preg_match('^[0-9]{1,10}$', $ANo);
}
?>