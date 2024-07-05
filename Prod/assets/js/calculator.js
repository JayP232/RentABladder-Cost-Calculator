// calculator.js
function calculateCost() {
    var days = document.getElementById('rental-days').value;
    var service = document.getElementById('service-option').value;
    var poolSize = document.getElementById('pool-size').value;

    if (!poolSize) {
        var length = document.getElementById('pool-length').value;
        var width = document.getElementById('pool-width').value;
        var height = document.getElementById('pool-height').value;
        poolSize = length * width * height;
    }

    var data = {
        'action': 'calculate_cost',
        'days': days,
        'service': service,
        'pool_size': poolSize
    };

    jQuery.post(ajaxurl, data, function(response) {
        document.getElementById('results').innerHTML = response;
    });
}

