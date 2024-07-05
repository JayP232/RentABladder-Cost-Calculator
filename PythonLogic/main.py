# main.py
from calculator import calculate_volume, find_combinations, find_cheapest_option, display_cheapest_result

def main():
    print("Welcome to the Water Bladder Rental Calculator! 🥷💧")
    calc_days = int(input("Enter the number of rental days: "))
    calc_service = input("Enter the service option (DIY, Full Delivery and Collection, Drop & Collect): ")
    
    calc_litres = input("Enter the pool size in litres (or press Enter to input pool dimensions): ")
    if not calc_litres:
        pool_length = float(input("Enter the pool length in meters: "))
        pool_width = float(input("Enter the pool width in meters: "))
        pool_height = float(input("Enter the pool height in meters: "))
        calc_litres = calculate_volume(pool_length, pool_width, pool_height)
    else:
        calc_litres = float(calc_litres)
    
    combinations = find_combinations(calc_litres)
    cheapest_combination, lowest_cost = find_cheapest_option(combinations, calc_days, calc_service)
    combo, cost, capacity = display_cheapest_result(cheapest_combination, calc_days, calc_service)
    
    print("Cheapest option:")
    if combo:
        print(f"Bladders: {combo}, Total Cost: R{cost}, Total Capacity: {capacity} litres")
    else:
        print("No valid bladder combination found.")

if __name__ == "__main__":
    main()
