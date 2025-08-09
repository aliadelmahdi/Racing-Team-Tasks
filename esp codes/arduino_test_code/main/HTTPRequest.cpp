// #include "HTTPRequest.h"
// #include <ArduinoJson.h>
// #include "RandomLinkGenerator.h"

// HTTPClient http;
// // Variables to hold the selected values from the JSON
// float left_inverter_max_temp;
// float right_inverter_max_temp;
// float ambient_temperature;
// float car_speed_gauge;
// float longitude;
// float latitude;


// void pressLink(const String& url) {
//     Serial.print(url);

//   http.begin(url);
//   int httpResponseCode = http.GET();
//   if (httpResponseCode > 0) {
//     Serial.println("HTTP GET request successful.");
//     Serial.print("Response Code: ");
//     Serial.println(httpResponseCode);
//     Serial.println(http.getString());
//   } else {
//     Serial.print("HTTP GET request failed. Error: ");
//     Serial.println(httpResponseCode);
//   }
//   http.end();
// }

// void send_random_url(int i,int ID_m) {
//   // Generate a random URL
//   String url = generateRandomLink(i,ID_m);
//   Serial.println("Generated URL:");
//   Serial.println(url);

//   // Press the link
//   pressLink(url);
// }

// // Function to fetch JSON data from the server
// void fetchdatafromjson(const String& url) {
//   http.begin(url);
//   int httpResponseCode = http.GET();

//   if (httpResponseCode == 200) {
//     String payload = http.getString();
//     http.end();

//     // Parse the JSON response
//     StaticJsonDocument<1024> doc;
//     DeserializationError error = deserializeJson(doc, payload);

//     if (error) {
//       Serial.print("Failed to parse JSON: ");
//       Serial.println(error.c_str());
//       return;
//     }

//     // Save the required values
//     JsonObject data = doc[0];
//     left_inverter_max_temp = data["left_inverter_max_temp"].as<float>();
//     right_inverter_max_temp = data["right_inverter_max_temp"].as<float>();
//     ambient_temperature = data["ambient_temperature"].as<float>();
//     car_speed_gauge = data["car_speed_gauge"].as<float>();
//     longitude = data["lon"].as<float>();
//     latitude = data["lat"].as<float>();

//     // Print the values for debugging
//     Serial.println("Values fetched:");
//     Serial.print("Left Inverter Max Temp: ");
//     Serial.println(left_inverter_max_temp);
//     Serial.print("Right Inverter Max Temp: ");
//     Serial.println(right_inverter_max_temp);
//     Serial.print("Ambient Temperature: ");
//     Serial.println(ambient_temperature);
//     Serial.print("Car Speed Gauge: ");
//     Serial.println(car_speed_gauge);
//     Serial.print("Longitude: ");
//     Serial.println(longitude);
//     Serial.print("Latitude: ");
//     Serial.println(latitude);
//   } else {
//     Serial.print("HTTP GET request failed. Error code: ");
//     Serial.println(httpResponseCode);
//     http.end();
//   }
// }

