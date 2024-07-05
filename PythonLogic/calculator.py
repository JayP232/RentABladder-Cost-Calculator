# calculator.py
from bladder_data import BLADDERS
from service_options import SERVICES
from itertools import combinations_with_replacement

def calculate_volume(length, width, height):
    return length * width * height

def find_combinations(pool_size):
    valid_combinations = []
    bladder_sizes = list(BLADDERS.keys())
    
    for i in range(1, len(bladder_sizes) + 1):
        for combo in combinations_with_replacement(bladder_sizes, i):
            if sum(combo) >= pool_size:
                valid_combinations.append(combo)
    
    return valid_combinations

def calculate_cost(combination, days, service):
    bladder_cost = sum(BLADDERS[bladder] for bladder in combination) * days
    service_cost = SERVICES[service]['once_off_cost']
    security_deposit = SERVICES[service]['additional_security_deposit']
    total_cost = bladder_cost + service_cost + security_deposit
    
    return total_cost

def find_cheapest_option(combinations, days, service):
    cheapest_combination = None
    lowest_cost = float('inf')
    
    for combo in combinations:
        cost = calculate_cost(combo, days, service)
        if cost < lowest_cost:
            lowest_cost = cost
            cheapest_combination = combo
    
    return cheapest_combination, lowest_cost

def display_cheapest_result(combination, days, service):
    if combination:
        cost = calculate_cost(combination, days, service)
        total_capacity = sum(combination)
        return combination, cost, total_capacity
    else:
        return None, 0, 0
