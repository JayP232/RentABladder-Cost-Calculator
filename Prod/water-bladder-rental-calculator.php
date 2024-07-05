<?php
/*
Plugin Name: Water Bladder Rental Calculator
Description: A calculator for determining the cost of renting water bladders.
Version: 1.0
Author: Jason Petrie
*/

include 'includes/bladder-data.php';
include 'includes/service-options.php';
include 'includes/calculator.php';

function bladder_rental_calculator_shortcode() {
    ob_start();
    ?>
    <div id="calculator-container">
        <label for="rental-days">Enter the number of rental days:</label>
        <input type="number" id="rental-days" name="rental-days"><br>

        <label for="service-option">Enter the service option (DIY, Full Delivery and Collection, Drop & Collect):</label>
        <input type="text" id="service-option" name="service-option"><br>

        <label for="pool-size">Enter the pool size in litres (or leave blank to input pool dimensions):</label>
        <input type="number" id="pool-size" name="pool-size"><br>

        <label for="pool-length">Enter the pool length in meters:</label>
        <input type="number" id="pool-length" name="pool-length"><br>

        <label for="pool-width">Enter the pool width in meters:</label>
        <input type="number" id="pool-width" name="pool-width"><br>

        <label for="pool-height">Enter the pool height in meters:</label>
        <input type="number" id="pool-height" name="pool-height"><br>

        <button onclick="calculateCost()">Calculate Cost</button>

        <div
