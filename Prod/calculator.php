<?php
// calculator.php
include 'bladder-data.php';
include 'service-options.php';

function calculate_volume($length, $width, $height) {
    return $length * $width * $height;
}

function find_combinations($pool_size, $BLADDERS) {
    $valid_combinations = array();
    $bladder_sizes = array_keys($BLADDERS);

    $combinations = combinations_with_replacement($bladder_sizes);

    foreach ($combinations as $combo) {
        if (array_sum($combo) >= $pool_size) {
            $valid_combinations[] = $combo;
        }
    }

    return $valid_combinations;
}

function calculate_cost($combination, $days, $service, $BLADDERS, $SERVICES) {
    $bladder_cost = 0;
    foreach ($combination as $bladder) {
        $bladder_cost += $BLADDERS[$bladder] * $days;
    }
    $service_cost = $SERVICES[$service]['once_off_cost'];
    $security_deposit = $SERVICES[$service]['additional_security_deposit'];
    $total_cost = $bladder_cost + $service_cost + $security_deposit;

    return $total_cost;
}

function find_cheapest_option($combinations, $days, $service, $BLADDERS, $SERVICES) {
    $cheapest_combination = null;
    $lowest_cost = PHP_INT_MAX;

    foreach ($combinations as $combo) {
        $cost = calculate_cost($combo, $days, $service, $BLADDERS, $SERVICES);
        if ($cost < $lowest_cost) {
            $lowest_cost = $cost;
            $cheapest_combination = $combo;
        }
    }

    return array($cheapest_combination, $lowest_cost);
}
?>

