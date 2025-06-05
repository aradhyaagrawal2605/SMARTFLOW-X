#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "Galaxy M33 5G4444";
const char* password = "tftw0711";
const char* serverName = "http://localhost/smartflowxdashboard/sensor.php";

WiFiClient client;
HTTPClient http;

unsigned long lastTempHumidity = 0;
unsigned long lastHeartRate = 0;
unsigned long lastPH = 0;

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) {
    // Send temperature and humidity every second
    if (millis() - lastTempHumidity >= 1000) {
      lastTempHumidity = millis();
      float temperature = 25.0; // Replace with actual sensor reading
      float humidity = 60.0; // Replace with actual sensor reading
      sendTempHumidity(temperature, humidity);
    }

    // Send heart rate five times per second
    if (millis() - lastHeartRate >= 200) { // 200 ms = 5 times per second
      lastHeartRate = millis();
      int heartRate = 80; // Replace with actual sensor reading
      sendHeartRate(heartRate);
    }

    // Send pH every 2.5 seconds
    if (millis() - lastPH >= 2500) {
      lastPH = millis();
      float ph = 7.4; // Replace with actual sensor reading
      sendPH(ph);
    }
  } else {
    Serial.println("WiFi Disconnected");
  }
}

void sendTempHumidity(float temperature, float humidity) {
  http.begin(client, serverName);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  String httpRequestData = "temperature=" + String(temperature) + "&humidity=" + String(humidity);
  int httpResponseCode = http.POST(httpRequestData);
  if (httpResponseCode > 0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
  } else {
    Serial.print("Error on sending POST: ");
    Serial.println(httpResponseCode);
  }
  http.end();
}

void sendHeartRate(int heartRate) {
  http.begin(client, serverName);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  String httpRequestData = "heart_rate=" + String(heartRate);
  int httpResponseCode = http.POST(httpRequestData);
  if (httpResponseCode > 0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
  } else {
    Serial.print("Error on sending POST: ");
    Serial.println(httpResponseCode);
  }
  http.end();
}

void sendPH(float ph) {
  http.begin(client, serverName);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  String httpRequestData = "ph=" + String(ph);
  int httpResponseCode = http.POST(httpRequestData);
  if (httpResponseCode > 0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
  } else {
    Serial.print("Error on sending POST: ");
    Serial.println(httpResponseCode);
  }
  http.end();
}
