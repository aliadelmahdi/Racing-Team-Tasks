
// #include "WiFiManager.h"
#include "HTTPRequest.h"
#include "RandomLinkGenerator.h"
#include "JSONParser.h"
#include "uart.h"

// const char* ssid = "Ali";
// const char* password = "powergps1";
const char* ssid = "Galaxy A50A574";
const char* password = "powergps776";

// const char* ssid = "Ahmed’s iphone";
// const char* password = "123456789012";

// const char* ssid = "dlink";
// const char* password = "";
int ID_m=0;


String getdatafrompcurl = "https://projectegypt.online/new/get.json";
int receivedChar;
int btnGPIO = 0;
void setup() {
  Serial.begin(115200);
  pinMode(btnGPIO, INPUT);  
  // init_wifi(ssid, password);  // Wi-Fi initialization
  // Initialize all variables to default values
    initializeVariables();

    
    
}
int counter=0;
void loop() {
  
  receive_uart();

}
