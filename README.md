# SMARTFLOW-X
SmartFlow-X is a precision fluid dispensing system with real-time pH monitoring, built for electromechanical research and chemical automation. It features an ESP32-controlled syringe pump, live sensor data capture (pH, temperature, humidity, heart rate), and a web-based dashboard for control and visualization.<br>
👀The theoretical least count of the pump is <br>
<br>
🔧## **Features**<br>
 - Precise 1 mL fluid dispensing using stepper motor & lead screw<br>
 - Live pH measurement after each drop (via PH4502C sensor)<br>
 - Real-time DHT11 sensor data logging (temperature & humidity)<br>
 - ESP32-based control system with XAMPP backend<br>
 - Interactive web dashboard (built with HTML, PHP, JavaScript)<br>
 - Start/Stop control, live charting, and database integration<br>
 <br>
📡## **Tech Stack**<br>
- **Hardware**: Microcontroller - ESP32,Stepper Motor Driver- A4988,Stepper Motor - 17HS4401,pH sensor module - PH4502C,Temperature and Humidity sensor - DHT11 <br>
- **Backend**: PHP, MySQL (XAMPP) <br> 
- **Frontend**: HTML, CSS, JavaScript, Chart.js <br>
- **Communication**: Serial, HTTP<br>
- **Mechanical**: 1mm pitch 8mm diameter lead screw along with compatible nut, 3D printed carriage for holding syringe, 8mm diameter smooth rods, Uper and lower rod mounts (milled using 3D CNC machine), 608ZZ smooth linear bearings, Wooden outer framework <br>
