#include <SPI.h>
#include <MFRC522.h>

#include <SoftwareSerial.h>
SoftwareSerial client(9, 10); //RX, TX

#define SS_PIN 6
#define RST_PIN 5
#define SP_PIN 8

String server = "192.168.43.11"; // www.example.com
String uri = "/Dev/Arduino/esppost.php";// our example is /esppost.php
String data = "00110101";

String webpage="";
int i=0,k=0;
String readString;
int x=0;

boolean No_IP=false;
String IP="";
char temp1='0';


int ledPin = 2;


String strID = "";


MFRC522 rfid(SS_PIN, RST_PIN);

MFRC522::MIFARE_Key key;







void LED_on(){
    digitalWrite(ledPin, HIGH);
}


void LED_off(){
    digitalWrite(ledPin, LOW);
}







void check4IP(int t1){
    int t2=millis();
    while(t2+t1>millis()){
        while(client.available()>0){
            if(client.find("WIFI GOT IP")){
                No_IP=true;
            }
        }
    }
}

void connect_wifi(String cmd, int t){
    int temp=0,i=0;
    while(1){
        Serial.println(cmd);
        client.println(cmd); 
        while(client.available()){
            if(client.find("OK"))
                i=8;
        }
        delay(t);
        if(i>5)
            break;
        i++;
    }
    if(i==8)
        Serial.println("OK");
    else
        Serial.println("Error");
}

void wifi_init(){
    connect_wifi("AT",100);
    connect_wifi("AT+CWMODE=3",100);
    connect_wifi("AT+CWQAP",100);  
    connect_wifi("AT+RST",5000);
    check4IP(5000);
    if(!No_IP){
        Serial.println("Connecting Wifi....");
        connect_wifi("AT+CWJAP=\"Messenger\",\"01234567\"",7000);
        //provide your WiFi username and password here
        // connect_wifi("AT+CWJAP=\"vpn address\",\"wireless network\"",7000);
    }
    else{
        Serial.println("Wi-Fi Pre-connected...\nOh! Preceding");
    }
    Serial.println("Wifi Connected");
}




void findRFID(){
    if (!rfid.PICC_IsNewCardPresent() || !rfid.PICC_ReadCardSerial())
        return;

    else{
        MFRC522::PICC_Type piccType = rfid.PICC_GetType(rfid.uid.sak);

        if (piccType != MFRC522::PICC_TYPE_MIFARE_MINI && piccType != MFRC522::PICC_TYPE_MIFARE_1K && piccType != MFRC522::PICC_TYPE_MIFARE_4K) {
            Serial.println(F("Your tag is not of type MIFARE Classic."));
            return;
        }

        strID = "";
        for (byte i = 0; i < 4; i++) {
            strID += (rfid.uid.uidByte[i] < 0x10 ? "0" : "") + String(rfid.uid.uidByte[i], HEX) + (i!=3 ? ":" : "");
        }
        strID.toUpperCase();
        
        Serial.print("Tap card key: ");
        LED_on();
        Serial.println(strID);

        rfid.PICC_HaltA();

        rfid.PCD_StopCrypto1();
    }
}




void httppost () {
    client.println("AT+CIPSTART=\"TCP\",\"" + server + "\",80");//start a TCP connection.
    if( client.find("OK")) {
        Serial.println("TCP connection ready");
        
    }
    String postRequest = "POST " + uri + " HTTP/1.0\r\n" + "Host: " + server + "\r\n" + "Accept: *" + "/" + "*\r\n" + "Content-Length: " + data.length() + "\r\n" + "Content-Type: application/x-www-form-urlencoded\r\n" + "\r\n" + data;
    String sendCmd = "AT+CIPSEND=";//determine the number of caracters to be sent.
    client.print(sendCmd);
    client.println(postRequest.length() );
    if(client.find(">")){
        Serial.println("Sending..");
        client.print(postRequest);
        if( client.find("SEND OK")){
            Serial.println("Packet sent");
            LED_off();
            while(client.available()){
                String tmpResp = client.readString();
                Serial.println(tmpResp);
            }
            // close the connection
            client.println("AT+CIPCLOSE");
        }
    }
}





void setup() {
    Serial.begin(115200);
    client.begin(115200);
    wifi_init();
    Serial.println("System Ready..");
    
    
    SPI.begin();
    rfid.PCD_Init();
}

void loop() {
    findRFID();
    
    
    String hum = strID;
    data = "humidity=" + hum;
    // data sent must be under this form //name1=value1&name2=value2.
    httppost();
    delay(200);
}
