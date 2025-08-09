import requests
import time

# Initialize failure counter and conversion times array
failure_counter = 0
correct_counter = 0
conversion_times = []  # Array to store the conversion times

# Function to check if the received data matches the expected structure
def check_failure(data):
    global failure_counter
    global correct_counter
    # Check if the data is a list of lists and each sublist has 8 elements
    if isinstance(data, list):
        for sublist in data:
            # Check each item in the sublist for '&nbsp;'
            if any(item == '&nbsp;' for item in sublist):
                failure_counter += 1
                print("Failure detected due to '&nbsp;'. Failure count:", failure_counter)
                return True
            if isinstance(data, list) and len(data) > 0 and isinstance(data[0], list) and all(item == '' for item in data[0]):
                failure_counter += 1
                print("Failure detected. Failure count:", failure_counter)
                return True
            else:
                correct_counter += 1
        
        print("Correct count:", int(correct_counter / 4))
        print("Failure count:", failure_counter)
        print("Total Connection Time: %0.2f" % (time.time() - initial_time))
    else:
        failure_counter += 1
        print("Failure detected. Failure count:", failure_counter)
        return True
    return False

def main():
    global failure_counter
    global correct_counter
    start_time = 0
    end_time = 0
    global initial_time
    initial_time = time.time()
    # First, send a request to trigger the action (click on the link)
    api_url = "https://projectegypt.online/api/getthewholedata.php?slug=https://docs.google.com/spreadsheets/d/1U4Y2chZ9Qc11QRmTj7I0w3-J-jo62YntiEP7SnxI4sE/edit?gid=0#gid=0"
    
    while True:
        try:
            # Start measuring the time for the conversion
            start_time = time.time()
            try:
                # Send the request to the first link
                requests.head(api_url, timeout=200)
            except requests.exceptions.RequestException as e:
                print(f"Request failed with error: {e}")
                time.sleep(5)  # Wait before retrying
                continue  # Skip this iteration and retry
            
            data_url = "https://projectegypt.online/thewholedata.json"
            try:
                # Fetch the JSON data
                data_response = requests.get(data_url, timeout=30)
                # End measuring the time
                end_time = time.time()
                print("Successfully triggered the action. Fetching data...")
                
                # Convert JSON to Python dictionary
                data = data_response.json()
                # Check if the data structure is valid
                check_failure(data)
                print(data)
            except requests.exceptions.RequestException as e:
                        print(f"Error fetching data: {e}")
                        failure_counter += 1
                        continue  # Retry fetching the data
           
                
        except KeyboardInterrupt:
            print("Data submission stopped.")
            break

if __name__ == "__main__":
    main()
