# 🚀 SMARTFLOW-X

**SmartFlow-X** is a precision fluid dispensing system with **real-time pH monitoring**, built for electromechanical research and chemical automation.

It features an **ESP32-controlled syringe pump**, live sensor data capture (📉 pH, 🌡️ temperature, 💧 humidity, ❤️‍🩹 heart rate), and a **web-based dashboard** for intuitive control and visualization.

---

### 🔬 Theoretical Least Count  
The **least count** is the smallest volume the system can dispense in a single microstep of the stepper motor. It is calculated as follows:

#### ⚙️ Parameters:
- **Lead screw pitch**: 1 mm/rev  
- **Stepper motor step angle**: 1.8°  
- **Steps per revolution**: 200  
- **Microstepping**: 16 (A4988 driver)  
- **Syringe diameter**: 28.8 mm  

#### 🧮 Calculations:

1. **Microstep linear movement**  
   `= Lead screw pitch / (steps per rev × microstepping)`  
   `= 1 mm / (200 × 16)`  
   `= 1 / 3200`  
   `= 0.0003125 mm`

2. **Syringe cross-sectional area**  
   `= π × (d/2)^2`  
   `= π × (28.8 / 2)^2`  
   `= π × 14.4^2 ≈ 651.4 mm²`

3. **Volume per microstep**  
   `= Area × microstep movement`  
   `= 651.4 × 0.0003125 ≈ 0.2036 mm³`  
   *(1 mm³ = 0.001 mL)*

4. **Least Count**  
   `= 0.2036 mm³ × 0.001`  
   `= 0.000204 mL`

---

✅ **Theoretical Least Count ≈ 0.000204 mL per microstep**

---

## 🔧 Features
- 🎯 **Precise 1 mL fluid dispensing** using stepper motor & lead screw  
- 🧪 **Live pH measurement** after each drop (via PH4502C sensor)  
- 🌡️ **Real-time DHT11 sensor** data logging (temperature & humidity)  
- 🧠 **ESP32-based control** system with XAMPP backend  
- 📊 **Interactive web dashboard** (HTML, PHP, JavaScript)  
- ⏯️ **Start/Stop control**, live charting, and database integration  

---

## 📡 Tech Stack

### 🔩 Hardware
- **Microcontroller**: ESP32  
- **Motor Driver**: A4988  
- **Stepper Motor**: 17HS4401  
- **pH Sensor**: PH4502C  
- **Temp & Humidity Sensor**: DHT11  

### 🧰 Backend
- **Languages**: PHP  
- **Database**: MySQL (via XAMPP)  

### 🎨 Frontend
- HTML, CSS, JavaScript  
- Chart.js for live data visualization  

### 🔗 Communication
- Serial & HTTP protocols  

### 🛠️ Mechanical
- **Lead Screw**: 8mm diameter, 1mm pitch  
- **Carriage**: 3D printed syringe holder  
- **Linear Motion**: 8mm smooth rods, 608ZZ bearings  
- **Mounts**: 3D CNC milled  
- **Enclosure**: Wooden framework  

---
