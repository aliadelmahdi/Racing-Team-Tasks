
#include "WiFiManager.h"
#include "HTTPRequest.h"
#include "RandomLinkGenerator.h"
#include "JSONParser.h"
#include "uart.h"

// const char* ssid = "Low";
// const char* password = "omega.4612";
// const char* ssid = "Galaxy A50A574";
// const char* password = "powergps776";

// const char* ssid = "Ahmed’s iphone";
// const char* password = "123456789012";

// const char* ssid = "dlink";
// const char* password = "";
const char* ssid = "A50";
const char* password = "23456789";

int ID_m=0;


String getdatafrompcurl = "https://racingteam.rf.gd/new/get.json";
int receivedChar;
int btnGPIO = 0;
void setup() {
  Serial.begin(9600);
  pinMode(btnGPIO, INPUT);  
  init_wifi(ssid, password);  // Wi-Fi initialization
  // Initialize all variables to default values
    initializeVariables();

    
    
}
int counter=0;
  void loop() {
    // // get_data(getdatafrompcurl);  // Fetch and parse data
    // send_random_url(counter,ID_m);
    // ID_m++;
    //   counter++;
    //   if (counter ==100){
    //     counter = 0;
    //   }

    // Example: build JSON & upload
    
    
    receive_uart();
    // delay(1000);

    // Serial.println(data);
    // delay(300);
    // while (Serial.available() > 0) {
    //       receivedChar = Serial.read();
    //   Serial.print(receivedChar);
    // }
    // send_data_to_stm(data);

    // parseFrame(frame1);
    //   String url1 = generateURL();
    //   pressLink(url1);
    //   delay(400);
    //   parseFrame(frame2);
    //   String url2 = generateURL();
    //   pressLink(url2);


  }
